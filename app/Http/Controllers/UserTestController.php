<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Test;
use App\Activity;
use App\ActivityUsers;
use App\Unit;
use Carbon\Carbon;
use App\EventTest;
use DB;

class UserTestController extends Controller
{
    function index() {
        $tests = Test::with('events', 'users', 'units')->get();
        $activities = Activity::with('author', 'units')->get();

        return view('exams.index', compact('tests'));
    }

    function create() {
        $userId = Auth::id();
        $usersActivities = ActivityUsers::where('id_users', $userId)->pluck('id_activities')->toArray();
        $allActivities = Activity::whereIn('id', $usersActivities)->with('author', 'units')->get();
        
        return view('exams/create', [
            'allActivities' => $allActivities,
            'fetchEventsUrl' => route('exam/getEvents'), 
            'createExamUrl' => route('exam/store'), 
            'returnUrl' => route('dashboard')
            ]);
    }

    function getEvents($id) {
        $unit = new Unit();
        $events = $unit->find($id)->events()->get();

        return $events;
    }

    function run($id) {
        $test = Test::with('events', 'users', 'units')->find($id);

        return view('exams.run', compact('test'));
    }

    function edit($id) {
        $test = Test::with('events', 'users', 'units')->find($id);

        return view('exams.edit', compact('test'));
    }

    function store(Request $request) {
        $newTest = new Test();

        $selectedEvents = $request['selectedEvents'];
        $numberOfQuestion = count($selectedEvents);
        $startDate = Carbon::parse($request->examStartDate)->format('Y-m-d H:i:s');
        $name = $request['testName'];

        $newTest->name = $name;
        $newTest->startDate = $startDate;
        $newTest->questions = $numberOfQuestion;

        $newTest->save();
        
        foreach ($selectedEvents as $event) {
            $eventTest = new EventTest();
            $eventTest->events_id = $event['id'];
            $eventTest->tests_id = $newTest->id;

            $eventTest->save();
        }

        return response($newTest);
    }

    function update(Request $request, $id) {

    }

    function delete($id) {

    }
}
