<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $num = config('setting.pagination_category_num');
        $posts = Post::paginate($num);


        return view('post.index', ['posts'=> $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = DB::table('categories')->pluck('name', 'id')->all();

        return view('post.create', ['categories'=>$categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $input = $request->all();
        $input['creator_id'] = Auth::id();
        $posts = Post::create($input);

        $post = Post::findOrFail($posts->id)->id;



        return redirect()->route('post.show', [$post]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('post.show', ['post'=>$post]);

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

       $post = Post::findOrFail($id);
       $auth = Auth::id();

       $this->authorize("editPost", $post);

       $categories = DB::table('categories')->pluck('name', 'id')->all();

       return view('post.edit', ['post'=>$post, 'categories'=>$categories]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        //
      $input = $request->all();
      $input['creator_id'] = Auth::id();
      $post = Post::findOrFail($id);
      $post->update($input);
      $this->authorize("updatePost", $post);

      return redirect()->route('post.show', ['post'=>$post]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      $post = Post::findOrFail($id);
      $this->authorize('deletePost', $post);

      $post->delete();
      return redirect()->route('post.index');


     // return view('post.unauthorize');

    }

    public function ajaxDestroy($id)
    {
        $post = Post::findOrFail($id);
        if($this->authorize('ajaxDeletePost', $post))
        {
          $post->delete();
          return response()->json([
              'success' => true,
              'message' => 'Deleted'
          ]);
        }
        else{
          return response()->json([
              'success' => false,
              'message' => 'Unauthorize access'
          ]);
        }



    }
}
