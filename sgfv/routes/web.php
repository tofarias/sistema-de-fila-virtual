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
    Route::post('{sala}/editar', ['as' => 'salas.editar', 'uses' => 'SalasController@editar']);

    Route::get('cadastrar', ['as' => 'salas.viewCadastrar', 'uses' => 'SalasController@viewCadastrar']);
    Route::post('cadastrar', ['as' => 'salas.cadastrar', 'uses' => 'SalasController@cadastrar']);

    Route::get('{sala}/excluir', ['as' => 'salas.excluir', 'uses' => 'SalasController@excluir']);
});

Route::group(['prefix' => 'reservas', 'middleware' => 'auth'], function () {

    Route::get('/', ['as' => 'reservas.index', 'uses' => 'ReservasController@index']);
    Route::get('consultar', ['as' => 'reservas.consultar', 'uses' => 'ReservasController@consultar']);

    Route::get('{reserva}/editar', ['as' => 'reservas.viewEditar', 'uses' => 'ReservasController@viewEditar']);
    Route::post('{reserva}/editar', ['as' => 'reservas.editar', 'uses' => 'ReservasController@editar']);

    Route::get('{reserva}/excluir', ['as' => 'reservas.excluir', 'uses' => 'ReservasController@excluir']);

    Route::get('cadastrar', ['as' => 'reservas.viewCadastrar', 'uses' => 'ReservasController@viewCadastrar']);
    Route::post('cadastrar', ['as' => 'reservas.cadastrar', 'uses' => 'ReservasController@cadastrar']);
});