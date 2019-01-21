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

Route::namespace('Article')->group(function () {
    // Controllers Within The "App\Http\Controllers\Article" Namespace
    Route::get('/', 'ArticleController@index')->name('article.index');
    Route::get('/article/{slug}', 'ArticleController@show')->name('article.show');

    // Article CRUD routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('crud/article', 'ArticleCrudController@index')->name('article.crud.index');
        Route::get('crud/article/create', 'ArticleCrudController@create')->name('article.crud.create');
        Route::post('crud/article/store', 'ArticleCrudController@store')->name('article.crud.store');
        Route::get('crud/article/{article}/edit', 'ArticleCrudController@edit')->name('article.crud.edit');
        Route::patch('crud/article/{article}/update', 'ArticleCrudController@update')->name('article.crud.update');
        Route::delete('crud/article/{article}/destroy', 'ArticleCrudController@destroy')->name('article.crud.destroy');
    });
});

Route::namespace('Topic')->group(function () {
    Route::get('/topic/{topic}', 'TopicController@show')->name('topic.show');

    // Topic CRUD routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('crud/topic', 'TopicCrudController@index')->name('topic.crud.index');
        Route::get('crud/topic/create', 'TopicCrudController@create')->name('topic.crud.create');
        Route::post('crud/topic/store', 'TopicCrudController@store')->name('topic.crud.store');
        Route::get('crud/topic/{article}/edit', 'TopicCrudController@edit')->name('topic.crud.edit');
        Route::patch('crud/topic/{article}/update', 'TopicCrudController@update')->name('topic.crud.update');
        Route::delete('crud/topic/{article}/destroy', 'TopicCrudController@destroy')->name('topic.crud.destroy');
    });
});