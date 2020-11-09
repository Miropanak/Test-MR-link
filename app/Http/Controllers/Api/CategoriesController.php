<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Categories;


/**
 * Class ActivityController that handles activities
 * @package App\Http\Controllers
 */
class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @OA\Get(
     *      path="/api/categories/{type}",
     *      operationId="getCategoriesType",
     *      tags={"Categories"},
     *      summary="Gets categories dependent on the selected type",
     *      description="Returns every category that fits requested type - type 1 returns all categories of type 'theme' etc.",
     *      @OA\Parameter(
     *          name="type",
     *          description="Category type",
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
     *          description="Event not found"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Invalid ID supplied",
     *      ),
     *     )
     */
    public function getCategoriesType($type){
        if($type > 5){
            return response()->json("Invalid ID supplied - Nonexistent category type", 400);
        }
        try{
            $categories = \DB::table('categories')->where('type', $type)->get();
            return response()->json($categories, 200);
        } catch(QueryException $e){
            if($e->getCode() === '22003') {
                return response()->json("Invalid ID supplied - number is too large", 400); // bad id provided -> id too big for integer
            } else {
                return response()->json(null, 500);
            }
        }
    }

    /**
     * @OA\Post(
     *      path="/api/categories",
     *      operationId="createCategory",
     *      tags={"Categories"},
     *      summary="Create new category",
     *      description="Creates a new category with requested attributes. Api checks for min/max values of type and maxlength of string.",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Request body has to contain all 'category' fields which are manually set - type and value",
     *        @OA\JsonContent(
     *           type="object",
     *           @OA\Property(property="type", type="integer"),
     *           @OA\Property(property="value", type="string")
     *           )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Created"
     *       ),
     *      @OA\Response(
     *         response=400,
     *         description="Bad Request - Wrong type or String over 100 characters",
     *      ),
     *      security={{"bearerAuth":{}}},
     *     )
     */
    public function createCategory(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'type' => 'required|integer|min:1|max:5', //Values hold values 1-5 now, if more category types are added, change these values
            'value' => 'required|string|max:100'
        ]);
        if($validator->fails()) {
            return response()->json(['Bad Request - Wrong type or String over 100 characters'=>$validator->errors()], 400);
        }
        try{
            $category = Categories::create([
                'type' => $data['type'],
                'value' => $data['value']
            ]);
        } catch(QueryException $e){
            return response()->json($e, 500);
        }

        return response()->json("Created",200);
    }
}
