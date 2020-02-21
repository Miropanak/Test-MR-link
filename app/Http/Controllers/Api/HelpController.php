<?php

namespace App\Http\Controllers\Api;

use App\Models\Help;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class HelpController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/helps/{id}",
     *      operationId="getHelp",
     *      tags={"Help"},
     *      summary="Gets help",
     *      description="Returns 'help' by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Help id",
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
     *          description="Help not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function getHelp($id) {
        try{
            $help = Help::find($id);
            if($help) {
                return response()->json($help, 200);
            } else {
                return response()->json(null, 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json(null, 400); // bad id provided -> id too big for integer
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Put(
     *      path="/api/helps/{id}",
     *      operationId="putHelp",
     *      tags={"Help"},
     *      summary="Updates help",
     *      description="Updates help",
     *      @OA\Parameter(
     *          name="id",
     *          description="help id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body does not need to contain all 'help' fields",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="url", type="string"),
     *          @OA\Property(property="event_id", type="integer")
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Help not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */

    public function updateHelp(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'url' => 'string', // 'url' rule doesn't accept strings like 'wwww.google.sk'
            'event_id' => 'integer',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }

        try{
            $help = Help::find($id);
            if($help) {
                $help->update($request->all());
                return response()->json($help, 200);
            } else {
                return response()->json(null, 404);
            }
        } catch(QueryException $e) {
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }
    }


    /**
     * @OA\Post(
     *      path="/api/helps",
     *      operationId="createHelp",
     *      tags={"Help"},
     *      summary="Creates new help",
     *      description="Creates new help",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request body has to contain name, url, event_id",
     *       @OA\JsonContent(
     *          type="object",
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="url", type="string"),
     *          @OA\Property(property="event_id", type="integer")
     *          )
     *     ),
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

    public function createHelp(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'url' => 'string',
            'event_id' => 'integer|required',
        ]);

        if($validator->fails()) {
            return response()->json(['Data validation error'=>$validator->errors()], 400);
        }
        try{
            $help = new Help();
            $help->name = $request['name'];
            $help->url = $request['url'];
            $help->event_id = $request['event_id'];
            $help->save();
        } catch(Exception $e) {
            return response()->json(null, 500);
        }
        return response()->json($help, 200);
    }


    /**
     * @OA\Delete(
     *      path="/api/helps/{id}",
     *      operationId="deleteHelp",
     *      tags={"Help"},
     *      summary="Deletes help",
     *      description="Deletes 'help' by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Help id",
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
     *          description="Help not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */
    public function deleteHelp($id) {
        try{
            $deleted = Help::where('id', $id)->delete();
        } catch(Exception $e) {
            if($e->getCode() === '22003') {
                return response()->json(null, 400);
            } else {
                return response()->json(null, 500);
            }
        }
        if($deleted) {
            return response()->json(null, 200);
        } else {
            return response()->json(null, 404);
        }
    }
}