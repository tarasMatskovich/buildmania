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

Route::get('/',[
    'uses' => 'IndexController@index',
    'as' => 'home'
]);

Route::get('/articles',[
    'uses' => 'ArticlesController@index',
    'as' => 'articles'
]);

Route::post('/articles/ajax',[
    'uses'=>'ArticleAjaxController@take',
    'as' => 'articlesAjax'
]);

Route::post('/blogs/ajax/sorted',[
    'uses'=>'BlogsAjaxController@changeSort',
    'as' => 'blogsAjax2'
]);

Route::post('/blogs/ajax/categories',[
    'uses'=>'BlogsAjaxController@changeCategory',
    'as' => 'blogsAjax3'
]);

Route::post('/blogs/ajax',[
    'uses'=>'BlogsAjaxController@take',
    'as' => 'blogsAjax'
]);


Route::get('/blogs',[
    'uses' => 'BlogsController@index',
    'as' => 'blogs'
]);

Route::match(['get','post'],'/blogs/search',[
    'uses' => 'BlogsController@search',
    'as' => 'blogsSearch'
]);


