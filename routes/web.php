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


Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::resource('cliente', 'ClienteController');
Route::resource('venta', 'VentaController');
Auth::routes();

Route::get('/home', 'HomeController@index');

//ACCESO SOLO PARA EMPLEADOS
Route::group(['middleware' => 'auth'], function ()
{
    Route::get('miPerfil', 'EmpleadoController@miPerfil');
    Route::get('misVentas', 'EmpleadoController@misVentas');
    Route::get('empleado/mesas', 'EmpleadoController@mesas');
    Route::get('empleado/{{mesa}}/food', 'EmpleadoController@showFood');

});

Route::resource('venta', 'VentaController');

//ACCESO SOLO PARA ADMINS
Route::group(['middleware' => 'admin'], function()
{
    Route::get('/index', function()
    {
        return view('index');     	
    });

    Route::resource('ingrediente', 'IngredienteController');
    Route::resource('user', 'UserController');
	Route::resource('comida', 'ComidaController');
	Route::resource('combo', 'ComboController');
    Route::resource('mesa', 'MesaController');
    Route::resource('ivas', 'IvasController');
     
	Route::get('/pdf', 'PdfController@invoice'); //ingredientes
    Route::get('/pdfComida', 'PdfController@pdfComida');
    Route::get('/pdfCombo', 'PdfController@pdfCombo');  
    Route::get('/pdfEmpleados', 'PdfController@pdfUser');

});