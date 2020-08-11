<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::group(['prefix' => 'home'], function () {

    Route::match(['get', 'post'], '/', 'homeController@index')->name('home');
    Route::match(['get', 'post'], '/{home}', 'homeController@show')->name('show');

    Route::get('/edita-jovem/{id}','homeController@edit')->name('edit');
    Route::patch('edita-jovem/{id}','homeController@update')->name('update');

    Route::get('/gestores', 'homeController@gestores')->name('gestores');

  });


Route::get('/inicial', 'jovemController@home')->name('inicial');
Route::get( '/face', 'jovemController@faceJovem')->name('face');
Route::get( '/avaliacao-jovem', 'jovemController@avaliacaoJovem')->name('avaliacao');
Route::get( '/ocorrencia-jovem', 'jovemController@ocorrenciaJovem')->name('ocorrencia');

Route::get( '/perfil-jovem', 'jovemController@jovemPerfil')->name('jovem');
Route::get( '/perfil-edit/{id}/edit' , 'jovemController@jovemEdit')->name('editar');
Route::post( '/perfil-edit/{id}' , 'jovemController@jovemUpdate')->name('atualizar');

Route::match(['get'], '/cadastra-jovem', 'jovemController@cadastraJovem')->name('cadastra-jovem');
Route::match(['get', 'post'], '/salva-jovem', 'jovemController@salvaJovem')->name('salva-jovem');


Route::get('/perfil-gestor', 'jovemController@jovemGestor')->name('gestor');
Route::get( '/avaliacao-programa', 'jovemController@avaliacaoPrograma')->name('avaliacao-programa');
Route::get('/desempenho-jovem', 'jovemController@jovemDesempenho')->name('desempenho');


Route::get('/cadastra-ocorrencia', 'ocorrenciaController@cadastraOcorrencia')->name('cadastrar');
Route::match(['get', 'post'], '/salva-ocorrencia', 'ocorrenciaController@salvaOcorrencia')->name('salvar-ocorrencia');
Route::match(['get', 'post'], '/busca-ocorrencia', 'ocorrenciaController@buscaOcorrencia')->name('busca-ocorrencia');
Route::match(['get', 'post'], '/relacao-ocorrencia', 'ocorrenciaController@relacaoOcorrencia')->name('relacao-ocorrencia');



Route::match(['get', 'post'], '/gestores', 'gestorController@gestores')->name('gestores');
Route::match(['get', 'post'], '/{gestor}', 'gestorController@show')->name('gestorId');




