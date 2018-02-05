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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
Route::resource('/','IndexController',['only'=>['index'],'names'=>['index'=>'home']]);
Route::resource('portfolios','PortfolioController',['parameters'=>['portfolios'=>'alias']]);
Route::resource('articles','ArticlesController',['parameters'=>['articles'=>'alias']]);
Route::resource('comment','CommentController',['only'=>['store']]);
Route::get('articles/cat/{cat_alias?}',['uses'=>'ArticlesController@index','as'=>'articlesCat']);
Route::get('articles/{alias?}',['uses'=>'ArticlesController@show','as'=>'articles']);
Route::match(['get','post'],'/contacts',['uses'=>'ContactsController@index','as'=>'contacts']);
Route::get('auth/login','Auth\LoginController@showLoginForm',['as'=>'auth']);
Route::post('auth/login','Auth\LoginController@login');
Route::get('auth/logout','Auth\LoginController@logout');