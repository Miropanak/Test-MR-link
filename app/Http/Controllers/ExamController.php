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
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;


class ExamController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * @OA\Get(
     *      path="/api/unit/{id}/exams",
     *      operationId="getUnitExams",
     *      tags={"Unit", "Test"},
     *      summary="Gets all tests of unit with id",
     *      description="Returns 'tests' by belonging to unit",
     *      @OA\Parameter(
     *          name="id",
     *          description="Unit id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *     @OA\Response(
     *          response=404,
     *          description="Unit with id doesn't exist"
     *       )
     *     )
     */
    public function getUnitExams($unit_id)
    {
        try{
            $unit = Unit::find($unit_id);
            if($unit) {
                $tests = $unit->test;
                return response()->json($tests, 200);
            } else {
                return response()->json("Unit not found", 404);
            }


        } catch (QueryException $e)
        {
            Log::error($e);
            return response()->json("Niečo sa pokazilo " . $e , 500);
        }

    }

    /**
     * @OA\Get(
     *      path="/api/exam/{id}",
     *      operationId="getExam",
     *      tags={"Test"},
     *      summary="Gets test with id",
     *      description="Returns 'test' with id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Test id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Test with id doesn't exist"
     *       )
     *     )
     */
    public function getExam($exam_id)
    {
        try{
            $exam = Test::find($exam_id);
            if($exam) {
                $events = $exam->events;
                return response()->json($exam, 200);
            } else {
                return response()->json("Test not found", 404);
            }


        } catch (QueryException $e)
        {
            Log::error($e);
            return response()->json("Niečo sa pokazilo " . $e , 500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/exam/create",
     *      operationId="createExam ",
     *      tags={"Test"},
     *      summary="Creates new exam/test",
     *      description="Creates new exam/test",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body has to contain array of event ids named 'event_ids', 'name' of test, date when test activates 'startDate':yyyy-MM-dd HH-mm-ss and id of unit where it belongs as 'unit_id'",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="unit_id", type="integer"),
     *          @OA\Property(property="startDate", type="date string in format yyyy-MM-dd HH:mm:ss"),
     *          @OA\Property(property="event_ids", type="array of integers"),
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body supplied",
     *      ),
     *     security={{"bearerAuth":{}}},
     *     )
     */
    public function createExam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'startDate' => 'date_format:Y-m-d H:i:s|required',
            'unit_id' => 'integer|required',
            'event_ids.*' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try {
            $exam = new Test();

            $exam->name = $request['name'];
            $exam->startDate = $request['startDate'];
            $exam->unit_id = $request['unit_id'];
            $exam->questions = count($request['event_ids']);
            $exam->author_id = Auth::user()->id;
            $exam->save();
            foreach($request['event_ids'] as $event_id)
            {
                $exam->events()->attach($event_id);
            }
            $exam->save();

        } catch (QueryException $e) {
            return response()->json(null, 500); // f.e. postgres id counter is not set up properly
        }
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
