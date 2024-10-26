<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Requests\TodoUpdateRequest;

/**
 * @OA\Info(
 *      version="0.1",
 *      title="technology demo API",
 *
 *      @OA\Contact(
 *          email="iachievedream@gmail.com"
 *      ),
 *
 *      @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * ),
 * @OA\Server(
 *     url="http://127.0.0.1/api",
 *     description="測試demi",
 * ),
 *
 * @OA\Server(
 *     url="http://technologydemoback.test/api",
 *     description="本機測試",
 * ),
 *
 *  @OA\SecurityScheme(
 *         securityScheme="bearerAuth",
 *         type="http",
 *         scheme="bearer"
 *     ),
 */
class TodoController extends Controller
{
    /**
     * @OA\Get(
     *      path="/todo",
     *      operationId="todo",
     *      tags={"todo"},
     *      summary="顯示全部列表",
     *      description="顯示全部列表",
     *      security={
     *         {
     *              "bearerAuth": {}
     *         }
     *      },
     *
     *      @OA\Response(
     *          response=200,
     *          description="200"
     *       )
     * ),
     **/
    public function index()
    {
        $todo = TodoList::all();
        return response()->json($todo, 200);
    }

    /**
     * @OA\Post(
     *      path="/todo/",
     *      operationId="todo_store",
     *      tags={"todo"},
     *      summary="新增 todo",
     *      description="新增 todo",
     *      security={
     *         {
     *              "bearerAuth": {}
     *         }
     *      },
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="title",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="type",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="content",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="user_id",
     *                      type="integer",
     *                  ),
     *                  example={
     *                      "title":"我的第一個發文",
     *                      "type":"第一個分類",
     *                      "content":"這個todo如何呢？",
     *                      "user_id": 1
     *                  }
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="200"
     *       )
     * ),
     **/
    public function store(Request $request)
    {
        $todo = TodoList::create($request->all());

        return response()->json($todo, 200);
    }

    /**
     * @OA\Get(
     *      path="/todo/{id}",
     *      operationId="todo_id",
     *      tags={"todo"},
     *      summary="顯示此筆todo",
     *      description="顯示此筆todo",
     *      security={
     *         {
     *              "bearerAuth": {}
     *         }
     *      },
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer",
     *              example="2",
     *          ),
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="200"
     *       )
     * ),
     **/
    public function show(string $id)
    {
        $todo = TodoList::find($id);

        return response()->json($todo, 200);
    }

    /**
     * @OA\Put(
     *      path="/todo/{id}",
     *      operationId="todo_id_update",
     *      tags={"todo"},
     *      summary="更新todo",
     *      description="更新todo",
     *      security={
     *         {
     *              "bearerAuth": {}
     *         }
     *      },
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer",
     *              example="2",
     *          ),
     *      ),
     *
     *      @OA\RequestBody(
     *
     *          @OA\MediaType(
     *              mediaType="application/json",
     *
     *              @OA\Schema(
     *
     *                  @OA\Property(
     *                      property="title",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="type",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="content",
     *                      type="string"
     *                  ),
     *                  example={
     *                      "title":"我的第一個發文",
     *                      "type":"第一個分類",
     *                      "content":"這個todo如何呢？"
     *                  }
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="200"
     *       )
     * ),
     **/
    public function update(TodoUpdateRequest $request, int $id)
    {
        $todo = TodoList::findOrFail($id);

        $todo->update($request->all());

        return response()->json($todo, 200);
    }

    /**
     * @OA\Delete(
     *      path="/todo/{id}",
     *      operationId="todo_id_delete",
     *      tags={"todo"},
     *      summary="刪除此筆todo",
     *      description="刪除此筆todo",
     *      security={
     *         {
     *              "bearerAuth": {}
     *         }
     *      },
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(
     *              type="integer",
     *              example="2",
     *          ),
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="200"
     *       )
     * ),
     **/
    public function destroy(string $id)
    {
        $todo = TodoList::destroy($id);

        return response()->json($todo, 200);
    }
}
