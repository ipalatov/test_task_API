<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['as' => 'home', 'uses'=> 'admin\Core@showWelcome']);
//Route::get('/', ['uses'=>'api\v1\ClientsController@getClients']);

Route::match(['get', 'post'],'/test_page/{id?}', ['as' => 'test_page', 'uses'=> 'admin\Core@showTest_page']);

Route::get('/about', ['as'=> 'about', 'uses'=> 'admin\AboutController@showAbout']);




Route::get('/articles', ['uses' => 'admin\Core@getArticles', 'as' => 'articles']);
Route::get('/article/{page}', ['middleware'=> 'mymiddle:admin1','uses' => 'admin\Core@getArticle', 'as' => 'article']);


// list pages
Route::resource('/pages', 'admin\CoreResource', ['only' => ['index', 'show']]);
// only - только нужные методы(маршруты), except - исключения. Всего 7 методов-маршрутов.
