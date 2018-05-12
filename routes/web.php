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

Route::post('/articles/ajax/sorted',[
    'uses' => 'ArticleAjaxController@takeByCat',
    'as' => 'articlesAjaxSorted'
]);

Route::get('/articles/{id}',[
    'uses' => 'ArticlesController@take',
    'as' => 'article'
])->where('id','[0-9]+');

Route::get('/articles/{cat_alias}',[
    'uses' => 'ArticlesController@byCategories',
    'as' => 'articlesByCat'
])->where('name','[A-Za-z]+');

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

Route::get('/blogs/{id}',[
    'uses' => 'BlogsController@take',
    'as' => 'blog'
])->where('id','[0-9]+');

Route::match(['get','post'],'/blogs/search',[
    'uses' => 'BlogsController@search',
    'as' => 'blogsSearch'
]);

Route::post('/article/ajaxComments',[
    'uses' => 'ArticleAjaxController@moreComments'
]);

Route::post('/blog/ajaxComments',[
    'uses' => 'BlogsAjaxController@moreComments'
]);

Route::get('/programs',[
    'uses' => 'ProgramsController@index',
    'as' => 'programs'
]);

Route::match(['get','post'],'/programs/find',[
    'uses' => 'ProgramsController@find',
    'as' => 'programs.find'
]);

Route::get('/programs/{id}',[
   'uses' => 'ProgramsController@take',
    'as' => 'program'
])->where('id','[0-9]+');






