<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\QueryException;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
            if(count($events) > 0) {
                return response()->json($events, 200);
            } else {
                return response()->json(null, 404);
            }
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
     *      description="Creates new unit, format: "activity_ids": [1]",
     *      security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body has to contain title, description. activity_ids must contain at least one valid activity id",
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
            $unit->activities()->sync($request['activity_id']);
            $unit->save();
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
                Log::debug($request['activity_ids']);
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
}
