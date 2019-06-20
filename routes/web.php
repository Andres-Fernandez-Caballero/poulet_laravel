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

Route::get('/preparacion/{id}','WebController@preparacion')->name('web.preparacion');

/*** Rutas Panel ***/

Route::get('/panel','PanelController@index')->name('panel.index');

Route::get('/panel/Postres','PanelController@listadoPostres')->name('panel.postres');

Route::get('/panel/agregar_receta','PanelController@agregarReceta')->name('panel.agregarReceta');

/*** Rutas formularios Recetas ***/
Route::delete('/recetas/{id}/eliminar','RecetasController@eliminar')->name('recetas.eliminar');




