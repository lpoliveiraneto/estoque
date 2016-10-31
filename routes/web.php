<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get ('/', 'LoginController@form');
Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra');
Route::get('/produtos/novo', 'ProdutoController@novo');
//Route::get('/produtos/adiciona', 'ProdutoController@adiciona');
Route::match(array('GET', 'POST'), '/produtos/adiciona', 'ProdutoController@adiciona');
Route::get('/produtos/json', 'ProdutoController@listaJson');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('/login', 'LoginController@form');
Route::post('/login', 'LoginController@login');

//Auth::routes();

Route::get('/home', 'HomeController@index');
//Route::get('/login',[
//	'middleware' => 'AutorizadorMiddleware',
//	'use' => 'LoginController@login']);
