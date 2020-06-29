<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\API\BaseController as BaseController;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     *
     *  @SWG\GET(
     *   path="/category",
     *   summary="Display Category lists",
     *   tags={"Category"},
     *   description="Display Category lists",
     *   produces={"application/json"},
     *
     *     @SWG\Parameter(
     *     name="Authorization",
     *     description="Authorization: Bearer Access_Token",
     *     type="string",
     *     required=true,
     *     in="header"
     *     ),
     *     @SWG\Parameter(
     *     name="name",
     *     description="Filter by category name",
     *     type="string",
     *     required=false,
     *     in="query"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Category was retrieved successfully.",
     *        @SWG\Schema(
     *          type="object",
     *        @SWG\Property(
     *          property="success",
     *          type="boolean"
     *         ),
     *        @SWG\Property(
     *          property="data",
     *          type="object",
     *        @SWG\Property(
     *          property="name",
     *          type="array",
     *          @SWG\Items(ref="#/definitions/Category")
     *         ),
     *         ),
     *        @SWG\Property(
     *          property="message",
     *          type="string"
     *          )
     *        )
     *       ),
     *     @SWG\Response(
     *      response=400,
     *      description="Missing require field or validation"
     *       ),
     *     @SWG\Response(
     *      response=500,
     *      description="Server error"
     *       )
     *   )
     *
     */
    public function index(Request $request)
    {
      if($request->has('name'))
      {
        $category = Category::where('name', $request->input('name'))->get();
      }
      else{
        $category = Category::all();
      }


      return $this->sendResponse($category->toArray(), 'Category was retreived data sucessfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *  @SWG\Post (
     *   path="/category",
     *   summary="Create a new category",
     *   tags={"Category"},
     *   description="Create a new category",
     *   produces={"application/json"},
     *
     *     @SWG\Parameter(
     *     name="Authorization",
     *     description="Authorization: Bearer Access_Token",
     *     type="string",
     *     required=true,
     *     in="header"
     *     ),
     *     @SWG\Parameter(
     *     name="name",
     *     description="name",
     *     type="string",
     *     required=true,
     *     in="formData"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Category was stored successfully.",
     *        @SWG\Schema(
     *          type="object",
     *        @SWG\Property(
     *          property="success",
     *          type="boolean"
     *         ),
     *        @SWG\Property(
     *          property="data",
     *          type="object",
     *        @SWG\Property(
     *          property="name",
     *          type="array",
     *          @SWG\Items(ref="#/definitions/Category")
     *         ),
     *         ),
     *        @SWG\Property(
     *          property="message",
     *          type="string"
     *           )
     *        )
     *     ),
     *     @SWG\Response(
     *      response=400,
     *      description="Missing require field or validation"
     *       ),
     *     @SWG\Response(
     *      response=500,
     *      description="Server error"
     *       )
     * )
     */
    public function store(CategoryRequest $request)
    {
        //
        $input = $request->all();
        $validator = $request->validated();

        $category = Category::create($validator);

        return $this->sendResponse($category->toArray(), "Category was stored successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *  @SWG\Get(
     *   path="/category/{id}",
     *   summary="Show category",
     *   tags={"Category"},
     *   description="Show category",
     *   produces={"application/json"},
     *
     *     @SWG\Parameter(
     *     name="Authorization",
     *     description="Authorization: Bearer Access_Token",
     *     type="string",
     *     required=true,
     *     in="header"
     *     ),
     *     @SWG\Parameter(
     *     name="id",
     *     description="id",
     *     type="integer",
     *     required=true,
     *     in="path"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Category was shown successfully.",
     *        @SWG\Schema(
     *          type="object",
     *        @SWG\Property(
     *          property="success",
     *          type="boolean"
     *         ),
     *        @SWG\Property(
     *          property="data",
     *          type="object",
     *        @SWG\Property(
     *          property="name",
     *          type="array",
     *          @SWG\Items(ref="#/definitions/Category")
     *         ),
     *         ),
     *        @SWG\Property(
     *          property="message",
     *          type="string"
     *           )
     *        )
     *     ),
     *     @SWG\Response(
     *      response=500,
     *      description="Server error"
     *       )
     * )
     */
    public function show($id)
    {
        //
        $category = Category::findOrFail($id);

        return $this->sendResponse($category->toArray(), "Category was shown successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *  @SWG\PUT (
     *   path="/category/{id}",
     *   summary="Update category",
     *   tags={"Category"},
     *   description="Update category",
     *   produces={"application/json"},
     *
     *     @SWG\Parameter(
     *     name="Authorization",
     *     description="Authorization: Bearer Access_Token",
     *     type="string",
     *     required=true,
     *     in="header"
     *     ),
     *     @SWG\Parameter(
     *     name="id",
     *     description="id",
     *     type="integer",
     *     required=true,
     *     in="path"
     *     ),
     *     @SWG\Parameter(
     *     name="name",
     *     description="name",
     *     type="string",
     *     required=true,
     *     in="formData"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Category was updated successfully.",
     *        @SWG\Schema(
     *          type="object",
     *        @SWG\Property(
     *          property="success",
     *          type="boolean"
     *         ),
     *        @SWG\Property(
     *          property="data",
     *          type="object",
     *        @SWG\Property(
     *          property="name",
     *          type="array",
     *          @SWG\Items(ref="#/definitions/Category")
     *         ),
     *         ),
     *        @SWG\Property(
     *          property="message",
     *          type="string"
     *           )
     *        )
     *     ),
     *     @SWG\Response(
     *      response=400,
     *      description="Missing require field or validation"
     *       ),
     *     @SWG\Response(
     *      response=500,
     *      description="Server error"
     *       )
     * )
     */
    public function update(CategoryRequest $request, $id)
    {
        //
        $input = $request->all();
        $validator = $request->validated();
        $category = Category::findOrFail($id);
        $category->update($input);

        return $this->sendResponse($category->toArray(), "Category was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *  @SWG\Delete(
     *   path="/category/{id}",
     *   summary="Delete category",
     *   tags={"Category"},
     *   description="Delete category",
     *   produces={"application/json"},
     *
     *     @SWG\Parameter(
     *     name="Authorization",
     *     description="Authorization: Bearer Access_Token",
     *     type="string",
     *     required=true,
     *     in="header"
     *     ),
     *     @SWG\Parameter(
     *     name="id",
     *     description="id",
     *     type="integer",
     *     required=true,
     *     in="path"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Category was deleted successfully.",
     *        @SWG\Schema(
     *          type="object",
     *        @SWG\Property(
     *          property="success",
     *          type="boolean"
     *         ),
     *        @SWG\Property(
     *          property="data",
     *          type="object",
     *        @SWG\Property(
     *          property="name",
     *          type="array",
     *          @SWG\Items(ref="#/definitions/Category")
     *         ),
     *         ),
     *        @SWG\Property(
     *          property="message",
     *          type="string"
     *           )
     *        )
     *     ),
     *     @SWG\Response(
     *      response=500,
     *      description="Server error"
     *       )
     * )
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();

        return $this->sendResponse($category->toArray(), "Category was deleted successfully");
    }
}
