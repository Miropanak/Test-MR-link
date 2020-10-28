<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 14-Nov-18
 * Time: 17:08
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Help;
use App\Models\Option;
use App\Models\Unit;
use App\Models\Test;
use App\Models\UserEventTestAnswer;
use App\Models\UserTest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;

use Illuminate\Support\Facades\DB;


class ExamController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * @OA\Get(
     *      path="/api/unit/{unit_id}/activity/{activity_id}/exams",
     *      operationId="getUnitActivityExams",
     *      tags={"Unit","Activity", "Test"},
     *      summary="Gets all tests of unit and activity with id",
     *      description="Returns 'tests' by belonging to unit and activity",
     *      @OA\Parameter(
     *          name="unit_id",
     *          description="Unit id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="activity_id",
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
     *     @OA\Response(
     *          response=404,
     *          description="Unit/ Activity not found"
     *       )
     *     )
     */
    public function getUnitActivityExams($unit_id, $activity_id)
    {
        try {
            if (!Unit::find($unit_id)){
                return response()->json("Unit not found", 400);
            }

            if (!Activity::find($activity_id)){
                return response()->json("Activity not found", 404);
            }

            $tests = Test::where('activity_id',$activity_id)->where('unit_id',$unit_id)->with('events')->get();
            return response()->json($tests, 200);

        } catch (QueryException $e) {
            Log::error($e);
            return response()->json("Niečo sa pokazilo " . $e, 500);
        }

    }

    /**
     * @OA\Get(
     *      path="/api/exam/{id}",
     *      operationId="getExam",
     *      tags={"Test"},
     *      summary="Gets test with id",
     *      description="Returns 'test' with id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Test id",
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
     *          description="Test not found"
     *       )
     *     )
     */
    public function getExam($exam_id)
    {
        try {
            $exam = Test::find($exam_id);
            if ($exam) {
                $events = $exam->events;
                return response()->json($exam, 200);
            } else {
                return response()->json("Test not found", 404);
            }


        } catch (QueryException $e) {
            Log::error($e);
            return response()->json("Niečo sa pokazilo " . $e, 500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/exam",
     *      operationId="createExam",
     *      tags={"Test"},
     *      summary="Creates new exam/test",
     *      description="Creates new exam/test",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body has to contain array of event ids named 'event_ids', 'name' of test, date when test activates 'startDate':yyyy-MM-dd HH-mm-ss and id of unit where it belongs as 'unit_id'",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="unit_id", type="integer"),
     *          @OA\Property(property="activity_id", type="integer"),
     *          @OA\Property(property="startDate", type="date string in format yyyy-MM-dd HH:mm:ss"),
     *          @OA\Property(property="event_ids", type="array of integers"),
     *          @OA\Property(property="active", type="boolean"),
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid JSON body supplied",
     *      ),
     *     security={{"bearerAuth":{}}},
     *     )
     */
    public function createExam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'startDate' => 'date_format:Y-m-d H:i:s',
            'unit_id' => 'integer|required',
            'activity_id' => 'integer|required',
            'event_ids' => 'required',
            'event_ids.*' => 'integer',
            'active' => 'boolean|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['Data validation error' => $validator->errors()], 400);
        }

        try {
            $exam = new Test();

            $exam->name = $request['name'];
            $exam->startDate = $request['startDate'];
            $exam->unit_id = $request['unit_id'];
            $exam->activity_id = $request['activity_id'];
            $exam->questions = count($request['event_ids']);
            $exam->author_id = Auth::user()->id;
            $exam->active = $request['active'];
            $exam->save();
            foreach ($request['event_ids'] as $event_id) {
                $exam->events()->attach($event_id);
            }
            $exam->save();
			return response()->json($exam, 200);

        } catch (QueryException $e) {
            return response()->json(null, 500); // f.e. postgres id counter is not set up properly
        }

    }

    /**
     * @OA\Put(
     *      path="/api/exam/{id}",
     *      operationId="updateExam",
     *      tags={"Test"},
     *      summary="Updates test/exam",
     *      description="Updates test/exam",
     *      @OA\Parameter(
     *          name="id",
     *          description="Test id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body does not need to contain all 'test' fields, but dont forget to delete last comma. Event_ids must contain at least one id",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="unit_id", type="integer"),
     *          @OA\Property(property="activity_id", type="integer"),
     *          @OA\Property(property="startDate", type="date string in format yyyy-MM-dd HH:mm:ss"),
     *          @OA\Property(property="event_ids", type="array of integers"),
     *          @OA\Property(property="active", type="boolean"),
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Test not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid body supplied",
     *      ),
     *      @OA\Response(
     *         response=403,
     *         description="Access forbidden",
     *      ),
     *     security={{"bearerAuth":{}}},
     *     )
     *     )
     */
    public function updateExam(Request $request, $test_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'startDate' => 'date_format:Y-m-d H:i:s',
            'unit_id' => 'integer',
            'activity_id' => 'integer',
            'event_ids.*' => 'integer',
            'active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json(['Data validation error' => $validator->errors()], 400);
        }
        try {
            $test = Test::find($test_id);
            if ($test) {
                if ($test->author_id != Auth::user()->id) {
                    return response()->json("Logged user not author of test", 403);
                }
                $test->update($request->all());
                if ($request->has('event_ids')) {
                    if (count($request['event_ids']) < 1) {
                        return response()->json("Test must contain events", 400);
                    }
                    $test->events()->sync($request['event_ids']);
                    $test->update(['questions' => count($test->events)]);
                }


                return response()->json($test, 200);

            } else {
                return response()->json("Test not found", 404);
            }
        } catch (QueryException $e) {
            return response()->json(null, 500); // f.e. postgres id counter is not set up properly
        }
    }

    /**
     * @OA\Get(
     *      path="/api/exam/{exam_id}/user/{user_id}",
     *      operationId="getExamAnswers",
     *      tags={"Test"},
     *      summary="Gets users answers",
     *      description="Returns 'event_test_user' by 'user' and 'exam' id",
     *      @OA\Parameter(
     *          name="exam_id",
     *          description="exam id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="user_id",
     *          description="user id",
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
     *     )
     */

    public function getExamAnswers($test_id, $user_id)
    {
        try {	
            $answers = UserEventTestAnswer::where("user_id", $user_id)->where("test_id", $test_id)->get();
            return response()->json($answers, 200);

        } catch (QueryException $e) {
            if ($e->getCode() === '22003') {
                return response()->json("ID is too long", 400);
            } else {
                return response()->json($e, 500);
               }
        }
    }

    /**
     * @OA\Post(
     *      path="/api/exam/{id}/createEventTestAnswers",
     *      operationId="createEventTestAnswers",
     *      tags={"Test"},
     *      summary="Creates event answers",
     *      description="Creates event answers",
     *      @OA\Parameter(
     *          name="id",
     *          description="exam id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Array of JSON objects with fields that are going to be inserted.",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="array",
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(property="answer", type="string"),
     *                      @OA\Property(property="start_time", type="date string in format yyyy-MM-dd HH:mm:ss"),
     *                      @OA\Property(property="end_time", type="date string in format yyyy-MM-dd HH:mm:ss"),
     *                      @OA\Property(property="time_spent", type="integer"),
     *                      @OA\Property(property="obtained_points", type="number"),
     *                      @OA\Property(property="event_id", type="integer")
     *                  )
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Test not found"
     *       ),
     *      @OA\Response(
     *         response=400,    
     *         description="Invalid JSON body supplied",
     *      ),
     *     security={{"bearerAuth":{}}},
     *     )
     */
    public function createEventTestAnswers(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            '*.answer' => 'required',
            '*.start_time' => 'date_format:Y-m-d H:i:s|required',
            '*.end_time' => 'date_format:Y-m-d H:i:s|required',
            '*.time_spent' => 'integer|required',
            '*.obtained_points' => 'numeric',
            '*.event_id' => 'integer|required',
        ]);

        if ($validator->fails()) {
            return response()->json(['Data validation error' => $validator->errors()], 400);
        }

        DB::beginTransaction();
        try {
			$test = Test::find($id);
			if (!$test){ //might not work (not tested yet)
				return response()->json(null, 404);
			}
            foreach ($request->all() as $eventTestAnswer){
                $newUserEventTestAnswer= new UserEventTestAnswer();
                $newUserEventTestAnswer->answers = json_encode($eventTestAnswer['answer']);
                $newUserEventTestAnswer->start_time = $eventTestAnswer['start_time'];
                $newUserEventTestAnswer->end_time = $eventTestAnswer['end_time'];
                $newUserEventTestAnswer->time_spent = $eventTestAnswer['time_spent'];
                $newUserEventTestAnswer->obtained_points = $eventTestAnswer['obtained_points'];
                $newUserEventTestAnswer->test_id = $id;
                $newUserEventTestAnswer->event_id = $eventTestAnswer['event_id'];
                $newUserEventTestAnswer->user_id = Auth::user()->id;
                $newUserEventTestAnswer->save();
        }
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json($e, 500); // f.e. postgres id counter is not set up properly
        }
        DB::commit();
        return response()->json( 200);
    }

}