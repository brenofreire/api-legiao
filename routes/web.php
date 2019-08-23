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
    Route::post('cadastrar', 'ContaController@cadastrar'); # OK
    Route::post('logar', 'ContaController@logar'); # OK
    Route::get('verificar_status/{CID}', 'ContaController@verificar_status'); # OK
    Route::get('get_usuarios_temporarios', 'ContaController@get_usuarios_temporarios'); # OK
    Route::post('modificar_usuario_temporario', 'ContaController@modificar_usuario_temporario'); # OK
});
Route::group(['namespace' => 'Legiao', 'prefix' => 'legiao'], function (){
    Route::get('get_usuarios_legiao', 'LegiaoController@get_usuarios_legiao'); # OK
    Route::post('cadastrar_tarefa', 'LegiaoController@cadastrar_tarefa'); # OK
    Route::get('get_tipos_tarefa', 'LegiaoController@get_tipos_tarefa'); # OK
    Route::get('get_atividades_legiao', 'LegiaoController@get_atividades_legiao'); # OK
    Route::get('get_atividades_lux', 'LegiaoController@get_atividades_lux'); # OK
    Route::post('registrar_participante', 'LegiaoController@registrar_participante'); # OK
    Route::get('ranking_capitulo', 'LegiaoController@ranking_capitulo'); #OK
});
