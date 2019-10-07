<?php

namespace App\Http\Controllers;

use App\Help;
use App\Event;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpController
{

    public function CreateHelp($event_id) {

        return view('events.createHelp', compact('event_id'));
    }

    public function storeHelp(Request $request,$event_id) {

        $help = new Help();

        $help->name = $request['help'];
        $help->url = $request['helpUrl'];
        $help->id_events = $event_id;

        $help->save();

        return redirect()->action('EventController@showEvent', ['event_id' => $event_id]);
    }

    /**
     * Returns all helps for given id of an event
     *
     * @param event_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEventHelps($event_id)
    {
        return Help::where('id_events',$event_id)->get();

    }

    /**
     * Function for Deleting a help
     *
     *
     *
     * @param $id - id of a help
     * @return other function of this Controller
     */
    public function delete($id){
        /**
         * Getting help of given id
         */
        $help =  Help::find($id);

        $event_id = $help->id_events;

        /**
         * Checking rights
         */
        if(Auth::user()->id_user_types != 5 && Auth::user()->id_user_types != 6) {
            abort(403);
        }

        /**
         * Deleting help and run other function (eventGetAllEvents)
         */
        $help->delete();

        return redirect()->route('events/detail', ['event' => $event_id]);
    }
}