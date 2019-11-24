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
Route::group(['middleware' => 'web'], function(){
    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('livros','LivrosController@index');
    Route::get('livros/novo','LivrosController@novo');
    Route::post('livros/salvar','LivrosController@salvar');
    Route::get('livros/{livro}/editar','LivrosController@editar');
    Route::patch('livros/{livro}','LivrosController@atualizar');
    Route::delete('livros/{livro}','LivrosController@deletar');
});