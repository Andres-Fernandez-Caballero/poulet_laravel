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

Route::get('/', [
    'as'   => 'web.index',
    'uses' => 'WebController@index'
]);

Route::get('/recetas', [
    'as'   => 'web.recetas',
    'uses' => 'WebController@recetas'
]);

Route::get('/postres', [
    'as'   => 'web.postres',
    'uses' => 'WebController@postres'
]);

Route::get('/preparacion/{id}',[
    'as'   => 'web.preparacion',
    'uses' => 'WebController@preparacion'
]
);

Route::get('/panel',[
    'as'   => 'panel.index',
    'uses' => 'PanelController@index'
]);

Route::get('/panel/Postres',[
    'as'   => 'panel.postres',
    'uses' => 'PanelController@listadoPostres'
]);



