<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 14-Nov-18
 * Time: 17:08
 */

namespace App\Http\Controllers;


use App\EventTest;
use App\Help;
use App\Option;
use App\Unit;
use App\Test;
use App\User;
use App\UserTest;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;


class ExamController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function examSearch(Request $request)
    {
        $title = 'Nájdené testy';
        $searchTerm = $request->input('searchTerm');

        if ($searchTerm === null)
        {
            $exams = Test::all();
            return view('exams/show', ['exams' => $exams])->with(compact('title'));
        }

        $exams = Test::where('name',  'LIKE', '%'.$searchTerm.'%')->get();
        $agent = new Agent();
        return view('exams/show', ['exams' => $exams, 'agent' => $agent])->with(compact('title'));
    }

    public function new()
    {
        return null;
    }

    public function getEventList($id)
    {
        $events = Test::find($id)->events()->get();
        $option = new Option();

        $eventArray = [];

        foreach ($events as $event) {
            $options = $option->where('id_events', $event->id)->get();
            $object = new \stdClass();
            $object->event = $event;
            $object->options = $options;

            array_push($eventArray, $object);
        }

        return $eventArray;
    }

    public function run($id)
    {
        $users_id = Auth::user()->id;
        $testToRun = Test::find($id);

        $testToRun->taken = UserTest::where([
            ['users_id', $users_id],
            ['tests_id', $testToRun->id],
        ])->first()['test_taken'];

        if ($testToRun && $testToRun->startDate <= date("Y-m-d h:i:s", time()) && !$testToRun->taken) {
            $ut = new UserTest();

            $ut->users_id = Auth::user()->id;
            $ut->tests_id = $id;

            $ut->startedAt = date("Y-m-d h:i:s", time());
            $ut->correct = 0;
            $ut->test_taken = True;
            $ut->save();

            $timeToHandle = DB::table('event_tests')
                ->where('tests_id', $id)
                ->join('events', 'events.id', '=', 'event_tests.events_id')
                ->sum('time_to_handle');

            $endTimestamp = time() * 1000 + $timeToHandle * 60000;

            return view('exams/detail', ['fetchUrl' => route('exam/getEventList', ['id' => $id]), 'testId' => $id, 'endTimestamp' => $endTimestamp, 'returnUrl' => route('exams/show'), 'submitUrl' => route('exams/submit'), 'resultUrl' => route('exams/statistics', ['id' => $id])]);
        }else
            return view('errors.404');
    }

    public function show()
    {
        $exams = Test::all();
        $userTest = new UserTest();
        $users_id = Auth::user()->id;

        foreach ($exams as $exam) {
            $exam->taken = $userTest->where([
                ['users_id', $users_id],
                ['tests_id', $exam->id],
            ])->first()['test_taken'];
            $exam->correctAnswers = $userTest->where([
                ['users_id', $users_id],
                ['tests_id', $exam->id],
            ])->first()['correct'];
        }

        $title = "Zoznam testov";
        return view('exams/show', ['exams' => $exams])->with(compact('title'));
    }

    public function submit(Request $request)
    {
        $userTest = new UserTest();
        $option = new Option();

        $users_id = Auth::user()->id;
        $tests_id = $request['testid'];

        $selectedOptions = $request['selectedOptions'];
        $correct_answers = 0;

        foreach ($selectedOptions as $optionId) {
            $optionToEvaluate = $option->where('id', $optionId)->first();
            if ($optionToEvaluate['correct_answer']) {
                $correct_answers++;
            }
        }

        $userTest->where([
            ['users_id', $users_id],
            ['tests_id', $tests_id],
        ])->update(['correct' => $correct_answers]);

        return 0;
    }

    public function statistics($testId)
    {
        $users_id = Auth::user()->id;
        $test = new Test();
        $userTest = new UserTest();
        $result = [];

        $result['taken'] = $userTest->where([
            ['users_id', $users_id],
            ['tests_id', $testId],
        ])->first()['test_taken'];
        $result['correctAnswers'] = $userTest->where([
            ['users_id', $users_id],
            ['tests_id', $testId],
        ])->first()['correct'];
        $result['totalQuestions'] = $test->where('id', $testId)->value('questions');

        return view('exams/statistics', ['result' => $result, 'returnUrl' => route('exams/show')]);
    }
}
