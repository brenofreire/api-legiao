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

Route::group(['namespace' => 'Conta', 'prefix' => 'conta'], function (){
    Route::post('cadastrar', 'ContaController@cadastrar');
    Route::post('logar', 'ContaController@logar');
    Route::get('verificar_status/{CID}', 'ContaController@verificar_status');
    Route::get('get_usuarios_temporarios', 'ContaController@get_usuarios_temporarios');
    Route::post('modificar_usuario_temporario', 'ContaController@modificar_usuario_temporario');
    Route::get('get_usuarios_legiao', 'ContaController@get_usuarios_legiao');
});
Route::group(['namespace' => 'Legiao', 'prefix' => 'legiao'], function (){
    Route::post('cadastrar_tarefa', 'LegiaoController@cadastrar_tarefa');
    Route::get('get_tipos_tarefa', 'LegiaoController@get_tipos_tarefa');
    Route::get('get_atividades_legiao', 'LegiaoController@get_atividades_legiao');
    Route::get('get_atividades_lux', 'LegiaoController@get_atividades_lux');
    Route::post('registrar_participante', 'LegiaoController@registrar_participante');
    Route::post('ranking_capitulo', 'LegiaoController@ranking_capitulo');
});
