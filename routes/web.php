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
Route::get('/articles/create', 'ArticleController@create');
Route::get('/articles/{article_id}', 'ArticleController@show');
Route::get('/articles/edit/{article_id}', 'ArticleController@edit');

Route::get('/users/{user_id}', 'UserController@show');
Route::get('/profile', 'UserController@profile');
Route::get('/profile/edit', 'UserController@edit');
Route::get('/bookmarks', 'UserController@bookmarks');
Route::get('/mypapers', 'UserController@mypapers');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
