<?php
namespace App\Http\Controllers\Api;

use App\Models\Activity;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use App\Models\Organizations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;



class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * @OA\Post(path="/api/login",
     *   operationId="login",
     *   tags={"User"},
     *   summary="Login user into the system",
     *   description="",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Email / Password",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      format="password",
     *                  )
     *           )
     *       )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\Schema(type="string"),
     *     @OA\Header(
     *       header="x-ratelimit-limit",
     *       @OA\Schema(
     *           type="integer",
     *           format="int32"
     *       ),
     *       description="Request limit per hour"
     *     ),
     *     @OA\Header(
     *       header="x-ratelimit-remaining",
     *       @OA\Schema(
     *          type="string",
     *          format="date-time",
     *       ),
     *       description="The number of requests left for the time window"
     *     )
     *   ),
     *   @OA\Response(response=403, description="Wrong credentials")
     * )
     */
    public function login(){
        if(Auth::attempt(['email' => strtolower(request('email')), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            $success['role_id'] = $user->user_type_id;
            $success['role'] = $user->role->name;

            return response()->json(['success' => $success,'user_id' => $user->id], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised.'], 403);
        }
    }
    /**
     * @OA\Post(path="/api/register",
     *   operationId="register",
     *   tags={"User"},
     *   summary="Register user into the system",
     *   description="The registred user's role is automatically set to 'student'",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Regular registration form",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               @OA\Property(
     *                   property="firstname",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="lastname",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="confirm_private_policy",
     *                   type="boolean",
     *               ),
     *               @OA\Property(
     *                   property="email",
     *                   type="string",
     *                   format="email",
     *               ),
     *               @OA\Property(
     *                   property="password",
     *                   type="string",
     *                   format="password",
     *               ),
     *               @OA\Property(
     *                   property="c_password",
     *                   type="string",
     *                   format="password",
     *               ),
     *               @OA\Property(
     *                   property="organization_id",
     *                   type="integer",
     *               ), 
     *           )
     *       )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\Schema(type="string"),
     *     @OA\Header(
     *       header="x-ratelimit-limit",
     *       @OA\Schema(
     *           type="integer",
     *           format="int32"
     *       ),
     *       description="Request limit per hour"
     *     ),
     *     @OA\Header(
     *       header="x-ratelimit-remaining",
     *       @OA\Schema(
     *          type="string",
     *          format="date-time",
     *       ),
     *       description="The number of requests left for the time window"
     *     )
     *   ),
     *   @OA\Response(response=400, description="Invalid JSON body supplied")
     * )
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            "confirm_private_policy" => 'required|boolean',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
            'organization_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        $input = $request->all();
        $input['email'] = strtolower($input['email']);   // fur richard
        $input['password'] = bcrypt($input['password']);
        $input['name'] = $input['firstname'] . " " . $input['lastname'];
        $input['user_type_id'] = UserType::where('name', 'student')->first()->id;

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        $success['role_id'] = $user->user_type_id;
        $success['role'] = $user->role->name;

        return response()->json(['success'=>$success, 'user_id' => $user->id], 200);
    }


    /**
     * @OA\Post(path="/api/password/change",
     *   operationId="password_change",
     *   tags={"User"},
     *   summary="Change the password of user",
     *   description="",
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *       required=true,
     *       description="",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                ),
     *                @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      format="password",
     *               ),
     *               @OA\Property(
     *                      property="password_new",
     *                      type="string",
     *                      format="password",
     *               ),
     *               @OA\Property(
     *                      property="c_password_new",
     *                      type="string",
     *                      format="password",
     *               )
     *           )
     *       )
     *   ),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=403, description="Wrong credentials"),
     *   @OA\Response(response=400, description="Invalid JSON body supplied")
     * )
     */
    public function password_change(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
            'password_new' => 'required|min:6',
            'c_password_new' => 'required|same:password_new',
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }

        if(Auth::guard('web')->attempt(['email' => strtolower(request('email')), 'password' => request('password')])){
            $user = Auth::user();
            $user['password'] = bcrypt($request->input('password_new'));
            $user->save();

            return response()->json(['success' => 'Password has been changed'], $this-> successStatus);
        }
        else {
            return response()->json(['error' => 'Unauthorised.'], 403);
        }
    }


    /**
     * @OA\Post(path="/api/email/check",
     *   operationId="email_check",
     *   tags={"User"},
     *   summary="Check if the email is already used",
     *   description="",
     *   @OA\RequestBody(
     *       required=true,
     *       description="",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                ),
     *          ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=400, description="Email already used")
     * )
     */
    public function email_check(Request $request)
    {
        $input = $request->all();
        $input['email'] = strtolower($input['email']);

        $validator = Validator::make($input, [
            'email' => 'unique:users,email'
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()],400);
        } else {
            return response()->json(['message'=>'The email is unique'],200);
        }
    }

    /**
     * @OA\Get(
     *      path="/api/users/{id}/events",
     *      operationId="getUserEvents",
     *      tags={"User"},
     *      summary="Gets events of user",
     *      description="Returns 'events' by user_id",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     *          description="User not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getUserEvents($id) {
        try{
            $user = User::find($id); 
            if ($user){
                $events = Event::where("author_id", $id)->get();
                return response()->json($events, 200);
            }else{
                return response()->json(null, 404);
            }  
        } catch(QueryException $e) {
            if($e->getCode() === '22003'){
                return response()->json(null, 400);
            }else{
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Get(
     *      path="/api/users/{id}/activities",
     *      operationId="getUserActivities",
     *      tags={"User"},
     *      summary="Gets activities of user",
     *      description="Returns 'activities' by user_id",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     *      @OA\Response(
     *         response=404,
     *         description="User not found",
     *      ),
     *     )
     */

    public function getUserActivities($user_id) {
        try{
            $user = User::find($user_id); 
            if ($user){
                $activities = Activity::where("author_id", $user_id)->get();
                return response()->json($activities, 200);
            }else{
                return response()->json(null, 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003'){
                return response()->json(null, 400);
            }else{
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Get(
     *      path="/api/users/{id}/subscribed/activities",
     *      operationId="subscribedActivity",
     *      tags={"User"},
     *      summary="Gets subscribed activities of user",
     *      description="Returns 'activities' by user_id",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     *      @OA\Response(
     *         response=404,
     *         description="User not found",
     *      ),
     *     )
     */
    public function subscribedActivity($id){
        try{
            $user = User::find($id); //not sure if this works
            if ($user){
                $activities = User::find($id)->subscriberActivities()->get();
                return response()->json($activities, 200);
            }else{
                return response()->json(null, 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003'){
                return response()->json(null, 400);
            }else{
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Get(
     *      path="/api/users/",
     *      operationId="getUsers",
     *      tags={"User"},
     *      summary="Gets all users",
     *      description="Returns 'users'",
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *     )
     */

    public function getUsers() {
        try{
            $users = User::all('id','name','email');
            return response()->json($users, 200);
        } catch(QueryException $e) {
            return response()->json(null, 500);
        }
    }
    
    /**
     * @OA\Put(
     *      path="/api/users/{id}/changeUserSettings",
     *      operationId="changeUserSettings",
     *      tags={"User"},
     *      summary="Change provided user settings",
     *      description="Changes user settings based on request",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *       required=true,
     *       description="",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               @OA\Property(
     *                      property="name",
     *                      type="string",
     *                ),
     *               @OA\Property(
     *                      property="organization_id",
     *                      type="integer",
     *               ),
     *               @OA\Property(
     *                      property="class",
     *                      type="string",
     *               )
     *           )
     *        )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Access forbidden",
     *       ),
     *     )
     */

    public function changeUserSettings(Request $request) {
        try{
            $user = Auth::user();
            if($user){
                //tu updatnem vsetky userove data
                $user['name'] = request('name');
                $user['organization_id'] = request('organization_id');
                $user['class'] = request('class');
                $user->save();
                return response()->json("User info updated", 200);
            } else{
                return response()->json("User not logged in", 403);
            }   
        } catch(QueryException $e){
            return response()->json($e, 500);
        }
    }
    
    /**
     * @OA\Get(
     *      path="/api/organization/all",
     *      operationId="getOrganizations",
     *      tags={"Organization"},
     *      summary="Gets all organizations",
     *      description="Returns 'organizations' in system",
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *     )
     */
    public function getOrganizations(){
        try{
            $organizations = Organizations::all('id','name');
            return response()->json($organizations, 200);
        } catch(QueryException $e) {
            return response()->json(null, 500);
        }
    }
    
    /**
     * @OA\Get(
     *      path="/api/users/{id}",
     *      operationId="getUser",
     *      tags={"User"},
     *      summary="Gets user",
     *      description="Returns 'user' by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     *      @OA\Response(
     *         response=404,
     *         description="User not found",
     *      ),
     *     )
     */
    public function getUser($id){
        try{
            $user = User::selectRaw("users.*, organizations.name as org_name")
                ->join('organizations', 'organizations.id', '=', 'users.organization_id')
                ->where('users.id',$id)
                ->get();
            if (sizeof($user) > 0){
                return response()->json($user, 200);
            }else{
                return response()->json("User does not exist", 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003'){
                return response()->json(null, 400);
            }else{
                return response()->json(null, 500);
            }
        }
    }
}