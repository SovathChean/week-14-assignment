<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
  'middleware' => 'HtmlMinifier',
], function(){
  Route::get('/', function () {
      return view('welcome');
  });

  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');


});

  Route::get('post', 'PostController@index')->name('post.index');


Route::group([
    'middleware' => ['auth', 'HtmlMinifier'],
], function(){

   Route::resource('post', 'PostController')->except(['index', 'show']);

   Route::delete('posts/{post}/ajax-delete', 'PostController@ajaxDestroy')->name('posts.ajax_delete');
   Route::post('posts/{post}/ajax-approve', 'PostController@ajaxApprove')->name('posts.ajax_approve');

   Route::resource('/category', 'CategoryController');
   Route::delete('category/{category}/ajax-delete', 'CategoryController@ajaxDestroy')->name('categories.ajax_delete');
});


  Route::get('post/{post}', 'PostController@show')->name('post.show');
  Route::post('comment', 'CommentController@store')->name('comment.store');
