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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Article')->group(function () {
    // Controllers Within The "App\Http\Controllers\Article" Namespace
    Route::get('/', 'ArticleController@index')->name('article.index');
    Route::get('/article/{slug}', 'ArticleController@show')->name('article.show');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('crud/article', 'ArticleCrudController@index')->name('article.crud.index');
        Route::get('crud/article/{slug}', 'ArticleCrudController@show')->name('article.crud.show');
    });
});