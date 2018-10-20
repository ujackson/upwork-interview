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

Route::get('/', function () {
	$post = \App\Post::published()->latest()->first();
	$video = \App\Video::published()->latest()->first();
    return view('welcome', ['post' => $post, 'video' => $video]);
});

Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/post/{slug}', 'PostController@show')->name('post.view');
Route::post('/comment/post/{id}', 'PostController@comment')->middleware('auth')->name('comment.post');

Route::get('/videos', 'VideoController@index')->name('videos');
Route::get('/video/{slug}', 'VideoController@show')->name('video.view');
Route::post('/comment/video/{id}', 'VideoController@comment')->middleware('auth')->name('comment.video');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Admin Routes
 */
Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::resource('posts', 'PostsController');
    Route::resource('videos', 'VideosController');
    Route::resource('comments', 'CommentsController')->only(['index', 'destroy']);
});
