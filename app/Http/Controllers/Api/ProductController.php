<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    public function __construct(
        private ProductRepositoryInterface $productRepository,
    ){}


    /**
     * @OA\Get(
     * path="/products",
     * summary="get all Products",
     * description="Returns list of Products",
     * tags={"Products"},
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


    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->productRepository->all()
        ]);
    }

    /**
     * @OA\Post(
     * tags={"Products"},
     * path="/products",
     * summary="Store new Product",
     * description="Returns category data",
     * security={ {"bearer": {} }},
     * @OA\RequestBody(
     *      required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"description","active","dimensions","code","reference","stock","price","active"},
     *       @OA\Property(property="description", type="string", example="Macbook Pro 2022"),
     *       @OA\Property(property="active", type="boolean", example="true"),
     *       @OA\Property(property="dimensions", type="string", example="width: 100 cm height:150 cm"),
     *       @OA\Property(property="code", type="string", example="1025426"),
     *       @OA\Property(property="reference", type="string", example="ABHSSG10253"),
     *       @OA\Property(property="stock", type="integer", example=100),
     *       @OA\Property(property="price", type="number", example=100),
     *       @OA\Property(property="category_id", type="integer", example=null),
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

    public function store(Request $request): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->productRepository->create($request->all())
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * @OA\Get(
     * path="/products/{id}",
     * summary="Get product information",
     * description="Returns product data",
     * tags={"Products"},
     * security={ {"bearer": {} }},
     *  @OA\Parameter(
     *  description="Product id",
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

    public function show($id): JsonResponse
    {
        return response()->json([
            'data' => $this->productRepository->byId($id)
        ]);
    }


    /**
     * @OA\Put(
     *      path="/products/{id}",
     *      tags={"Products"},
     *      summary="Update existing product",
     *      description="Returns updated product data",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     *       required={"description","active","dimensions","code","reference","stock","price","active"},
     *       @OA\Property(property="description", type="string", example="Macbook Pro 2022"),
     *       @OA\Property(property="active", type="boolean", example="true"),
     *       @OA\Property(property="dimensions", type="string", example="width: 100 cm height:150 cm"),
     *       @OA\Property(property="code", type="string", example="1025426"),
     *       @OA\Property(property="reference", type="string", example="ABHSSG10253"),
     *       @OA\Property(property="stock", type="integer", example=100),
     *       @OA\Property(property="price", type="number", example=100),
     *       @OA\Property(property="category_id", type="integer", example=1),
     *      ),
     * ),
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
     *      path="/products/{id}",
     *      tags={"Products"},
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
     *    @OA\RequestBody(
     *      required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="description", type="string", example="Computers"),
     *       @OA\Property(property="active", type="boolean", example="true"),
     *      )
     *
     * ),
     *      @OA\Response(
     *          response=202,
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

    public function update(UpdateProductRequest $request, $id)
    {
        return response()->json([
            'data' => $this->productRepository->update($id, $request->all())
        ],Response::HTTP_NO_CONTENT);
    }


    /**
     * @OA\Delete (
     * path="/products/{id}",
     * summary="Delete existing product",
     * description="Deletes a record and returns no content",
     * tags={"Products"},
     * security={ {"bearer": {} }},
     *  @OA\Parameter(
     *  description="product id",
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

    public function destroy($id): JsonResponse
    {
        $this->productRepository->delete($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
