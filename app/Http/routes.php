<?php
/**
 * [The introduction of this file]
 *
 * @author     shixi_zhiqun, Weibo Team <shixi_zhiqun@staff.weibo.com>
 * @copyright  copyright(2013) weibo.com all rights reserved
 * @version    0.1
 */
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::login(User::find(1));

//Route::get('/', function () {
//    return view('welcome');
//});
//books routes
Route::get('books', ['as'=>'books.info','uses' =>'BooksController@getBooks']);
Route::get('book/{id}', ['as'=>'book.info','uses' =>'BooksController@getBook']);
Route::get('book/contributions/{id}', ['as'=>'contributions.info','uses' =>'BooksController@getContributions']);

//my routes
Route::get('my', ['as'=>'my.info','uses' =>'UserController@index']);
Route::get('my/contributions', ['as'=>'contributions.info','uses' =>'UserController@getContributions']);
//delete contributions
Route::get('my/contributions/delete', ['as'=>'contributions.delete','uses' =>'UserController@deleteContributions']);
Route::get('my/settings', ['as'=>'settings.info','uses' =>'UserController@getSettings']);
//edit settings
Route::post('my/settings', 'UserController@postSettings');
Route::get('my/borrows', ['as'=>'borrows.info','uses' =>'UserController@getBorrows']);
Route::get('my/public{username}', ['as'=>'public.info','uses' =>'UserController@getPublic']);



Route::get('/', function () {
    return view('layouts.main');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
