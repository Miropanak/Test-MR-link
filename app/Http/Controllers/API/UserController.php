<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
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
            return response()->json(['error'=>'Unauthorised'], 401);
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
     *                   property="name",
     *                   type="string",
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
     * )
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}