<?php

namespace App\Http\Controllers;



use App\Activity;
use App\ActivityUsers;
use App\StudyField;
use App\User;
use App\Unit;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function view;

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
            $units = Activity::find($id)->units;
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
     *      path="/api/activity/author",
     *      operationId="getAuthorActivities",
     *      tags={"Activity"},
     *      summary="get all activities of logged user",
     *      description="Returns 'activities'",
     *      security={{"bearerAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *  )
     */
    public function getAuthorActivities()
    {
        $activities = Activity::where('author_id', Auth::user()->id)->get();
        return response()->json($activities,200);
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
            'public' => 'boolean'
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
            $new_activity->push();

            //re-sync everything
            $new_activity->units()->sync($old_activity->units);

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
                if(Auth::user()->id != $activity->author->id || $activity->validated == true) {
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


        try {
            $activity = Activity::find($id);
            if ($activity) {
                $activity->units()->syncWithoutDetaching($request['unit_id']);
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

    public function subscribe($id){


        $activity = Activity::find($id);
        $users = $activity->subscriber;
        $registered = $this->isRegistered($activity->subscriber, Auth::user()->id);
        $title = $activity->name;

        if(!$registered){
            ActivityUsers::create([
                'activity_id' => $id,
                'subscriber_id' => Auth::user()->id
            ]);
            $registered = true;
        }
        else {
            $activity_users = ActivityUsers::where('activity_id' , $id)->where('subscriber_id', Auth::user()->id)->get();
            foreach ($activity_users as $au)
                $au->delete();
            $registered = false;
        }

        return redirect('activities/detail/'.$id);

    }


    public function invite(Request $request, $id)
    {

        $activity = Activity::find($id);

        if (is_array($request->select_users) || is_object($request->select_users)) {
            foreach ($request->select_users as $value) {
                $registered = $this->isRegistered($activity->subscriber, $value);

                if(!$registered){
                    ActivityUsers::create([
                        'activity_id' => $id,
                        'subscriber_id' => $value
                    ]);
                }
            }
        }

        return redirect('activities/detail/'.$id);
    }

    public function expel(Request $request, $id)
    {
        $activity_users = ActivityUsers::where('activity_id' , $id)->where('subscriber_id', $request->input('data-name'))->get();
        foreach ($activity_users as $au)
            $au->delete();

        return redirect('activities/detail/'.$id);
    }

    public function validateActivity($id)
    {

        $activity = Activity::find($id);

        $activity->validated = true;
        $activity->save();

        return redirect('activities/detail/'.$id);
    }

}
