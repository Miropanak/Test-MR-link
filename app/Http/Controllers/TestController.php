<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 14-Nov-18
 * Time: 17:08
 */

namespace App\Http\Controllers;


use App\Help;
use App\Option;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;

class TestController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function testSearch(Request $request)
    {
        $title = 'Nájdené jednotky';
        $searchTerm = $request->input('searchTerm');

        if ($searchTerm === null)
        {
            $tests = Unit::all();
            return view('tests/show', ['tests' => $tests])->with(compact('title'));
        }

        $tests = Unit::where('title',  'LIKE', '%'.$searchTerm.'%')->get();
        $agent = new Agent();
        return view('tests/show', ['tests' => $tests, 'agent' => $agent])->with(compact('title'));
    }

    public function new()
    {
        return null;
    }

    public function getTest($id)
    {
        $unit = new Unit();
        $option = new Option();
        $events = $unit->find($id)->events()->get();

        $eventArray = [];

        foreach ($events as $event) {
            $options = $option::inRandomOrder()->where('event_id', $event->id)->get();
            $helps = Help::where('event_id',$event->id)->get();
            $object = new \stdClass();
            $object->event = $event;
            $object->options = $options;
            $object->helps = $helps;

            array_push($eventArray, $object);
        }

        shuffle($eventArray);

        Storage::append('DilemaCustom.log', '[' . date('Y-m-d H:i:s') . '] Dilema.INFO: User ' . Auth::user()->id . ' started test of Unit ' . $id);

        return $eventArray;
    }

    public function run($id)
    {
        if (Unit::find($id))
            return view('tests/detail', ['fetchUrl' => route('test/getTest', ['id' => $id]), 'returnUrl' => route('tests/show')]);
        else
            return view('errors.404');
    }

    public function show()
    {
        $tests = Unit::all();
        $title = "Zoznam testov";
        return view('tests/show', ['tests' => $tests])->with(compact('title'));
    }
}
