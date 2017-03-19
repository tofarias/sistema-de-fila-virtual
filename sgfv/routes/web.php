<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'salas', 'middleware' => 'auth'], function () {

    Route::get('/', ['as' => 'salas.index', 'uses' => 'SalasController@index']);
    Route::get('consultar', ['as' => 'salas.consultar', 'uses' => 'SalasController@consultar']);

    Route::get('{sala}/editar', ['as' => 'salas.viewEditar', 'uses' => 'SalasController@viewEditar']);
    Route::post('editar', ['as' => 'salas.editar', 'uses' => 'SalasController@editar']);
});