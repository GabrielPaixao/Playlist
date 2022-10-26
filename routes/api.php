<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/atendimentos", 'App\Http\Controllers\AtendimentoController@index');
Route::get("/playlist/show/{id}", 'App\Http\Controllers\PlaylistController@show')->name('show');
Route::get("/playlist/listAjax", 'App\Http\Controllers\PlaylistController@listAjax')->name('list');

Route::get("/conteudo/listAjax", 'App\Http\Controllers\ConteudoController@listAjax')->name('list');
Route::get("/conteudo/listAjaxByPlayList/{id}", 'App\Http\Controllers\ConteudoController@listAjaxByPlayList')->name('listAjaxByPlayList');
