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


//books routes
Route::get('/', ['as' => 'home', 'uses' => 'BooksController@getBooks']);
Route::get('books', ['as' => 'books', 'uses' => 'BooksController@getPrintedBooks']);
Route::get('ebooks', ['as' => 'ebooks', 'uses' => 'BooksController@getEBooks']);
Route::get('book/{id}', ['as' => 'book.info', 'uses' => 'BooksController@getBook']);
//Route::get('book/contributions/{id}', ['as'=>'contributions.info', 'uses' =>'BooksController@getContributions']);

//users routes
Route::get('my/settings', ['as' => 'settings', 'uses' => 'UserController@getSettings']);
Route::post('my/settings', ['as' => 'postSettings', 'uses' => 'UserController@postSettings']);
Route::get('my/contributions', ['as' => 'contributions', 'uses' => 'UserController@getContributions']);
Route::get('my/borrows', ['as' => 'borrows', 'uses' => 'UserController@getBorrows']);
Route::get('user/{id}', ['as' => 'public', 'uses' => 'UserController@getPublic']);

//contributions routes
Route::get('add', ['as' => 'add', 'uses' => 'ContributionController@addContribution']);
Route::post('add', ['as' => 'postAdd', 'uses' => 'ContributionController@postContribution']);

//test routes
Route::get('/test/{id}', function ($id) {
    return view('page.user.' . $id);
});
Route::get('/browse', function () {
    return view('page.browse.books');
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
