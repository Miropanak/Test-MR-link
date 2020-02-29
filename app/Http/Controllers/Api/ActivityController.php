<?php

namespace App\Http\Controllers\Api;



use App\Models\Activity;
use App\Models\ActivityUnit;
use App\Models\ActivityUsers;
use App\Http\Controllers\Controller;
use App\Models\StudyField;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Clue\StreamFilter\fun;

/**
 * Class ActivityController that handles activities
 * @package App\Http\Controllers
 */
class ActivityController extends Controller
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

    private function isRegistered($subscribers, $user_id){

        foreach ($subscribers as $subscriber)
            if($subscriber->id == $user_id)
                return true;
        return false;
    }

    /**
     * @OA\Get(
     *      path="/api/activity/all",
     *      operationId="getActivities",
     *      tags={"Activity"},
     *      summary="get all activities",
     *      description="Returns 'activities'",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *  )
     */
    public function getActivities()
    {
        $activities = Activity::all();
        return response()->json($activities,200);
    }

    /**
     * @OA\Get(
     *      path="/api/activity/study/fields",
     *      operationId="getStudyFields",
     *      tags={"Activity"},
     *      summary="get all fields of study",
     *      description="Returns 'fields of study'",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       )
     *  )
     */
    public function getStudyFields()
    {
        $fields = StudyField::all();
        return response()->json($fields, 200);
    }

    /**
     * @OA\Get(
     *      path="/api/activity/{id}",
     *      operationId="getActivity",
     *      tags={"Activity"},
     *      summary="Show activity detail",
     *      description="Returns 'activity', 'users', 'registered' and title",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Activity not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *  )
     */
    public function getActivity($id)
    {
        try{
            $activity = Activity::find($id);
            $users = $activity->subscriber;
            $registered = $this->isRegistered($activity->subscriber, Auth::user()->id);
            $title = $activity->title;

            if($activity) {
                return response()->json([
                    "activity" => $activity,
                    "registered" => $registered,
                    "users" => $users,
                    "title" => $title
                ],200);
            } else {
                return response()->json(null, 404);
            }
        }catch(QueryException $e) {
            if ($e->getCode() === '22003') {
                return response()->json(null, 400); // bad id provided -> id too big for integer
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Get(
     *      path="/api/activity/{id}/units",
     *      operationId="getActivityUnits",
     *      tags={"Activity"},
     *      summary="Gets all units of activity",
     *      description="Returns 'units' of activity by activity id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Activity id",
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
     *          description="No units not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getActivityUnits($id) {
        try{
            $units = Activity::find($id)->units()->orderBy('unit_order_number')->get();
            return response()->json($units, 200);

        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Get(
     *      path="/api/activity/{id}/subscribers",
     *      operationId="getSubscribers",
     *      tags={"Activity"},
     *      summary="get all subscribers of activity",
     *      description="Returns 'subscribers'",
     *      @OA\Parameter(
     *          name="id",
     *          description="Activity id",
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
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *   )
     */
    public function getSubscribers($id)
    {
        try{
            $subs = Activity::find($id)->subscriber()->orderBy('name')->get();
            return response()->json($subs, 200);

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
     *      path="/api/activity",
     *      operationId="createActivity",
     *      tags={"Activity"},
     *      summary="Creates new activity",
     *      description="Creates new activity",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *       required=true,
     *       description="",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               @OA\Property(
     *                      property="title",
     *                      type="string",
     *                ),
     *                @OA\Property(
     *                      property="content",
     *                      type="string",
     *               ),
     *               @OA\Property(
     *                      property="public",
     *                      type="boolean",
     *               ),
     *               @OA\Property(
     *                      property="study_field_id",
     *                      type="integer",
     *               )
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
     *     )
     */

    public function createActivity(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|string|max:50',
            'content' => 'required|string|max:1000',
            'study_field_id' => 'required|integer',
            'public' => 'required|boolean'
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try{
            $activity = Activity::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'public' => $data['public'],
                'validated' => false,
                'study_field_id' => $data['study_field_id'],
                'author_id' => Auth::user()->id
            ]);
        }catch (QueryException $e) {
            return response()->json(null, 500);
        }

        if(Auth::user()->user_type_id == 3){
            Auth::user()->user_type_id = 4;
            Auth::user()->save();
        }

        return response()->json($activity,200);
    }

    /**
     * @OA\Post(
     *      path="/api/activity/{id}/clone",
     *      operationId="cloneActivity",
     *      tags={"Activity"},
     *      summary="Clone activity",
     *      description="Cloned activity",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Activity not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *  )
     */

    public function cloneActivity($id)
    {
        try{
            $old_activity = Activity::find($id);

            $new_activity = $old_activity->replicate();
            $new_activity->author_id = Auth::user()->id;
            $new_activity->save();

            //re-sync everything, and change unit order number
            $extra = array_map(function($order_num){
                return ['unit_order_number' => $order_num];
            }, $old_activity->units()->pluck('unit_order_number')->toArray());
            $data = array_combine($old_activity->units()->pluck('unit_id')->toArray(), $extra);

            $new_activity->units()->sync($data);

            return response()->json([
                'activity'=>$new_activity,
                'subscribers'=>$new_activity->subscriber,
                'title'=>$new_activity->title,]);
        }catch(QueryException $e) {
            if ($e->getCode() === '22003') {
                return response()->json(null, 400); // bad id provided -> id too big for integer
            } else {
                return response()->json(null, 500);
            }
        }
    }


    /**
     * @OA\Put(
     *      path="/api/activity/{id}",
     *      operationId="updateActivity",
     *      tags={"Activity"},
     *      summary="Update new activity",
     *      description="Update new activity",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="id",
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
     *                      property="title",
     *                      type="string",
     *                ),
     *                @OA\Property(
     *                      property="content",
     *                      type="string",
     *               ),
     *               @OA\Property(
     *                      property="public",
     *                      type="boolean",
     *               ),
     *               @OA\Property(
     *                      property="study_field_id",
     *                      type="integer",
     *               )
     *           )
     *        )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Activity not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied/validation error",
     *      ),
     *     )
     */

    public function updateActivity(Request $request, $id) {

        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|string|max:50',
            'content' => 'required|string|max:1000',
            'study_field_id' => 'required|integer',
            'public' => 'boolean'
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }


        try{
            $activity = Activity::find($id);
            if($activity) {

                if(Auth::user()->id != $activity->author->id) {
                    return response()->json('Only author can edit activity', 403);
                }

                $activity->update($data);
                $activity->save();

                return $this->getActivity($id);
            } else {
                return response()->json('Cant find that bitch', 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json($e, 400);
            } else {
                return response()->json($e, 500);
            }
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/activity/{id}",
     *      operationId="deleteActivity",
     *      tags={"Activity"},
     *      summary="Deletes Activity",
     *      description="Deletes 'activity' by id, but only author can delete his activity",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Activity id",
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
     *          description="Activity not found"
     *       ),
     *       @OA\Response(
     *          response=403,
     *          description="Unauthorized"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *    )
     */
    public function deleteActivity($id) {
        try{
            $activity = Activity::find($id);

            if($activity) {
                if(Auth::user()->id != $activity->author->id) {
                    return response()->json('Only author can edit activity', 403);
                }
                $activity->delete();

                return response()->json('Activity with id '.$id.' has been deleted', 200);
            } else {
                return response()->json('Cant find that bitch', 404);
            }
        } catch(QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Put(
     *      path="/api/activity/{id}/unit",
     *      operationId="addUnitToActivity",
     *      tags={"Activity"},
     *      summary="Adds Unit to Activity",
     *      description="Adds Unit to Activity",
     *      security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Activity id",
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
     *                      property="unit_id",
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
     *     )
     */
    public function addUnitToActivity(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'unit_id' => 'required|integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        $order_number = ActivityUnit::where('activity_id',$id)->latest('unit_order_number')->first()->unit_order_number;

        try {
            $activity = Activity::find($id);
            if(Auth::user()->id != $activity->author->id) {
                return response()->json('Only author can add unit to activity', 403);
            }

            if ($activity) {
                $activity->units()->syncWithoutDetaching($request['unit_id']);
                $junction = ActivityUnit::where('unit_id',$request['unit_id'])->first();
                $junction->unit_order_number = $order_number + 1; // vo vazobnej tabulke zvys poradie novej unity
                $junction->save();
                return response()->json($activity, 200);
            }
        } catch (QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }

    }

    /**
     * @OA\Put(
     *      path="/api/activity/{id}/student",
     *      operationId="addStudentsToActivity",
     *      tags={"Activity"},
     *      summary="Adds Student to Activity",
     *      description="Adds Student to Activity",
     *      security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Activity id",
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
     *                      property="student_ids",
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
     *     )
     */

    public function addStudent(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'student_ids*' => 'required|integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try {
            $activity = Activity::find($id);
            if ($activity) {
                $activity->subscriber()->sync($request['student_ids']);
                return response()->json($activity, 200);
            }
        } catch (QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Put(
     *      path="/api/activity/{id}/order/units",
     *      operationId="changeUnitOrder",
     *      tags={"Activity"},
     *      summary="Change order of units of activity",
     *      description="In junction table change order of units for specified activity, by sending unit ids(as array) in wanted order",
     *      security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Activity id",
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
     *                      property="unit_ids",
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
     *     )
     */
    public function changeUnitOrder(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'unit_ids*' => 'required|integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try {
            $activity = Activity::find($id);
            if ($activity) {
                foreach ($request['unit_ids'] as $key => $unit_id){
                    $junction_update = ActivityUnit::where('activity_id',$activity->id)->where('unit_id',$unit_id)->first();
                    $junction_update->unit_order_number = $key;
                    $junction_update->save();
                }
                return $this->getActivityUnits($id);
            }
        } catch (QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }

    }

    /**
     * @OA\Put(
     *      path="/api/activity/{id}/units",
     *      operationId="updateUnitArrayInActivity",
     *      tags={"Activity"},
     *      summary="Replaces Units in Activity with specified Units",
     *      description="Replaces Units in Activity with specified Units. Unit_ids array may be empty",
     *      security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Activity id",
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
     *                      property="unit_ids",
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
     *     )
     */
    public function updateUnitArrayInActivity(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'unit_ids.*' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }


        try {
            $activity = Activity::find($id);
            if(Auth::user()->id != $activity->author->id) {
                return response()->json('Only author can update units in activity', 403);
            }
            if ($activity) {
                $activity->units()->sync($request['unit_ids']);
                return response()->json($activity, 200);
            }
        } catch (QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }

    }

}
