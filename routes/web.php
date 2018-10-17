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

Route::get('/', '\App\Http\Controllers\PostController@index');
//Route::get('/home', '\App\Http\Controllers\PostController@index');
//Route::get('/u', '\App\Http\Controllers\UserController@index');
Route::get('/u/edit', '\App\Http\Controllers\UserController@edit');
Route::post('/u/edit', '\App\Http\Controllers\UserController@update');
Route::get('/u/{user}', '\App\Http\Controllers\UserController@home');


Route::get('/sendActivationMail','\App\Http\Controllers\RegistrationController@send');
Route::get('/activeAccount','\App\Http\Controllers\RegistrationController@active');


Route::get('/post/me', '\App\Http\Controllers\PostController@me');
Route::get('/post/zan', '\App\Http\Controllers\PostController@zan');
Route::get('/post/fav', '\App\Http\Controllers\PostController@fav');
Route::get('/post/search', '\App\Http\Controllers\PostController@search');
Route::get('/post/comment', '\App\Http\Controllers\PostController@haveComment');
Route::post('/post/comment/{post}', '\App\Http\Controllers\PostController@comment');
Route::resource('post', '\App\Http\Controllers\PostController');
Route::resource('feedback', '\App\Http\Controllers\FeedbackController');

//Route::resource('note', '\App\Http\Controllers\NoteController');
//Route::get('/topic', '\App\Http\Controllers\TopicController@index');
Route::get('/about', '\App\Http\Controllers\AboutController@index');
//Route::get('/link', '\App\Http\Controllers\LinkController@index');
//Route::get('/link/{link}', '\App\Http\Controllers\LinkController@go');
Route::post('/upload/{dir}', '\App\Http\Controllers\UploadController@upload');

Auth::routes();

