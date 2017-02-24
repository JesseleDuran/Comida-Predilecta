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

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');


Route::get('/ingrediente', 'IngredienteController@index');
Route::get('/ingrediente/crear', 'IngredienteController@create');
Route::get('/ingrediente/{id}', 'IngredienteController@show');
Route::post('/ingrediente', 'IngredienteController@store');

