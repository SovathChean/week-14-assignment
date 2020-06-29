<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *  @SWG\GET(
     *   path="/post",
     *   summary="Display Post lists",
     *   tags={"Post"},
     *   description="Display Post lists",
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
     *     description="Filter by post name",
     *     type="string",
     *     required=false,
     *     in="query"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Post was retrieved successfully.",
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
         $posts = Post::where('name', $request->input('name'))->get();
         //SovathChean
       }
       else {
         $posts = Post::all();
       }


       return $this->sendResponse(PostResource::collection($posts), "Post was retreive successfully");
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
     *  @SWG\Post(
     *   path="/post",
     *   summary="Create a new Post",
     *   tags={"Post"},
     *   description="Display Post lists",
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
     *     description="Post name",
     *     type="string",
     *     required=true,
     *     in="formData"
     *     ),
     *     @SWG\Parameter(
     *     name="category_id",
     *     description="Post category",
     *     type="integer",
     *     required=true,
     *     in="formData"
     *     ),
     *     @SWG\Parameter(
     *     name="creator_id",
     *     description="Creator Post",
     *     type="string",
     *     required=true,
     *     in="formData"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Post was stored successfully.",
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
     *          @SWG\Items(ref="#/definitions/Post")
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
     */
    public function store(PostRequest $request)
    {
        //
        $validator = $request->validated();
        $input = $request->all();
        $posts = Post::create($input);

        return $this->sendResponse(new PostResource($posts), "Post was stored successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *  @SWG\Get(
     *   path="/post/{id}",
     *   summary="Show Post",
     *   tags={"Post"},
     *   description="Display a Post",
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
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Post was stored successfully.",
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
     *          @SWG\Items(ref="#/definitions/Post")
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
    public function show($id)
    {
        //
        $posts = Post::findOrFail($id);

        return $this->sendResponse(new PostResource($posts),  "Post was shown successfully");

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
     *  @SWG\Put(
     *   path="/post/{id}",
     *   summary="Update Post",
     *   tags={"Post"},
     *   description="Update Post",
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
     *     description="Post name",
     *     type="string",
     *     required=true,
     *     in="formData"
     *     ),
     *     @SWG\Parameter(
     *     name="category_id",
     *     description="Post category",
     *     type="integer",
     *     required=true,
     *     in="formData"
     *     ),
     *     @SWG\Parameter(
     *     name="creator_id",
     *     description="Creator Post",
     *     type="string",
     *     required=true,
     *     in="formData"
     *     ),
     *
     *     @SWG\Response(
     *      response=200,
     *      description="Post was updated successfully.",
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
     *          @SWG\Items(ref="#/definitions/Post")
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
    public function update(PostRequest $request, $id)
    {
        //

        $posts = Post::findOrFail($id);
        $validator = $request->validated();
        $input = $request->all();
        $posts->update($input);

        return $this->sendResponse(new PostResource($posts),  "Post was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *  @SWG\Delete(
     *   path="/post/{id}",
     *   summary="Delete Post",
     *   tags={"Post"},
     *   description="Delete Post",
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
     *      description="Post was deleted successfully.",
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
     *          @SWG\Items(ref="#/definitions/Post")
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
    public function destroy($id)
    {
        //
        $posts = Post::findOrFail($id);
        $posts->delete();

        return $this->sendResponse(new PostResource($posts),  "Post was deleted successfully");
    }
}
