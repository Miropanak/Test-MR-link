<?php

namespace App\Http\Controllers;

use function abort;
use App\Activity;
use App\ActivityUsers;
use App\Unit;
use App\UnitsEvent;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UnitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }


    /**
     * Function for creating a new unit.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createUnit(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:200',
            'activity_id' => 'required|exists:activities,id',
            'event_id' => 'array|exists:events,id',
        ]);

        $unit = new Unit();

        $unit->title = $request['title'];
        $unit->description = $request['description'];
        $unit->id_activities = $request['activity_id'];

        $unit->save();

        if (is_array($request->event_id) || is_object($request->event_id)) {
            foreach ($request->event_id as $value) {
                $unitEvent = new UnitsEvent();

                $unitEvent->id_events = $value;
                $unitEvent->id_units = $unit->id;

                $unitEvent->save();
            }
        }

        return redirect('activities/detail/'.$unit->id_activities);
    }

    /**
     * Function for finding all events and user's activities and returning view for creating new unit.
     *
     * @param null $activity_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventGetAll($activity_id = null)
    {
        $id = Auth::id();
        ///Thanks to ORM here you can easily get whole table of events
        $all_events = Event::all();

        $users_activities = ActivityUsers::where('id_users', $id)->pluck('id_activities')->toArray();;
        $all_activities = Activity::whereIn('id', $users_activities)->get();
        $activity = Activity::find($activity_id);

        //poslanie zoznamu do view
        if (count($all_events) > 0) {

            return view('units.new', ['all_events' => $all_events, 'all_activities' => $all_activities, 'activity' => $activity]);

        } else {

            return view('units.new', ['activity_id' => $activity_id]);

        }
    }


    /**
     * Function for updating selected unit.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateUnit(Request $request, $id)
    {

        $unit = Unit::find($id);

        // Only author can update unit
        if(Auth::user()->id != $unit->activity->author->id) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:200',
            'activity_id' => 'required|exists:activities,id',
            'event_id' => 'array|exists:events,id',
        ]);

        $unit->title = $request['title'];
        $unit->description = $request['description'];
        $unit->id_activities = $request['activity_id'];

        $unit->save();

        if (is_array($request->event_id) || is_object($request->event_id)) {
            foreach ($request->event_id as $value) {
                $unitEvent = new UnitsEvent();

                $unitEvent->id_events = $value;
                $unitEvent->id_units = $unit->id;

                $unitEvent->save();
            }
        }

        return redirect('activities/detail/'.$unit->id_activities);
    }

    /**
     * Function for deleting selected unit and all related UnitsEvent-s.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $unit = Unit::find($id);

        // Only author can delete unit
        if(Auth::user()->id != $unit->activity->author->id) {
            abort(403);
        }

        $id_activities = $unit->id_activities;

        $units_events = UnitsEvent::where('id_units', $id)->get();
        foreach($units_events as $units_event) {
            $units_event->delete();
        }

        $unit->delete();

        return redirect('activities/detail/'.$id_activities);
    }

    /**
     * Function get all user's activities and unit's events and return view for editing selected unit.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUnit($id)
    {
        $unit = Unit::find($id);

        // Only author can update unit
        if(Auth::user()->id != $unit->activity->author->id) {
            abort(403);
        }

        $auth_id = Auth::id();
        $all_activities = Activity::where('id_author', $auth_id)->get();

        $added_events = UnitsEvent::where('id_units', $id)->pluck('id_events')->toArray();
        $all_events = Event::where('id_users', $auth_id)->whereNotIn('id', $added_events)->get();

        return view('units.edit', ['unit' => $unit, 'all_activities' => $all_activities, 'all_events' => $all_events]);
    }

    /**
     * Function delete selected event from unit. It has to delete UnitsEvent instance.
     *
     * @param $id
     * @param $event_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteUnitEvent($id, $event_id)
    {
        $unitEvent = UnitsEvent::where('id_units', $id)->where('id_events', $event_id);
        $unitEvent->delete();

        $unit = Unit::find($id);
        return redirect('activities/detail/'.$unit->id_activities);
    }
}
