<?php

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
Route::get('/', 'FrontEndController@index')->name('Welcome');
Route::get('layouts/blog-home', 'FrontEndController@layoutsindex')->name('blog');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/{id}',['as'=>'home.post', 'uses'=> 'AdminPostsController@post']);

Route::group(['middleware' => ['admin']], function(){
   
    Route::get('/admin', 'AdminController@index');
    Route::resource('admin/users', 'AdminUserController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/comments', 'AdminCommentsController');
    Route::resource('admin/media', 'AdminMediasController');

    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comments/replies', 'CommentRepliesController');


});
Route::group(['middleware' => ['auth']], function(){
Route::post('admin/reply', 'CommentRepliesController@CreateReply');
});

