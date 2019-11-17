<?php

namespace App\Http\Controllers;



use App\Activity;
use App\ActivityUsers;
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

    /**
     * Show form to create new activity.
     *
     * @return \Illuminate\Http\Response
     */
    public function newActivity()
    {
        return view('activities.new');
    }


    /**
     * @OA\Get(
     *      path="/api/activities",
     *      operationId="getActivities",
     *      tags={"Activity"},
     *      summary="get all activities",
     *      description="Returns 'activities'",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Event not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *  )
     */
    public function getActivities()
    {
        $activities = Activity::all();
        return response()->json(['activities' => $activities]);
    }

    private function isRegistered($subscribers, $user_id){

        foreach ($subscribers as $subscriber)
            if($subscriber->id == $user_id)
                return true;
        return false;
    }

    private function getUsersForSelect($subscribers){

        $sub = array();

        foreach ($subscribers as $subscriber)
            array_push($sub,  $subscriber->id);

        return User::whereNotIn('id', $sub)->get();
    }

    /**
     * @OA\Get(
     *      path="/api/activities/{id}",
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
     *          description="Event not found"
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
            $users = $this->getUsersForSelect($activity->subscriber);
            $registered = $this->isRegistered($activity->subscriber, Auth::user()->id);
            $title = $activity->title;

            if($activity) {
                return response()->json([
                    "activity" => $activity,
                    "registered" => $registered,
                    "users" => $users,
                    "title" => $title
                ]);
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
     *      path="/api/activities",
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
     *                      type="string",
     *               ),
     *               @OA\Property(
     *                      property="id_study_field",
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
            'id_study_field' => 'required|integer'
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try{
            $activity = Activity::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'public' => isset($data['public']),
                'validated' => false,
                'id_study_field' => $data['id_study_field'],
                'id_author' => Auth::user()->id
            ]);
        }catch (QueryException $e) {
            return response()->json(null, 500);
        }

        if(Auth::user()->id_user_types == 3){
            Auth::user()->id_user_types = 4;
            Auth::user()->save();
        }

        return response()->json(['activity' => $activity]);
    }


    /**
     * Returns view for editation of activity
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {

        $activity = Activity::find($id);

        // Check, if authorized user is the author of activity
        if(Auth::user()->id != $activity->author->id) {
            abort(403);
        }

        return view('activities.edit', ['activity' => $activity]);
    }

    /**
     * Updates information about activity after it was edited by user.
     * Only author can edit their activity
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id) {


        $activity = Activity::find($id);

        //Only author can edit activity
        if(Auth::user()->id != $activity->author->id) {
            abort(403);
        }

        $request->validate($this->validationRules);


        $data = $request->all();

        $activity->title = $data['title'];
        $activity->content = $data['content'];
        $activity->public = isset($data['public']);
        $activity->id_study_field = $data['id_study_field'];
        //$activity->id_users = Auth::user()->id;

        $activity->save();


        $activities = Activity::all();
        return $this->detail($id);
    }

    /**
     * Delete activity. Only author can delete their activity
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id) {

        $activity = Activity::find($id);

        // Only author can delete his activity
        if(Auth::user()->id != $activity->author->id || $activity->validated == true) {
            abort(403);
        }

        $activity->delete();

        return redirect()->route('activities/show');
    }

    public function subscribe($id){


        $activity = Activity::find($id);
        $users = $this->getUsersForSelect($activity->subscriber);
        $registered = $this->isRegistered($activity->subscriber, Auth::user()->id);
        $title = $activity->name;

        if(!$registered){
            ActivityUsers::create([
                'id_activities' => $id,
                'id_users' => Auth::user()->id
            ]);
            $registered = true;
        }
        else {
            $activity_users = ActivityUsers::where('id_activities' , $id)->where('id_users', Auth::user()->id)->get();
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
                        'id_activities' => $id,
                        'id_users' => $value
                    ]);
                }
            }
        }

        return redirect('activities/detail/'.$id);
    }

    public function expel(Request $request, $id)
    {
        $activity_users = ActivityUsers::where('id_activities' , $id)->where('id_users', $request->input('data-name'))->get();
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
