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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('alunos', 'AlunosController@index')->name('alunos');
Route::get('alunos/listar', 'AlunosController@listar')->name('listar');
Route::get('alunos/novo', 'AlunosController@novo')->name('cadastrar');
Route::get('alunos/{aluno}/editar', 'AlunosController@editar')->name('editar');
Route::post('alunos/salvar', 'AlunosController@salvar')->name('salvar');
Route::patch('alunos/{aluno}', 'AlunosController@atualizar')->name('atualizar');
Route::delete('alunos/{aluno}', 'AlunosController@deletar')->name('deletar');


Route::get('cidades', 'CidadesController@index')->name('cidades');
Route::get('cidades/listar', 'CidadesController@listar')->name('listar');
Route::get('cidades/novo', 'CidadesController@novo')->name('cadastrar');
Route::get('cidades/{cidade}/editar', 'CidadesController@editar')->name('editar');
Route::post('cidades/salvar', 'CidadesController@salvar')->name('salvar');
Route::patch('cidades/{cidade}', 'CidadesController@atualizar')->name('atualizar');
Route::delete('cidades/{cidade}', 'CidadesController@deletar')->name('deletar');

