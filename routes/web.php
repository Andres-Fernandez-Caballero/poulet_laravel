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


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\WebController;

/*** Rutas web ***/

Route::get('/','WebController@index')->name('web.index');

Route::get('/recetas','WebController@recetas')->name('web.recetas');

Route::get('/postres','WebController@postres')->name('web.postres');

Route::get('/Autores','WebController@autores')->name('web.autores');

/*** Rutas Panel ***/

Route::get('/panel','PanelController@index')->name('panel.index')->middleware('auth.gotThePower');

/*** Rutas controlador Recetas ***/
Route::resource('/receta','RecetasController');

/*** Rutas controlador Autor ***/
Route::resource('/autor','AutoresController');

/*** Rutas controlador Consulta/Contacto ***/
Route::resource('/contacto','ConsultaController');

/*** Rutas controlador Usuarios ***/
Route::put('user/{id}','UserController@updateName')->name('user.update.name');
Route::post('users/{id}','UserController@updatePass')->name('user.update.pass');
Route::post('user/{id}','UserController@updateImg')->name('user.update.img');
Route::resource('users','UserController');

/*** Rutas auth ***/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
