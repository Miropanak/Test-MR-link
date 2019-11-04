<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
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
     *   description="",
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
        $input['password'] = bcrypt($input['password']);
        $input['name'] = $input['firstname'] . " " . $input['lastname'];
        $input['id_user_types'] = UserType::where('name', 'student')->first()->id;

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this-> successStatus);
    }


    /**
     * @OA\Post(path="/api/password/reset",
     *   operationId="password_reset",
     *   tags={"User"},
     *   summary="Reset the password of user",
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
    public function password_reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
            'password_new' => 'required|min:6',
            'c_password_new' => 'required|same:password_new',
        ]);


        if ($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $user['password'] = bcrypt($request->get('password_new'));
            $user->save();

            return response()->json(['success' => 'Heslo bolo zmenené'], $this-> successStatus);
        }
        else {
            return response()->json(['error' => 'Unauthorised.'], 401);
        }
    }
}