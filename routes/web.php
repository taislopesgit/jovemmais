<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::group(['prefix' => 'home'], function () {
    Route::match(['get', 'post'], '/', 'homeController@index')->name('home');
    Route::match(['get', 'post'], '/{home}', 'homeController@show')->name('show');	
    Route::get('/edita-jovem/{id}', 'homeController@edit')->name('edit');
    Route::get('/gestores', 'homeController@gestores')->name('gestores');	
    
});


Route::get('/inicial', 'jovemController@home')->name('inicial');
Route::get( '/face', 'jovemController@faceJovem')->name('face');
Route::get( '/avaliacao-jovem', 'jovemController@avaliacaoJovem')->name('avaliacao');
Route::get( '/ocorrencia-jovem', 'jovemController@ocorrenciaJovem')->name('ocorrencia');
Route::get( '/perfil-jovem', 'jovemController@jovemPerfil')->name('jovem');

Route::get( '/perfil-edit/{id}/edit' , 'jovemController@jovemEdit')->name('editar');
Route::post( '/perfil-edit/{id}' , 'jovemController@jovemUpdate')->name('atualizar');

Route::get('/perfil-gestor', 'jovemController@jovemGestor')->name('gestor');
Route::get('/calendar', 'jovemController@calendario')->name('calendario');

	
Route::get('/gestores', 'gestorController@gestores')->name('gestores');
Route::match(['get', 'post'], '/{gestor}', 'gestorController@show')->name('gestorId');


