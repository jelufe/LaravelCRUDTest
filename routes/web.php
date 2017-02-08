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

Route::get('/', 'ClientesController@index');

Route::get('/Clientes', 'ClientesController@index');
Route::get('/Clientes/novo', 'ClientesController@novo');
Route::get('/Clientes/{cliente}/editar', 'ClientesController@editar');
Route::post('/Clientes/salvar', 'ClientesController@salvar');
Route::patch('/Clientes/{cliente}', 'ClientesController@atualizar');
Route::delete('/Clientes/{cliente}', 'ClientesController@deletar');


Route::get('usuarios', 'UsuariosControler@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
