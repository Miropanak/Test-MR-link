<?php
namespace App\Http\Controllers\API;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Event;


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
     *     description="--Successful operation--",
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
     *   @OA\Response(response=401, description="--Invalid username/password supplied--")
     * )
     */
    public function login(){
        if(Auth::attempt(['email' => strtolower(request('email')), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            $success['role_id'] = $user->id_user_types;
            $success['role'] = $user->role->name;

            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised.'], 401);
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
     *              @OA\Property(
     *                   property="c_password",
     *                   type="string",
     *                   format="password",
     *               )
     *           )
     *       )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="--Successful operation--",
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
     *   @OA\Response(response=400, description="--Validation problem--")
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
        ]);

        if ($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        $input = $request->all();
        $input['email'] = strtolower($input['email']);   // fur richard
        $input['password'] = bcrypt($input['password']);
        $input['name'] = $input['firstname'] . " " . $input['lastname'];
        $input['id_user_types'] = UserType::where('name', 'student')->first()->id;

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        $success['role'] = $user->id_user_types;
        $success['role'] = $user->role->name;

        return response()->json(['success'=>$success], $this-> successStatus);
    }


    /**
     * @OA\Post(path="/api/password/change",
     *   operationId="password_change",
     *   tags={"User"},
     *   summary="Change the password of user",
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
     *   @OA\Response(response=200, description="--Successful operation--"),
     *   @OA\Response(response=401, description="--Invalid username/password supplied--"),
     *   @OA\Response(response=400, description="--Validation problem--")
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

        if(Auth::attempt(['email' => strtolower(request('email')), 'password' => request('password')])){
            $user = Auth::user();
            $user['password'] = bcrypt($request->input('password_new'));
            $user->save();

            return response()->json(['success' => 'Password has been changed'], $this-> successStatus);
        }
        else {
            return response()->json(['error' => 'Unauthorised.'], 401);
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
     *   @OA\Response(response=200, description="--User is in not DB--"),
     *   @OA\Response(response=400, description="--User is in DB--")
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
            return response()->json(['message'=>'The email is unique'],$this->successStatus);
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
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Events not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getUserEvents($id) {
        try{
            $events = Event::where("id_users", $id)->get();
            if(count($events) > 0) {
                return response()->json($events, 200);
            } else {
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
}