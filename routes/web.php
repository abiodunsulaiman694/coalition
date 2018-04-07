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
Route::get('/', 'ProductController@home');
Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@store');
Route::get('products/edit/{id}', 'ProductController@edit');
Route::patch('products/edit/{id}', 'ProductController@update');