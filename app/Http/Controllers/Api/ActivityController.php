<?php

namespace App\Http\Controllers\Api;



use App\Models\Activity;
use App\Models\User;
use App\Models\Unit;
use App\Models\EventProgress;
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
     *          description="OK"
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
     *          description="OK"
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
     *          description="OK"
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
            if(!$activity){
                return response()->json("Activity not found", 404);
            }
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
                return response()->json("Activity not found", 404);
            }
        }catch(QueryException $e) {
            if ($e->getCode() === '22003') {
                return response()->json("ID is too long", 400); // bad id provided -> id too big for integer
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Get(
     *      path="/api/activity/{activityid}/{unitid}",
     *      operationId="getUserProgress",
     *      tags={"Activity"},
     *      summary="Load the users progress",
     *      description="Returns an array of event ids the user marked as done",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="activityid",
     *          description="activityid",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="unitid",
     *          description="unitid",
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
     *          description="Activity not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *  )
     */
    public function getUserProgress($activityid,$unitid)
    {
        try{
            $user = Auth::user()->id;
            $activity = Activity::find($activityid);
            if(!$activity){
                return response()->json("Activity not found", 404);
            }
            $unit = Unit::find($unitid);
            if(!$unit){
                return response()->json("Unit not found", 404);
            }
            $where_condition = ['activity_id' => $activityid, 'user_id' => $user, 'unit_id' => $unitid];
            
            $result = EventProgress::where($where_condition)->get();
        
            if(count($result)) {
                return response()->json(json_decode($result[0]->done)->id,200);
            } else {
                return response()->json([], 200);
            }
        }catch(QueryException $e) {
            if ($e->getCode() === '22003') {
                return response()->json("ID is too long", 400); // bad id provided -> id too big for integer
            } else {
                return response()->json($e, 500);
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Activity not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getActivityUnits($id) {
        try{
            $activity = Activity::find($id);
            if($activity){
                $units = Activity::find($id)->units()->orderBy('unit_order_number')->get();
                return response()->json($units, 200);
            }else{
                return response()->json("Activity not found", 404);
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *        @OA\Response(
     *          response=404,
     *          description="Activity not found"
     *       ),
     *   )
     */
    public function getSubscribers($id)
    {
        try{
            $activity = Activity::find($id);
            if($activity){
                $subs = Activity::find($id)->subscriber()->orderBy('name')->get();
                return response()->json($subs, 200);
            }else{
                return response()->json("Activity not found", 404);
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
     *          description="OK"
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
     *          description="OK"
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
            if ($old_activity){
                $new_activity = $old_activity->replicate();
                if (strlen($old_activity->title) > 240){  // fuck users
                    $new_activity->title = substr($old_activity->title, 0, 240) . '[klon]';
                } else {
                    $new_activity->title = $old_activity->title .'[klon]';
                }
                $new_activity->author_id = Auth::user()->id;
                $new_activity->push();
                // copy tests
                foreach($old_activity->tests as $test){
                    $test->activity_id = $new_activity->id;
                    $new_activity->tests = $test->replicate();
                    $new_activity->tests->push();
                    $new_activity->tests->events()->sync($test->events);
                }

                //re-sync everything, and change unit order number
                $extra = array_map(function($order_num){
                    return ['unit_order_number' => $order_num];
                }, $old_activity->units()->pluck('unit_order_number')->toArray());
                $data = array_combine($old_activity->units()->pluck('unit_id')->toArray(), $extra);

                $new_activity->units()->sync($data);

                return response()->json([
                    'activity'=>$new_activity,
                    'subscribers'=>$new_activity->subscriber,
                    'title'=>$new_activity->title,], 200);
            }else{
                return response()->json("Activity not found", 404);
            } 
        }catch(QueryException $e) {
            if ($e->getCode() === '22003') {
                return response()->json("ID is too long", 400); // bad id provided -> id too big for integer
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Activity not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied/Invalid JSON supplied",
     *      ),
     *      @OA\Response(
     *         response=403,
     *         description="Access forbidden",
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

                return response()->json($this->getActivity($id), 200);
            } else {
                return response()->json('Activity not found', 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Activity not found"
     *       ),
     *       @OA\Response(
     *          response=403,
     *          description="Access forbidden"
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
                return response()->json('Activity not found', 404);
            }
        } catch(QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body supplied",
     *      ),
     *      @OA\Response(
     *         response=404,
     *         description="Activity not found",
     *      ),
     *      @OA\Response(
     *         response=403,
     *         description="Access forbidden",
     *      ),
     *     )
     */
    public function addUnitToActivity(Request $request, $id) {
        $activity = Activity::find($id);
        if(!$activity){
            return response()->json("Activity not found", 404);
        }
        
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
            }else{
                return response()->json("Activity not found", 404);
            }
        } catch (QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
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
     *      summary="Adds/Removes Student to Activity",
     *      description="Api takes an array of student id's that are supposed to be in the activity. The old array is overwritten with the new one",
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
     *       description="JSON should hold 1 array. To remove all students send empty array",
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
     *         response=400,
     *         description="Invalid JSON body/ID supplied",
     *      ),
     *      @OA\Response(
     *         response=404,
     *         description="Activity not found",
     *      ),
     *     )
     */

    public function addStudent(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'student_ids*' => 'present|array',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try {
            $activity = Activity::find($id);
            if ($activity) {
                $activity->subscriber()->sync($request['student_ids']);
                return response()->json($activity->subscriber, 200);
            }else{
                return response()->json("Activity not found", 404);
            }
        } catch (QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body/ID supplied",
     *      ),
     *      @OA\Response(
     *         response=404,
     *         description="Activity not found",
     *      ),
     *     )
     */
    public function changeUnitOrder(Request $request, $id) {
        $activity = Activity::find($id);
        if(!$activity){
            return response()->json("Activity not found", 404);
        }
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
            } else {
                return response()->json("Activity not found", 404);
            }
        } catch (QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
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
     *          description="OK"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body/ID supplied",
     *      ),
     *      @OA\Response(
     *         response=403,
     *         description="Access forbidden",
     *      ),
     *      @OA\Response(
     *         response=404,
     *         description="Activity not found",
     *      ),
     *     )
     */
    public function updateUnitArrayInActivity(Request $request, $id) {
        $activity = Activity::find($id);
        if(!$activity){
            return response()->json("Activity not found", 404);
        }
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
            }else{
                return response()->json("Activity not found", 404);
            }
        } catch (QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
            } else {
                return response()->json(null, 500);
            }
        }

    }

    /**
     * @OA\Put(
     *      path="/api/activity/save",
     *      operationId="saveProgress",
     *      tags={"Activity"},
     *      summary="save Progress",
     *      description="save",
     *      security={{"bearerAuth":{}}},
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
     *                      property="unit_id",
     *                      type="integer",
     *                ),
     *               @OA\Property(
     *                      property="states",
     *                      type="integer",
     *                )
     *           )
     *        )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body/ID supplied",
     *      ),
     *      @OA\Response(
     *         response=403,
     *         description="Access forbidden",
     *      ),
     *      @OA\Response(
     *         response=404,
     *         description="Activity not found",
     *      ),
     *     )
     */
    public function saveProgress(Request $request) {
        
        $data = $request->all();

        $validator = Validator::make($data, [
            'activity_id' => 'integer',
            'unit_id' => 'integer',
            'states.*' => 'integer',
        ]);
        
        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try{
            $user = Auth::user();
            if($user){
                //tu updatnem vsetky userove data
                $id = $user['id'];
                
                $pom = $request['states'];
                if(is_array($pom))
                {
                    $myObj = strval(json_encode(array('id' => $request['states'])));

                    $row = EventProgress::updateOrCreate(['activity_id' => $request['activity_id'], 'user_id' => $id, 'unit_id' => $request['unit_id']],[ 'done' => $myObj]);
                    return response()->json("User info updated", 200);  
                }
                else
                {
                    return response()->json("Need array", 400); 
                }
                
            } else{
                return response()->json("User not logged in", 403);
            }   
        } catch(QueryException $e){
            return response()->json($e, 500);
        }

    }
}
