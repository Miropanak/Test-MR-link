<?php

namespace App\Http\Controllers;



use App\Activity;
use App\ActivityUsers;
use App\User;
use App\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function view;

/**
 * Class ActivityController that handles activities
 * @package App\Http\Controllers
 */
class ActivityController extends Controller
{

    /**
     * Validation rules that activities must follow
     * @var array
     */
    protected $validationRules = [
                                'title' => 'required|string|max:50',
                                'content' => 'required|string|max:1000',
                                'id_study_field' => 'required|integer',
                                ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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



    public function show()
    {
        $activities = Activity::all();
        $title = "Zoznam vzdelávacích aktivít";
        return view('activities.show', ['activities' => $activities])->with(compact('title'));
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
     *      path="/activities/detail/{id}",
     *      operationId="detail",
     *      tags={"Activity"},
     *      summary="Show activity detail",
     *      description="Returns 'activity', 'users', 'registered' and title",
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
     *     )
     */
    public function detail($id)
    {
        $activity = Activity::find($id);
        $users = $this->getUsersForSelect($activity->subscriber);
        $registered = $this->isRegistered($activity->subscriber, Auth::user()->id);
        $title = $activity->name;

//        return view('activities.detail', ['activity' => $activity, 'registered' => $registered, 'users' => $users])->with(compact('title'));
        return response()->json([
            "activity" => $activity,
            "registered" => $registered,
            "users" => $users,
            "title" => $title
        ]);
    }

    /**
     * Creates new activity
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {

        $request->validate($this->validationRules);


        $data = $request->all();
        Activity::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'public' => isset($data['public']),
            'validated' => false,
            'id_study_field' => $data['id_study_field'],
            'id_author' => Auth::user()->id
        ]);

        if(Auth::user()->id_user_types == 3){
            Auth::user()->id_user_types = 4;
            Auth::user()->save();
        }

        return redirect()->route('activities/show');
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
