<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Front;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use OpenApi\Annotations as OA;
use App\Http\Controllers\Controller;


/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0",
 *     description="API documentation for your project",
 *     @OA\Contact(
 *         email="kerob.job@gmail.com"
 *     )
 * )
 */
class PassportControllerV1 extends Front
{
    /**
     * Handles Registration Request
     *
     * @OA\Post(
     *     path="/api/v1/register",
     *     summary="Handles Registration Request",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"name", "email", "password", "address", "phone", "birthday"},
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="email", type="string", format="email"),
     *                 @OA\Property(property="password", type="string", minLength=6),
     *                 @OA\Property(property="address", type="string", minLength=6),
     *                 @OA\Property(property="phone", type="string", minLength=6),
     *                 @OA\Property(property="birthday", type="string", minLength=6)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function registerApi(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

            'address' => 'required|min:6',
            'phone' => 'required|min:6',
            'birthday' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
        ]);

        $role = Role::where('alias','=','client')->first();
        $user->roles()->attach($role['id']);

        $token = $user->createToken('TutsForWeb')->accessToken;
        return response()->json(['token' => $token], 200);

    }
    /**
     * Login API
     *
     * @OA\Post(
     *     path="/api/v1/login",
     *     summary="Handles Login Request",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="email", type="string"),
     *                 @OA\Property(property="password", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorised",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function loginApi(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }
    /**
     * Get User Details
     *
     * @OA\Get(
     *     path="/api/v1/user",
     *     summary="Get User Details",
     *     tags={"User"},
     *     security={{ "beararAuth": {} }},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", type="object")
     *         )
     *     )
     * )
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
    /**
     * Get all products
     *
     * @OA\Get(
     *     path="/api/v1/products",
     *     summary="Get all products",
     *     tags={"Products"},
     *     security={{ "beararAuth": { } }},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="data", type="array", @OA\Items())
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        try {
            $products = Product::all();
            $products = ProductResource::collection($products);
            return response()->json(['status' => 200, 'data' => $products]);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }
    /**
     * Get a specific product
     *
     * @OA\Get(
     *     path="/api/v1/products/{id}",
     *     summary="Get a specific product",
     *     tags={"Products"},
     *     security={{ "beararAuth": { } }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Product ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     */
    public function show(Request $request, $id)
    {
        try {
            $product = Product::where('id','=',$id)->first();
            return response()->json(['status' => 200, 'data' => $product]);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }
    /**
     * Create a new product
     *
     * @OA\Post(
     *     path="/api/v1/products",
     *     summary="Create a new product",
     *     tags={"Products"},
     *     security={{ "beararAuth": { } }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="alias", type="string", maxLength=255),
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="meta_title", type="string", maxLength=765),
     *                 @OA\Property(property="meta_key", type="string", maxLength=765),
     *                 @OA\Property(property="category_id", type="integer")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=201),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'alias' => "required|max:255|unique:products,alias",
            'title' => 'required',
            'meta_title'=>'max:765',
            'meta_key'=>'max:765',
            'category_id'=>'required'
        ], [], [
            'alias'      => 'Alias',
            'title'      => 'Title',
            'meta_title' => 'Meta title',
            'meta_key'   => 'Meta key',
        ]);

        try {
            DB::beginTransaction();

            $product = Product::create($request->only('title', 'alias', 'desc','category_id'));

            DB::commit();

            return response()->json(['status' => 201, 'data' => $product]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }
    /**
     * Update a product
     *
     * @OA\Put(
     *     path="/api/v1/products/{id}",
     *     summary="Update a product",
     *     tags={"Products"},
     *     security={{ "beararAuth": { } }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Product ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="alias", type="string", maxLength=255),
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="meta_title", type="string", maxLength=765),
     *                 @OA\Property(property="meta_key", type="string", maxLength=765),
     *                 @OA\Property(property="category_id", type="integer")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'alias' => "required|max:255|unique:products,alias,".$id,
            'title' => 'required',
            'meta_title'=>'max:765',
            'meta_key'=>'max:765',
            'category_id'=>'required'
        ], [], [
            'alias'      => 'Alias',
            'title'      => 'Title',
            'meta_title' => 'Meta title',
            'meta_key'   => 'Meta key',
        ]);

        try {
            DB::beginTransaction();

            $product = Product::where('id','=',$id)->first();
            $product->fill($request->only('title', 'alias', 'desc','category_id'))->save();
            $product = Product::where('id','=',$id)->first();

            DB::commit();
            return response()->json(['status' => 200, 'data' => $product]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }
    /**
     * Delete a product
     *
     * @OA\Delete(
     *     path="/api/v1/products/{id}",
     *     summary="Delete a product",
     *     tags={"Products"},
     *     security={{ "beararAuth": { } }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Product ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product) {
            $product->delete();
            return response()->json(['status' => 204, 'message' => 'Product deleted, #ID'.$id]);
        }else{
            return response('There is no product with #ID'.$id, 404);
        }
    }

}
