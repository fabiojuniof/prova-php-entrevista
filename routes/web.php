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

Route::get('/','userController@index');

Route::post('users/salvar', 'userController@salvar');
Route::get('users/{user}/editar','userController@editar');
Route::patch('users/atualizar/{user}','userController@atualizar');
Route::get('users/{user}/excluir','userController@excluir');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


