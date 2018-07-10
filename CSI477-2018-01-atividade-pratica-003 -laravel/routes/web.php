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

use App\Procedure;

Route::get('/', function () {
    $procedures = Procedure::get();

    return view('home', ['lista' => $procedures]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tests', 'TestsController@index')->name('tests');
Route::get('tests/novo', 'TestsController@novo')->name('novo');
Route::get('tests/{test}/editar', 'TestsController@editar')->name('editar');
Route::post('tests/salvar', 'TestsController@salvar')->name('salvar');
Route::patch('tests/{test}', 'TestsController@atualizar')->name('atualizar');


Route::get('procedures/novo', 'ProceduresController@novo')->name('novo');
Route::get('procedures/{proc}/editar', 'ProceduresController@editar')->name('editar');
Route::post('procedures/salvar', 'ProceduresController@salvar')->name('salvar');
Route::patch('procedures/{proc}', 'ProceduresController@atualizar')->name('atualizar');
Route::delete('procedures/{proc}', 'ProceduresController@deletar')->name('deletar');

Route::get('/users', 'UsersController@index')->name('users');
Route::get('users/novo', 'UsersController@novo')->name('novo');
Route::get('users/{user}/editar', 'UsersController@editar')->name('editar');
Route::post('users/salvar', 'UsersController@salvar')->name('salvar');
Route::patch('users/{user}', 'UsersController@atualizar')->name('atualizar');
Route::delete('users/{user}', 'UsersController@deletar')->name('deletar');
