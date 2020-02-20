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

Route::get('/usuario', 'adminController@usuario')->name('usuario');
Route::get('/gestores', 'adminController@gestores')->name('gestores');	
Route::get( '/jovem', 'adminController@jovem')->name('jovem');
Route::match(['get', 'post'], '/{admin}', 'adminController@show')->name('gestor');




