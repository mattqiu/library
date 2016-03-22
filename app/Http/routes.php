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

//Route::get('/', function () {
//    return view('welcome');
//});
//books routes
Route::get('books', ['as'=>'books.info','uses' =>'BooksController@getBooks']);
Route::get('book/{id}', ['as'=>'book.info','uses' =>'BooksController@getBook']);
Route::get('book/contributions/{id}', ['as'=>'contributions.info','uses' =>'BooksController@getContributions']);

Route::get('/test/{id}', function ($id) {
    return view('page.user.'.$id);
});


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
