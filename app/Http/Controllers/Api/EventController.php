<?php

/**
 * Created by Bernad on 11/6/2017.
 */

namespace App\Http\Controllers\Api;

use App\Models\Help;
use App\Models\Option;
use App\Models\UserEventTestAnswer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventType;
use App\Models\User;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use function GuzzleHttp\Psr7\str;


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
     * @OA\Get(
     *      path="/api/events/{id}",
     *      operationId="getEvent",
     *      tags={"Event"},
     *      summary="Gets event",
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
     *          description="OK"
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
        try{
            $event = Event::find($id);
            if($event) {
                return response()->json($event, 200);
            } else {
                return response()->json("Event not found", 404);
            }
        }catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400); // bad id provided -> id too big for integer
            } else {
                return response()->json(null, 500);
            }
        }
    }
    /**
     * @OA\Get(
     *      path="/api/events/",
     *      operationId="getEvents",
     *      tags={"Event"},
     *      summary="Get events",
     *      description="Returns all events",
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *     )
     */

    public function getEvents() {
        try{
            $events = Event::all();
            return response()->json($events, 200);
        }catch(QueryException $e) {
            return response()->json(null, 500);
        }
    }

    /**
     * @OA\Put(
     *      path="/api/events/{id}",
     *      operationId="putEvent",
     *      tags={"Event"},
     *      summary="Updates event",
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
     *         description="Request body does not need to contain all 'event' fields",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="message", type="string"),
     *          @OA\Property(property="time_to_explain", type="integer")
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Event not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body/ID supplied",
     *      ),
     *     )
     */

    public function updateEvent(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'message' => 'string',
            'header' => 'string',
            'time_to_explain' => 'integer',
            'time_to_handle' => 'integer',
            'event_type_id' => 'integer',
            'author_id' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try{
            $event = Event::find($id);
            if($event) {
                $event->update($request->all());
                return response()->json($event, 200);
            } else {
                return response()->json("Event not found", 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/events/{id}",
     *      operationId="deleteEvent",
     *      tags={"Event"},
     *      summary="Deletes event",
     *      description="Deletes 'event' by id",
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
     *          description="OK"
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
    public function deleteEvent($id) {
        try{
            $deleted = Event::where('id', $id)->delete();
        } catch (QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
            } else {
                return response()->json(null, 500);
            }
        }
        if($deleted) {
            return response()->json("deleted", 200);
        } else {
            return response()->json("Event not found", 404);
        }
    }

    /**
     * @OA\Put(
     *      path="/api/events",
     *      operationId="putEvents",
     *      tags={"Event"},
     *      summary="Updates events",
     *      description="Updates events",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Array of JSON objects with fields that are going to be updated. Id field is required.",
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Event not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body supplied",
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
            '*.event_type_id' => 'integer',
            '*.author_id' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        $updatedEvents = [];
        DB::beginTransaction();
        foreach($request->all() as $event) {
            try{
                $eventToUpdate = Event::find($event["id"]);
                if($eventToUpdate) {
                    $eventToUpdate->update($event);
                    $updatedEvents[] = $eventToUpdate;
                } else {
                    DB::rollback();
                    return response()->json(null, 404);
                }
            } catch (QueryException $e) {
                DB::rollback();
                if($e->getCode() === '22003') {
                    return response()->json(null, 400);
                } else {
                    return response()->json(null, 500);
                }
            }
        }
        DB::commit();
        return response()->json($updatedEvents, 200);
    }

    /**
     * @OA\Get(
     *      path="/api/events/{id}/options",
     *      operationId="getEventOptions ",
     *      tags={"Event"},
     *      summary="Gets all options of event",
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="No options not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getEventOptions($id) {
        try{
            $options = Option::where("event_id", $id)->get();
            if(count($options) > 0) {
                return response()->json($options, 200);
            } else {
                return response()->json([], 200);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/events/{id}/options",
     *      operationId="deleteEventOptions ",
     *      tags={"Event"},
     *      summary="Deletes all options of event",
     *      description="Deletes all 'options' of event",
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="No options found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function deleteEventOptions($id) {
        try{
            $options = Option::where("event_id", $id)->get();
            if(count($options) > 0) {
                foreach($options as $option) {
                    $option->delete();
                }
                return response()->json(null, 200);
            } else {
                return response()->json(null, 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Post(
     *      path="/api/events",
     *      operationId="createEvent",
     *      tags={"Event"},
     *      summary="Creates new event",
     *      description="Creates new event",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body has to contain message, header, event_type_id fields. Time_to_hadnle has value 50 set as default. Time_to_explain has value 100 set as default.",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="message", type="string"),
     *          @OA\Property(property="header", type="string"),
     *          @OA\Property(property="time_to_explain", type="integer"),
     *          @OA\Property(property="time_to_handle", type="integer"),
     *          @OA\Property(property="event_type_id", type="integer"),
     *          @OA\Property(property="category_ids", type="array", @OA\Items(type="integer") )
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body supplied",
     *      ),
     *     security={{"bearerAuth":{}}},
     *     )
     */

    public function createEvent (Request $request) {
        $validator = Validator::make($request->all(), [
            'message' => 'string|required',
            'header' => 'string|required',
            'time_to_explain' => 'integer',
            'time_to_handle' => 'integer',
            'event_type_id' => 'integer|required',
            'category_ids.*' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }
        try{
            $event = new Event();
            $event->message = $request['message'];
            $event->header = $request['header'];
            $event->time_to_explain = isset($request['time_to_explain']) ? $request['time_to_explain'] : 100;
            $event->time_to_handle = isset($request['time_to_handle']) ? $request['time_to_handle'] : 50;
            $event->event_type_id = $request['event_type_id'];
            $event->author_id = Auth::user()->id;

            // change user type to author
            $user = User::find(Auth::user()->id);
            $user->user_type_id = 3;
            $user->save();
            $event->save();

            foreach($request['category_ids'] as $categories) {
                $event_categories = new EventCategory;
                $event_categories->category_id = $categories;
                $event_categories->event_id = $event['id'];
                $event_categories->save();
            }
        }catch (QueryException $e) {
            return response()->json($e, 500); // f.e. postgres id counter is not set up properly
        }
        return response()->json($event, 200);
    }

    /**
     * @OA\Get(
     *      path="/api/events/{id}/event_types",
     *      operationId="getEventType",
     *      tags={"Event"},
     *      summary="Gets type of event",
     *      description="Returns 'event_type' by event id",
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
     *          description="OK"
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

    public function getEventTypes($id) {
        try{
            $event = Event::find($id);
            if($event) {
                $event_type = EventType::where("id", $event->event_type_id)->first();
                return response()->json($event_type, 200);
            } else {
                return response()->json(null, 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Get(
     *      path="/api/events/{id}/event_helps",
     *      operationId="getEventHelps",
     *      tags={"Event"},
     *      summary="Gets helps of event",
     *      description="Returns 'event_helps' by event id",
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getEventHelps($id) {
        try{
            $helps = Help::where("event_id", $id)->get();

            return response()->json($helps, 200);

        } catch(QueryException $e) {
            if($e->getCode() === '22003'){
                return response()->json("ID is too long", 400);
            }else{
                return response()->json(null, 500);
            }
        }
    }


    /**
     * @OA\Put(
     *      path="/api/options/{id}",
     *      operationId="putOption",
     *      tags={"Option"},
     *      summary="Updates option",
     *      description="Updates option",
     *      @OA\Parameter(
     *          name="id",
     *          description="Option id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body does not need to contain all 'option' fields",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="correct_answer", type="boolean"),
     *          @OA\Property(property="answer_data", type="string")
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Option not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body/ID supplied",
     *      ),
     *     )
     */

    public function updateOption(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'correct_answer' => 'boolean',
            'answer_data' => 'string',
            'event_id' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try{
            $option = Option::find($id);
            if($option) {
                $option->update($request->all());
                return response()->json($option, 200);
            } else {
                return response()->json(null, 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Put(
     *      path="/api/options",
     *      operationId="putOptions",
     *      tags={"Option"},
     *      summary="Updates options",
     *      description="Updates options",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Array of JSON objects with fields that are going to be updated. Id field is required.",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="array",
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="correct_answer", type="boolean"),
     *                      @OA\Property(property="answer_data", type="string")
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Option not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body supplied",
     *      ),
     *     )
     */

    public function updateOptions(Request $request) {
        $validator = Validator::make($request->all(), [
            '*.id' => 'integer|required',
            '*.correct_answer' => 'boolean',
            '*.answer_data' => 'string',
            '*.event_id' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        $updatedOptions = [];
        DB::beginTransaction();
        foreach($request->all() as $option) {
            try{
                $optionToUpdate = Option::find($option["id"]);
                if($optionToUpdate) {
                    $optionToUpdate->update($option);
                    $updatedOptions[] = $optionToUpdate;
                } else {
                    DB::rollback();
                    return response()->json(null, 404);
                }
            } catch(QueryException $e){
                DB::rollback();
                if($e->getCode() === '22003') {
                    return response()->json(null, 400);
                } else {
                    return response()->json(null, 500);
                }
            }
        }
        DB::commit();
        return response()->json($updatedOptions, 200);
    }

    /**
     * @OA\Post(
     *      path="/api/options",
     *      operationId="createOption",
     *      tags={"Option"},
     *      summary="Creates new option",
     *      description="Creates new option",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body has to contain correct_answer, answer_data, event_id",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="correct_answer", type="boolean"),
     *          @OA\Property(property="answer_data", type="string"),
     *          @OA\Property(property="event_id", type="integer")
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body supplied",
     *      ),
     *     )
     */

    public function createOption(Request $request) {
        $validator = Validator::make($request->all(), [
            'correct_answer' => 'boolean|required',
            'answer_data' => 'string|required',
            'event_id' => 'integer|required',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }
        try{
            $option = new Option();
            $option->correct_answer = $request['correct_answer'];
            $option->answer_data = $request['answer_data'];
            $option->event_id = $request['event_id'];
            $option->save();
        } catch(QueryException $e){
            return response()->json(null, 500);
        }
        return response()->json($option, 200);
    }

    /**
     * @OA\Delete(
     *      path="/api/options/{id}",
     *      operationId="deleteOption",
     *      tags={"Option"},
     *      summary="Deletes option",
     *      description="Deletes 'option' by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Option id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Option not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */
    public function deleteOption($id) {
        try{
            $deleted = Option::where('id', $id)->delete();
        } catch(QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
            } else {
                return response()->json(null, 500);
            }
        }
        if($deleted) {
            return response()->json("Deleted", 200);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/events/filter",
     *      operationId="filterEvents",
     *      tags={"Event"},
     *      summary="Filters existing events based on selected categories",
     *      description="User can choose what categories he wants to filter by. Categories should be sent in an array with their ID's",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *       required=true,
     *       description="JSON should hold 1 array, if no filtering is needed send empty array, function will return all events",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="category_ids", type="array", @OA\Items(type="integer")),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="No content"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Data validation error - Invalid JSON body supplied",
     *      ),
     *     )
     */
    public function filterEvents(Request $request){
        $validator = Validator::make($request->all(), [
            'category_ids.*' => 'integer',
        ]);
        if($validator->fails()) {
            return response()->json(['Data validation error - Invalid JSON body supplied'=>$validator->errors()], 400);
        }
        try{
            //Function receives a list of category ids, filters events which have one of those categories, at the end returns only unique events
            $filtered_events;
            $categories_count = count($request['category_ids']);
            if($categories_count == 0){
                $filtered_events = Event::all();
            }
            else {
                $categories = $request['category_ids'];
                sort($categories);
                
                $array_string='ARRAY[';
                for($i=0; $i<$categories_count; $i++){
                    if($i == 0){
                        $array_string .= $categories[$i];
                    }
                    else{
                        $array_string .= ','.$categories[$i];
                    }
                }
                $array_string.=']';
                //SELECT event.*, ARRAY_AGG(CATEGORY_ID ORDER BY CATEGORY_ID) categories FROM event JOIN EVENT_CATEGORY EC on EVENT.ID = EC.EVENT_ID GROUP BY event.id HAVING ARRAY[1,3] = ARRAY_AGG(CATEGORY_ID);
                $filtered_events = Event::select(\DB::raw('events.*, array_agg(event_categories.category_id ORDER BY event_categories.category_id) as categories'))
                            ->join('event_categories', 'events.id', '=', 'event_categories.event_id')
                            ->groupBy('events.id')
                            ->havingRaw('array_agg(event_categories.category_id ORDER BY event_categories.category_id) @> '.$array_string)
                            ->get();
            }

            if($filtered_events->isEmpty()){
                return response()->json(null, 204);
            }
            else{
                return response()->json($filtered_events, 200);
            }
        } catch(QueryException $e){
           return response()->json($e, 500);
       }
    }

    /**
     * @OA\Post(
     *      path="/api/events/own",
     *      operationId="filterOwnEvents",
     *      tags={"Event"},
     *      summary="Filters existing events based on selected categories",
     *      description="User can choose what categories he wants to filter by. Categories should be sent in an array with their ID's",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *       required=true,
     *       description="JSON should hold 1 array, if no filtering is needed send empty array, function will return all events",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="category_ids", type="array", @OA\Items(type="integer")),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="No content"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Data validation error - Invalid JSON body supplied",
     *      ),
     *     )
     */
    public function filterOwnEvents(Request $request){
        $validator = Validator::make($request->all(), [
            'category_ids.*' => 'integer',
        ]);
        if($validator->fails()) {
            return response()->json(['Data validation error - Invalid JSON body supplied'=>$validator->errors()], 400);
        }
        try{
            //Function receives a list of category ids, filters events which have one of those categories, at the end returns only unique events
            $filtered_events;
            $categories_count = count($request['category_ids']);
            if($categories_count == 0){
                $filtered_events = Event::select(\DB::raw('events.*'))
                                        ->where('author_id',Auth::user()->id)
                                        ->get();
            }
            else {
                $categories = $request['category_ids'];
                sort($categories);
                
                $array_string='ARRAY[';
                for($i=0; $i<$categories_count; $i++){
                    if($i == 0){
                        $array_string .= $categories[$i];
                    }
                    else{
                        $array_string .= ','.$categories[$i];
                    }
                }
                $array_string.=']';
                //SELECT event.*, ARRAY_AGG(CATEGORY_ID ORDER BY CATEGORY_ID) categories FROM event JOIN EVENT_CATEGORY EC on EVENT.ID = EC.EVENT_ID GROUP BY event.id HAVING ARRAY[1,3] = ARRAY_AGG(CATEGORY_ID);
                $filtered_events = Event::select(\DB::raw('events.*, array_agg(event_categories.category_id ORDER BY event_categories.category_id) as categories'))
                            ->join('event_categories', 'events.id', '=', 'event_categories.event_id')
                            ->groupBy('events.id')
                            ->havingRaw('array_agg(event_categories.category_id ORDER BY event_categories.category_id) @> '.$array_string)
                            ->where('author_id',Auth::user()->id)
                            ->get();
            }

            if($filtered_events->isEmpty()){
                return response()->json(null, 204);
            }
            else{
                return response()->json($filtered_events, 200);
            }
        } catch(QueryException $e){
           return response()->json($e, 500);
       }
    }
}

