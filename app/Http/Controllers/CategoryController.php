<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $categories = Category::all();

       return view('category.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('createCategory', Category::class);
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $input = $request->all();
        $this->authorize('createCategory', Category::class);
        $category = Category::create($input);
        $category_id = Category::findOrFail($category->id)->id;

        return redirect()->route('category.show', [$category_id]);
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
        $category = Category::findOrFail($id);

        return view('category.show', ['category'=>$category]);
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
        $category = Category::findOrFail($id);
        $this->authorize('editCategory', $category);

        return view('category.edit', ['category'=> $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        //

        $input = $request->all();
        $category = Category::findOrFail($id);
        $this->authorize('updateCategory', $category);
        $category->update($input);

        return redirect()->route('category.show', ['category'=>$category]);
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
        $category = Category::findOrFail($id);
        $this->authorize('deleteCategory', $category);
        $category->delete();
        $post = Post::where('category_id', $id)->all();

        return redirect()->route('category.index');
    }

    public function ajaxDestroy($id)
    {
        $category = Category::findOrFail($id);

        if($this->authorize('ajaxDeleteCategory', $category))
        {
          $category->delete();
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
