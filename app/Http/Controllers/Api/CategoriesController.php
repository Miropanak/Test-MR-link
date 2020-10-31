<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Categories;


class CategoriesController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
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
}
