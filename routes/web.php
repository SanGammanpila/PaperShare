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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@index');

Route::get('/articles', 'ArticleController@index');
Route::get('/articles/create', 'ArticleController@create')->middleware('auth');
Route::get('/articles/search', 'ArticleController@search');
Route::get('/articles/{article_id}', 'ArticleController@show');
Route::get('/articles/edit/{article_id}', 'ArticleController@edit')->middleware('auth');
Route::get('/articles/edit/authors/{article_id}', 'ArticleController@editAuthors')->middleware('auth');
Route::get('/articles/edit/resources/{article_id}', 'ArticleController@editResources')->middleware('auth');
Route::post('/articles/store', 'ArticleController@store')->middleware('auth');
Route::post('/articles/update/{article_id}', 'ArticleController@update')->middleware('auth');

Route::post('/resources/add/{article_id}', 'ResourceController@add')->middleware('auth');
Route::get('/documents/download/{document_id}', 'ResourceController@downloadDocument')->middleware('auth');


Route::get('/users/{user_id}', 'UserController@show');
Route::get('/profile', 'UserController@profile')->middleware('auth');
Route::get('/profile/edit', 'UserController@edit')->middleware('auth');
Route::get('/bookmarks', 'UserController@bookmarks')->middleware('auth');
Route::get('/myarticles', 'UserController@myarticles')->middleware('auth');
Route::post('/profile/update', 'UserController@updateProfile')->middleware('auth');


Route::post('/comments/store/{article_id}', 'CommentController@store')->middleware('auth');
Route::get('/comments/store/{article_id}', 'CommentController@store')->middleware('auth');

Route::post('/bookmarks/add/{article_id}', 'UserController@addBookmark')->middleware('auth');



Auth::routes();

Route::get('/home', 'ArticleController@index')->name('home');
