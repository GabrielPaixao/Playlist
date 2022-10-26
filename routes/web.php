<?php

use Illuminate\Support\Facades\Route;

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

/* PLAYLIST */
    //get
    Route::get("/", 'App\Http\Controllers\PlaylistController@list')->name('list');
    Route::get("/playlist/create", 'App\Http\Controllers\PlaylistController@create')->name('create');
    Route::get("/playlist/list", 'App\Http\Controllers\PlaylistController@list')->name('list');
    Route::get("/playlist/edit/{id}", 'App\Http\Controllers\PlaylistController@edit')->name('edit');
    Route::get("/playlist/delete/{id}", 'App\Http\Controllers\PlaylistController@destroy')->name('delete');

    //post
    Route::post("/playlist/edit/{id}", 'App\Http\Controllers\PlaylistController@update')->name('update');
    Route::post("/playlist/store", 'App\Http\Controllers\PlaylistController@store')->name('store');


/* CONTEUDO */
    //get
    Route::get("/conteudo/create", 'App\Http\Controllers\ConteudoController@create')->name('create');
    Route::get("/conteudo/createCompact/{id}", 'App\Http\Controllers\ConteudoController@createCompact')->name('create');
    Route::get("/conteudo/list", 'App\Http\Controllers\ConteudoController@list')->name('list');
    Route::get("/conteudo/listByPlaylist/{playlist_id}", 'App\Http\Controllers\ConteudoController@listByPlaylist')->name('listByPlaylist');
    Route::get("/conteudo/edit/{id}", 'App\Http\Controllers\ConteudoController@edit')->name('edit');
    Route::get("/conteudo/delete/{id}", 'App\Http\Controllers\ConteudoController@destroy')->name('delete');


    //post
    Route::post("/conteudo/edit/{id}", 'App\Http\Controllers\ConteudoController@update')->name('update');
    Route::post("/conteudo/store", 'App\Http\Controllers\ConteudoController@store')->name('store');
    Route::post("/conteudo/storeCompact", 'App\Http\Controllers\ConteudoController@storeCompact')->name('storeCompact');
