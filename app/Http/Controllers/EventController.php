<?php

/**
 * Created by Bernad on 11/6/2017.
 */

namespace App\Http\Controllers;

use App\Help;
use App\Option;
use App\Unit;
use Illuminate\Http\Request;
use App\Event;
use App\UnitsEvent;
use DB;
use App\EventType;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


/**
 * Class EventController
 *
 * This class provide controller functions for events. This is a bridge
 * between DB and frontend controlling events.
 *
 * @package App\Http\Controllers
 */
class EventController extends Controller
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
     * Return events frontend view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function events() {

        return view('events.show');
    }

    /**
     * @OA\Get(
     *      path="/api/events/{id}",
     *      operationId="getEvent",
     *      tags={"Event"},
     *      summary="Get event",
     *      description="Returns 'event' by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Event id",
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
     *          description="Event not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getEvent($id) {
        try {
            $event = Event::find($id);
            if ($event) {
                return response()->json($event, 200);
            } else {
                return response()->json(null, 404);
            }
        }catch (Exception $e){
            return response()->json(null, 400);
        }
    }

    /**
     * @OA\Put(
     *      path="/api/events/{id}",
     *      operationId="putEvent",
     *      tags={"Event"},
     *      summary="Update event",
     *      description="Updates event",
     *      @OA\Parameter(
     *          name="id",
     *          description="Event id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body does not need to contain all event fields",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="message", type="string"),
     *          @OA\Property(property="time_to_explain", type="integer")
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Event not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function updateEvent(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'message' => 'string',
            'header' => 'string',
            'time_to_explain' => 'integer',
            'time_to_handle' => 'integer',
            'id_event_types' => 'integer',
            'id_users' => 'integer',
        ]);

        if ($validator->fails()){
            return response()->json(null, 400);
        }

        try {
            $event = Event::find($id);
            if ($event){
                $event->update($request->all());
                return response()->json($event, 200);
            } else {
                return response()->json($event, 404);
            }
        } catch (Exception $e){
            return response()->json(null, 400);
        }

    }

    /**
     * @OA\Put(
     *      path="/api/events",
     *      operationId="putEvents",
     *      tags={"Event"},
     *      summary="Update events",
     *      description="Updates events",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Array of JSON object with fields that are going to be updated.",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="array",
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="message", type="string")
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Event not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function updateEvents(Request $request) {
        $validator = Validator::make($request->all(), [
            '*.id' => 'integer|required',
            '*.message' => 'string',
            '*.header' => 'string',
            '*.time_to_explain' => 'integer',
            '*.time_to_handle' => 'integer',
            '*.id_event_types' => 'integer',
            '*.id_users' => 'integer',
        ]);

        if ($validator->fails()){
            return response()->json(null, 400);
        }

        $updatedEvents = [];
        DB::beginTransaction();
        foreach ($request->all() as $event) {
            try {
                $eventToUpdate = Event::find($event["id"]);
                if ($eventToUpdate) {
                    $eventToUpdate->update($event);
                    $updatedEvents[] = $eventToUpdate;
                } else {
                    DB::rollback();
                    return response()->json(null, 404);
                }
            }catch (Exception $e){
                DB::rollback();
                return response()->json(null, 400);
            }
        }
        DB::commit();
        return response()->json($updatedEvents, 200);
    }

    /**
     * @OA\Get(
     *      path="/api/events/{id}/options",
     *      operationId="getEventOptions ",
     *      tags={"EventOptions"},
     *      summary="Get all options of event",
     *      description="Returns 'options' of event by event id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Event id",
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
     *          description="Options not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getEventOptions ($id) {
        try {
            $options = Option::where("id_events", $id)->get();
            if ($options){
                return response()->json($options, 200);
            }else{
                return response()->json(null, 404);
            }
        }catch (Exception $e){
            return response()->json(null, 400);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/events",
     *      operationId="createEvent ",
     *      tags={"Event"},
     *      summary="Make new event",
     *      description="Make new event",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body has to contain message, header, id_event_types, id_users fields. Time_to_hadnle has value 50 set as default. Time_to_explain has value 100 set as default.",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="message", type="string"),
     *          @OA\Property(property="header", type="string"),
     *          @OA\Property(property="time_to_explain", type="integer"),
     *          @OA\Property(property="time_to_handle", type="integer"),
     *          @OA\Property(property="id_event_types", type="integer"),
     *          @OA\Property(property="id_users", type="integer")
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
     *     )
     */

    public function createEvent (Request $request){
        $validator = Validator::make($request->all(), [
            'message' => 'string|required',
            'header' => 'string|required',
            'time_to_explain' => 'integer',
            'time_to_handle' => 'integer',
            'id_event_types' => 'integer|required',
            'id_users' => 'integer|required'
        ]);

        if ($validator->fails()){
            return response()->json(null, 400);
        }
        try {
            $event = new Event();
            $event->message = $request['message'];
            $event->header = $request['header'];
            $event->time_to_explain = isset($request['time_to_explain']) ? $request['time_to_explain'] : 100;
            $event->time_to_handle = isset($request['time_to_handle']) ? $request['time_to_handle'] : 50;
            $event->id_event_types = $request['id_event_types'];
            $event->id_users = $request["id_users"]; // temporary solution, id should be determined by the server
            $event->save();
        }catch (Exception $e){
            return response()->json(null, 400);
        }
        return response()->json($event, 200);
    }


    /**
     * @param $option_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editOption($option_id) {


        $option = Option::find($option_id);
        return view('events/option', ['option' => $option]);

    }

    /**
     *
     *
     * @param none
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function eventGetAllEvents()
    {

        $id = Auth::id();
        $all_events = User::find(Auth::id())->events;

        $title = "Zoznam vzdelávacích udalostí";

        //poslanie zoznamu do view
        if(count($all_events)>0){

            return view('events.show', ['all_events' => $all_events])->with(compact('title'));

        }
        else {

            return view('events.show')->with(compact('title'));

        }



        // uncomment to redirect
        //return redirect()->route('events.show');
    }

    /**
     * Function for creating an event
     *
     * Done, working - 20.10.2017 by Bernad
     *
     * @param Request $request
     * @param null $unit_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function eventCreateEvent(Request $request, $unit_id = null)
    {
        /**
         * An example of: BACKEND VALUE VALIDATION
         *
         * $request->validate([
         *  'header' => 'required',
         *  'message' => 'required',
         * ]);
         */

        //check permissions of current user
        if(Auth::user()->id_user_types <= 2)
            return view('errors.404');

        $event = new Event();

        /**
         * First message here is mapped to database migration events ... where messege column is found
         * second message here  in quotes is a name in HTML for example textarea name="message" in view
         */
        $event->header = $request['header'];
        $event->message = $request['message'];
        $event->id_users = Auth::user()->id;

        /** Check if data was provided */
        if ($request['time_to_handle'] != ""){
            $event->time_to_handle = $request['time_to_handle'];
        }
        else{
            /** Default value TODO load from configuration file */
            $event->time_to_handle = 50;
        }
        /** Check if data was provided */
        if ($request['time_to_explain'] != ""){
            $event->time_to_explain = $request['time_to_explain'];
        }
        else{
            /** Default value TODO load from configuration file */
            $event->time_to_explain = 100;
        }

        /** Get all event types from database */
        $arr_event_types = EventType::all();

        /** Predefine */
        $selected = "";

        $k = 0;
        /** Iterate form in view to get selected value */
        foreach($request->input('input') as $value) {
            $selected = $value;
        }

        $i = 0;
        $arrayValues = [];
        $isCheckedAtLeastOne = false;

        if (is_array($request->spravnost) || is_object($request->spravnost)) {
            /** forcycle to obtain list of all checked and unchecked checkboxes */
            foreach ($request->spravnost as $value) {

                if ($value == "on") {
                    array_pop($arrayValues);
                    $isCheckedAtLeastOne = true;
                }
                array_push($arrayValues, $value);

                $i = +$i + 1;
            }
            /**
             * BACKEND VALUE VALIDATE
             *
             * if (!$isCheckedAtLeastOne){
             *   return Redirect::back()->withErrors("Chyba. Treba oznacit aspon jednu moznost ako spravnu.")->
             *   withInput();
             * }
             */
        }

        /** Iterate through database event_type names and look for match */
        foreach($arr_event_types as $event_type) {
            if ($selected == $event_type->name){
                $event->id_event_types = $event_type->id;
                break;
            }
        }

        /** This will save an event to the database */
        $request->user()->events()->save($event);

        if (is_array($request->moznost) || is_object($request->moznost)) {
            $i = 0;
            /** SAVE all options for this event */
            foreach ($request->moznost as $value) {
                $option = new Option();
                $i = +$i + 1;
                if ($arrayValues[(+$i - 1)] != "0") {
                    $option->correct_answer = true;
                } else {
                    $option->correct_answer = false;
                }
                $option->answer_data = $value;
                $option->id_events = $event->id;
                $option->save();
            }
        }

        if(Auth::user()->id_user_types == 2){
            Auth::user()->id_user_types = 3;
            Auth::user()->save();
        }
        
        if (!is_null($unit_id)) {
            $unitEvent = new UnitsEvent();

            $unitEvent->id_events = $event->id;
            $unitEvent->id_units = $unit_id;

            $unitEvent->save();

            return redirect()->route('activities.detail', ['id' => Unit::find($unit_id)->id_activities]);
        }

        return redirect()->route('events/show');
    }



    /**
     * Function for Updating an event
     *
     * Done, working - by Volko
     *
     * @param Request $request
     * @param $event_id
     * @param null $unit_id
     * @return \Illuminate\Http\RedirectResponse
     */
