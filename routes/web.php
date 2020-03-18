<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::group(['prefix' => 'home'], function () {
    Route::match(['get', 'post'], '/', 'homeController@index')->name('home');
    Route::match(['get', 'post'], '/{home}', 'homeController@show')->name('show');	
    Route::get('/gestores', 'homeController@gestores')->name('gestores');	
    
});


Route::get('/inicial', 'jovemController@home')->name('inicial');
Route::get( '/perfil-jovem', 'jovemController@jovemPerfil')->name('jovem');
Route::get('/perfil-gestor', 'jovemController@jovemGestor')->name('gestor');

	
Route::get('/gestores', 'gestorController@gestores')->name('gestores');
Route::match(['get', 'post'], '/{gestor}', 'gestorController@show')->name('gestorId');


