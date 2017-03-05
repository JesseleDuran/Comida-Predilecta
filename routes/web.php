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

Route::get('/index', function () {
    return view('index');
});

Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

/*Route::get('/ingrediente', 'IngredienteController@index');
Route::get('/ingrediente/crear', 'IngredienteController@create');
Route::get('/ingrediente/{id}', 'IngredienteController@show');
Route::post('/ingrediente', 'IngredienteController@store');
Route::get('/ingrediente/{id}/editar', 'IngredienteController@edit');*/

Route::resource('ingrediente', 'IngredienteController');
Route::resource('comida', 'ComidaController');
Route::resource('combo', 'ComboController');
Route::resource('mesa', 'MesaController');
Route::resource('cliente', 'ClienteController');
Route::resource('venta', 'VentaController');
Auth::routes();
Route::get('/pdf', 'PdfController@invoice');
Route::get('/pdfComida', 'PdfController@pdfComida');
Route::get('/pdfCombo', 'PdfController@pdfCombo');

Route::get('/home', 'HomeController@index');

//Route::get('/home', ['middleware => 'admin', 'uses' => 'HomeController@index']); para admin