public function eventUpdateEvent(Request $request, $event_id, $unit_id = null)
{



    $event = Event::find($event_id);

    if(Auth::user()->id != $event->id_users) {
        abort(403);
    }

    /**
     * First message here is mapped to database migration events ... where messege column is found
     * second message here  in quotes is a name in HTML for example textarea name="message" in view
     */
    $event->header = $request['header'];
    $event->message = $request['message'];
    $event->id_users = Auth::user()->id;

    /** Check if data was provided **/
    if ($request['time_to_handle'] != ""){
        $event->time_to_handle = $request['time_to_handle'];
    }
    else{
        // Default value TODO load from configuration file
        $event->time_to_handle = 50;
    }
    /** Check if data was provided **/
    if ($request['time_to_explain'] != ""){
        $event->time_to_explain = $request['time_to_explain'];
    }
    else{
        // Default value TODO load from configuration file
        $event->time_to_explain = 100;
    }

    /** get all event types from database **/
    $arr_event_types = EventType::all();

    // predefine
    $selected = "";

    $k = 0;
    if($request->input!=null)
    /** Iterate form in view to get selected value **/
    foreach($request->input('input') as $value) {
        $selected = $value;
    }


    $i = 0;
    $arrayValues = [];
    $isCheckedAtLeastOne = false;

    if (is_array($request->spravnost) || is_object($request->spravnost)) {
        // forcycle to obtain list of all checked and unchecked checkboxes
        foreach ($request->spravnost as $value) {

            if ($value == "on") {
                array_pop($arrayValues);
                $isCheckedAtLeastOne = true;
            }
            array_push($arrayValues, $value);

            $i = +$i + 1;
        }

    }

    /** Iterate through database event_type names and look for match **/
    foreach($arr_event_types as $event_type) {
        if ($selected == $event_type->name){
            $event->id_event_types = $event_type->id;
            break;
        }
    }

    /** this will save an event to the database **/
    $request->user()->events()->save($event);



    if (is_array($request->moznost) || is_object($request->moznost)) {
        $i = 0;
        /** SAVE all options for this event **/
        foreach ($request->moznost as $value) {
            $option = new Option();
            $i = +$i + 1;
            if ($arrayValues[(+$i - 1)] != "0") {
                $option->correct_answer = true;
            } else {
                $option->correct_answer = false;
            }
            $option->answer_data = $value;
            $option->id_events = $event->id;

            $option->save();
        }
    }



    if (!is_null($unit_id)) {
        $unitEvent = new UnitsEvent();

        $unitEvent->id_events = $event->id;
        $unitEvent->id_units = $unit_id;

        $unitEvent->save();

        return redirect()->route('activities.detail', ['id' => Unit::find($unit_id)->id_activities]);
    }

        /** Returning to view */
    return redirect()->route('events/detail', ['event' => $event]);

}

    /**
     * Function for Updating an event when going to option update
     *
     * Done, working - by Volko
     *
     * @param Request $request
     * @param $option_id
     * @param null $unit_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function eventUpdateEventOption(Request $request, $option_id,   $unit_id = null)
    {

        /** Geting id of event using option */
        $option = Option::find($option_id);
        $event_id=$option->id_events;
        $event = Event::find($event_id);

        if(Auth::user()->id != $event->id_users) {
            abort(403);
        }

        /**
         * First message here is mapped to database migration events ... where messege column is found
         * second message here  in quotes is a name in HTML for example textarea name="message" in view
         */
        $event->header = $request['header'];
        $event->message = $request['message'];
        $event->id_users = Auth::user()->id;

        /** Check if data was provided */
        if ($request['time_to_handle'] != ""){
            $event->time_to_handle = $request['time_to_handle'];
        }
        else{
            // Default value TODO load from configuration file
            $event->time_to_handle = 50;
        }
        /**  Check if data was provided */
        if ($request['time_to_explain'] != ""){
            $event->time_to_explain = $request['time_to_explain'];
        }
        else{
            // Default value TODO load from configuration file
            $event->time_to_explain = 100;
        }

        /** get all event types from database */
        $arr_event_types = EventType::all();

        // predefine
        $selected = "";

        $k = 0;
        if($request->input!=null)
            /**  Iterate form in view to get selected value */
            foreach($request->input('input') as $value) {
                $selected = $value;
            }


        $i = 0;
        $arrayValues = [];
        $isCheckedAtLeastOne = false;

        if (is_array($request->spravnost) || is_object($request->spravnost)) {
            /**  forcycle to obtain list of all checked and unchecked checkboxes */
            foreach ($request->spravnost as $value) {

                if ($value == "on") {
                    array_pop($arrayValues);
                    $isCheckedAtLeastOne = true;
                }
                array_push($arrayValues, $value);

                $i = +$i + 1;
            }

        }


        /**  Iterate through database event_type names and look for match **/
        foreach($arr_event_types as $event_type) {
            if ($selected == $event_type->name){
                $event->id_event_types = $event_type->id;
                break;
            }
        }

        /**  this will save an event to the database **/
        $request->user()->events()->save($event);



        if (is_array($request->moznost) || is_object($request->moznost)) {
            $i = 0;
            /**  SAVE all options for this event **/
            foreach ($request->moznost as $value) {
                $option = new Option();
                $i = +$i + 1;
                if ($arrayValues[(+$i - 1)] != "0") {
                    $option->correct_answer = true;
                } else {
                    $option->correct_answer = false;
                }
                $option->answer_data = $value;
                $option->id_events = $event->id;

                $option->save();
            }
        }



        if (!is_null($unit_id)) {
            $unitEvent = new UnitsEvent();

            $unitEvent->id_events = $event->id;
            $unitEvent->id_units = $unit_id;

            $unitEvent->save();

            return redirect()->route('activities.detail', ['id' => Unit::find($unit_id)->id_activities]);
        }



        return redirect()->route('events/option', [$option_id]);


    }

    /**
     * Function for Updating an option
     *
     * Done, working - by Volko
     *
     * @param Request $request
     * @param $option_id
     * @param null $unit_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function eventUpdateOption(Request $request, $option_id, $unit_id = null)
    {

        /**
         * Geting opton from id
         */

        $option = Option::find($option_id);

        /**
         * Geting new option answer data and checking if answer was given as correct
         */
        $option->answer_data = $request['data'];
        if (($request['checkbox'])=="on"){
            $option->correct_answer = true;
        } else {
            $option->correct_answer = false;

        }


        /**
         * Saving option and redirect to view
         */

                $option->save();





        return redirect()->route('events/edit', [$option->id_events]);

    }


    /**
     * Function for Deleting an event
     *
     * Done, working - by Volko
     *
     * @param $id - id of event
     * @return other function of this Controller
     */
    public function delete($id)
    {

        /**
         * Geting event of given id
         */
        $event = Event::find($id);

        /**
         * Checking rights
         */
        if(Auth::user()->id != $event->id_users) {
            abort(403);
        }

        /**
         * Deleting event and run other function (eventGetAllEvents)
         */
        $event->delete();

        return $this->eventGetAllEvents();
    }


    /**
     * Function for Updating an event
     *
     * Done, working - by Volko
     *
     * @param $id - id of Option to be deleted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteOption($id)
    {

        $option = Option::find($id);

        $option->delete();

        return redirect()->route('events/edit', [$option->id_events]);
    }

}



