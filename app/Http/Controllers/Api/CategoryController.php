<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }

    /**
     * @OA\Get(
     * path="/categories",
     *   operationId="getProjectsList",
     * summary="get all Categories",
     * description="Returns list of Categories",
     * tags={"Categories"},
     * security={ {"bearer": {} }},
     *
     * @OA\Response(
     *    response=200, description="Successful operation"
     * ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */

    public function index()
    {
        return response()->json([
            'data' => $this->categoryRepository->all()
        ]);
    }


    /**
     * @OA\Post(
     * tags={"Categories"},
     * path="/categories",
     * summary="Store new Category",
     * description="Returns category data",
     * security={ {"bearer": {} }},
     * @OA\RequestBody(
     *      required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"description","active"},
     *       @OA\Property(property="description", type="string", example="Computers"),
     *       @OA\Property(property="active", type="boolean", example="true"),
     *    )
     * ),
     *    @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     * )
     */


    public function store(Request $request)
    {
        return response()->json(
            [
                'data' => $this->categoryRepository->create($request->all())
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * @OA\Get(
     * path="/categories/{id}",
     * summary="Get category information",
     * description="Returns category data",
     * tags={"Categories"},
     * security={ {"bearer": {} }},
     *  @OA\Parameter(
     *  description="Category id",
     *     in="path",
     *     name="id",
     * required=true,
     * @OA\Schema(
     *  type="integer"
     * )
     * ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     * )
     */

    public function show(int $id)
    {
        return response()->json([
            'data' => $this->categoryRepository->byId($id)
        ]);
    }

    /**
     * @OA\Put(
     *      path="/categories/{id}",
     *      tags={"Categories"},
     *      summary="Update existing category",
     *      description="Returns updated category data",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Category id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"description","active"},
     *       @OA\Property(property="description", type="string", example="Computers"),
     *       @OA\Property(property="active", type="boolean", example="true"),
     *    )
     *
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * ),
     * @OA\Patch(
     *      path="/categories/{id}",
     *      tags={"Categories"},
     *      summary="Update existing category",
     *      description="Returns updated category data",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Category id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *     @OA\JsonContent(
     *       type="object",
     *
     *       @OA\Property(property="description", type="string", example="Computers"),
     *       @OA\Property(property="active", type="boolean", example="true"),
     *    )
     *
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    public function update(UpdateCategoryRequest $request, int $id)
    {
        return response()->json([
            'data' => $this->categoryRepository->update($id, $request->all())
        ],Response::HTTP_NO_CONTENT);
    }


    /**
     * @OA\Delete (
     * path="/categories/{id}",
     * summary="Delete existing category",
     * description="Deletes a record and returns no content",
     * tags={"Categories"},
     * security={ {"bearer": {} }},
     *  @OA\Parameter(
     *  description="category id",
     *     in="path",
     *     name="id",
     * required=true,
     * @OA\Schema(
     *  type="integer",
     *     format="integer"
     * )
     * ),
     *
     *    @OA\Response(
     *          response=204,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    public function destroy(int $id)
    {
        $this->categoryRepository->delete($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
