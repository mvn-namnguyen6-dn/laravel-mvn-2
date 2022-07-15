<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;

use App\Models\Post;
use App\Models\User;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// post
Route::get('/redirect','PostController@redirectRoute');
Route::get('/showpost','PostController@index');
Route::get('/addpost','PostController@create');
Route::post('savepost','PostController@store');
Route::get('editpost/{id}','PostController@edit')->middleware('can:update,post');
Route::post('updatepost','PostController@update');
Route::get('detailpost/{id}','PostController@detail');
Route::get('deletepost/{id}','PostController@destroy');



// user
Route::get('/showuser','UserController@index')->name('user.index');
Route::get('/adduser','UserController@create');
Route::post('saveuser','UserController@store');
Route::get('/showcmt/{id}','CommentController@index');
// Route::get('/showpostuser/{id}','PostController@index');

Route::get('/showall/{id}','UserController@viewdetail');
Route::get('/showpost/{id}','PostController@viewpost');
Route::get('/deleteuser/{id}','UserController@destroy');
Route::get('/userdetail/{id}','UserController@viewuserdetail');



//search


Route::get('/search', 'SearchController@search')->name('web.search');

// ajax


Route::get('/userajax', 'AjaxController@index');
Route::post('/userajax', 'AjaxController@store');
Route::get('fetch-user', 'AjaxController@fetchuser');

Route::get('edit-user/{id}','AjaxController@edit');
Route::put('update-user/{id}', 'AjaxController@update');

Route::delete('delete-user/{id}', 'AjaxController@destroy');
