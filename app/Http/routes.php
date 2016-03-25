<?php
/**
 * [The introduction of this file]
 *
 * @author     shixi_zhiqun, Weibo Team <shixi_zhiqun@staff.weibo.com>
 * @copyright  copyright(2013) weibo.com all rights reserved
 * @version    0.1
 */


//Auth::login(User::find(1));


//Route::group(['middleware' => ['web','auth']], function () {
Route::group(['middleware' => 'web'], function () {
    //books routes
    Route::get('/', ['as' => 'home', 'uses' => 'BooksController@getBooks']);
    Route::get('books', ['as' => 'books', 'uses' => 'BooksController@getPrintedBooks']);
    Route::get('ebooks', ['as' => 'ebooks', 'uses' => 'BooksController@getEBooks']);
    Route::get('book/{id}', ['as' => 'book.info', 'uses' => 'BooksController@getBook']);
    Route::get('book/contributions/{id}', ['as'=>'contributions.info', 'uses' =>'BooksController@getContributions']);
    Route::get('search', ['as' => 'search', 'uses' => 'BooksController@getBooksFromSearch']);

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
    Route::get('/test', function () {
        return view('layouts.main');
    });

    Route::get('/browse', function () {
        return view('page.browse.books');
    });
});

