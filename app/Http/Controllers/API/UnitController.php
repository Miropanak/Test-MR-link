<?php

namespace App\Http\Controllers\API;

use App\ActivityUnit;
use Exception;
use Illuminate\Database\QueryException;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;


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
     * @OA\Get(
     *      path="/api/units/{id}",
     *      operationId="getUnit",
     *      tags={"Unit"},
     *      summary="Gets unit",
     *      description="Returns 'unit' by id",
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
     *      @OA\Response(
     *          response=404,
     *          description="Unit not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getUnit($id) {
        try{
            $unit = Unit::find($id);
            if($unit) {
                return response()->json($unit, 200);
            } else {
                return response()->json(null, 404);
            }
        }catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Get(
     *      path="/api/units/{id}/events",
     *      operationId="getUnitEvents ",
     *      tags={"Unit"},
     *      summary="Gets all events of unit",
     *      description="Returns 'events' of unit by unit id",
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
     *      @OA\Response(
     *          response=404,
     *          description="No events not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getUnitEvents($id) {
        try{
            $events = Unit::find($id)->events;
            return response()->json($events, 200);
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Post(
     *      path="/api/units",
     *      operationId="createUnit",
     *      tags={"Unit"},
     *      summary="Creates new unit",
     *      description="Creates new unit",
     *      security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body has to contain title, description. activity_ids must contain at least one valid activity id - format: 'activity_ids': [1]",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="title", type="string"),
     *          @OA\Property(property="description", type="string"),
     *          @OA\Property(property="activity_ids", type="integer")
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

    public function createUnit(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'string|required',
            'description' => 'string|required',
            'activity_ids' => 'required',
            'activity_ids.*' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }
        try{
            $unit = new Unit();
            $unit->title = $request['title'];
            $unit->description = $request['description'];
            $unit->author_id = Auth::user()->id;

            if(count($request['activity_ids']) < 1) {
                return response()->json("Unit must belong to an activity", 400);
            }
            $unit->save();
            $unit->activities()->sync($request['activity_ids']);
        }catch (Exception $e) {
            return response()->json($e, 500);
        }
        return response()->json($unit, 200);
    }

    /**
     * @OA\Put(
     *      path="/api/units/{id}",
     *      operationId="putUnit",
     *      tags={"Unit"},
     *      summary="Updates unit",
     *      description="Updates unit",
     *      @OA\Parameter(
     *          name="id",
     *          description="Unit id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body does not need to contain all 'unit' fields. Field activity_ids is array of activities to which unit belongs to. After update unit will belong to only activities specified in activity_ids array.",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="title", type="string"),
     *          @OA\Property(property="description", type="string"),
     *          @OA\Property(property="activity_ids", type="integer")
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Unit not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function updateUnit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'title' => 'string',
            'description' => 'string',
            'activity_ids.*' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try{
            $unit = Unit::find($id);
            if($unit) {
                $unit->update($request->all());

                if($request->has('activity_ids'))
                {
                    if(count($request['activity_ids']) < 1) {
                        return response()->json("Unit must belong to an activity", 400);
                    }
                    $unit->activities()->sync($request['activity_ids']);
                }
                return response()->json($unit, 200);
            } else {
                return response()->json(null, 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json($e, 400);
            } else {
                Log::debug($e);
                return response()->json($e, 500);
            }
        }
    }

    /**
     * @OA\Put(
     *      path="/api/units/{id}/events",
     *      operationId="updateEventArrayInUnit",
     *      tags={"Unit"},
     *      summary="Replaces Events in Units with specified Events",
     *      description="Replaces Events in Units with specified Events. Activity id must be specified, so we dont update clones. Event_ids array may be empty",
     *      security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Unit id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *       required=true,
     *       description="",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               @OA\Property(
     *                      property="activity_id",
     *                      type="integer",
     *                ),
     *               @OA\Property(
     *                      property="event_ids",
     *                      type="integer",
     *                )
     *           )
     *        )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body supplied",
     *      ),
     *     @OA\Response(
     *         response=404,
     *         description="Invalid unit ID supplied",
     *      ),
     *    )
     */
    public function updateEventArrayInUnit(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'event_ids.*' => 'integer',
            'activity_id' => 'integer|required',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }
        try {
            $unit = Unit::find($id);
            if ($unit) {
                $new_unit = $this->graceful_unit_update($unit, $request['event_ids'], $request['activity_id']);
                return response()->json($new_unit->events, 200);
            } else {
                return response()->json('Cant find unit with specified id', 404);
            }
        } catch (QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }

    }

    public function graceful_unit_update($unit, $new_events, $activity_id){
        $old_events = $unit->events()->get()->pluck('id');

        if($old_events === $new_events) {
            return $unit;
        } else {
            // check if unit is assigned to more activities
            if (count(ActivityUnit::where('unit_id',$unit->id)->get())>1){
                //clone unit so we can put changes into new one, and old one will stay linked to activity clones
                $new_unit = $unit->replicate();
                $new_unit->author_id = Auth::user()->id;
                $new_unit->push();
                $new_unit->events()->sync($new_events);

                // update junction table and order number
                $new_unit->activities()->attach($activity_id);
                $new_order_num = ActivityUnit::where('activity_id',$activity_id)->where('unit_id',$new_unit->id)->first();
                $old_order_num = ActivityUnit::where('activity_id',$activity_id)->where('unit_id',$unit->id)->first();
                $new_order_num->unit_order_number = $old_order_num->unit_order_number; // set order like old unit
                $new_unit->save();

                // delete relationship with old unit of specified activity
                $unit->activities()->detach($activity_id);
                return $new_unit;
            } else {
                $unit->events()->sync($new_events); // if not, we can just asign new events to unit
                return $unit;
            }
        }

    }
}