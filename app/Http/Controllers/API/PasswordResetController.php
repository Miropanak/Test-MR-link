<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use App\PasswordReset;
use Illuminate\Support\Facades\Validator;

class PasswordResetController extends Controller
{
    public $successStatus = 200;


    public static function v4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    /**
     * @OA\Post(path="/api/password/create",
     *   operationId="create",
     *   tags={"User"},
     *   summary="This is the 1. request when reseting password",
     *   description="Request Password Reset, create reset token and send email",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Email",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      format="email",
     *                  )
     *           )
     *       )
     *   ),
     *   @OA\Response(response=200, description="--Successful operation--"),
     *   @OA\Response(response=400, description="--Validation problem--"),
     *   @OA\Response(response=404, description="--No user with that email ad--")
     * )
     */
    public function create(Request $request)
    {
        $input = $request->all();
        $input['email'] = strtolower($input['email']);
        $validator = Validator::make($input,[
            'email' => 'required|string|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        $user = User::where('email', $input['email'])->first();
        if(!$user) {
            return response()->json([
                'message' => 'We can not find a user with that e-mail address.'], 404);
        }

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            ['email' => $user->email, 'token' => $this->v4()]
        );

        if($user && $passwordReset) {
            $user->notify(new PasswordResetRequest($passwordReset->token));
        }

        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ], $this->successStatus);
    }

    /**
     * @OA\Get(path="/api/password/find/{token}",
     *   operationId="find",
     *   tags={"User"},
     *   summary="This is the 2. request when reseting password, this is where the user will be sent after he clicks on link in email",
     *   description="This has to return some react thingy TODO. If the token is active response with token data",
     *   @OA\Parameter(
     *          name="token",
     *          description="Token for password reset",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *   ),
     *   @OA\Response(response=200, description="--Successful operation--"),
     *   @OA\Response(response=404, description="--Invalid token--")
     * )
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset) {
            return response()->json(['message' => 'This password reset token is invalid.'], 404);
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json(['message' => 'This password reset token is invalid.'], 404);
        }

        return response()->json($passwordReset, $this->successStatus); //TODO: needs to send react thingy
    }

    /**
     * @OA\Post(path="/api/password/reset",
     *   operationId="reset",
     *   tags={"User"},
     *   summary="This is the 3. request when reseting password, this is request with new password",
     *   description="If the token is active response with User data",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Email",
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
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
     *               ),
     *              @OA\Property(
     *                   property="token",
     *                   type="string",
     *                   format="string",
     *               )
     *           )
     *       )
     *   ),
     *   @OA\Response(response=200, description="--Successful operation--"),
     *   @OA\Response(response=404, description="--Invalid token--"),
     *   @OA\Response(response=400, description="--No user with that email ad or validation error--")
     * )
     */
    public function reset(Request $request)
    {
        $input = $request->all();
        $input['email'] = strtolower($input['email']);
        $validator = Validator::make($input, [
            'email' => 'required|string|email',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
            'token' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        $passwordReset = PasswordReset::where([['token', $request->input('token')],['email', $input['email']]])->first();

        if(!$passwordReset) {
            return response()->json(['error' => 'This password reset token is invalid.'], 404);
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user){
            return response()->json(['error' => 'We can not find a user with that e-mail address.'], 400);
        }

        try{
            $user->password = bcrypt($request->input('password'));
            $user->save();
            $passwordReset->delete();
            $user->notify(new PasswordResetSuccess($passwordReset)); // Todo check this shit
        }catch (QueryException $e) {
            return response()->json(null, 500);
        }

        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        $success['role_id'] = $user->id_user_types;
        $success['role'] = $user->role->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }
}