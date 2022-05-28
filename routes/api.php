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

/*Rutas para acceder a informacion de peliculas */
Route::get('/peliculas', 'App\Http\Controllers\PeliculaController@index'); //Mostrar todos los registros de peliculas
Route::get('/peliculas/{idPeliculas}', 'App\Http\Controllers\PeliculaController@show'); //Mostrar registro de busqueda de pelicula con id
Route::get('/peliculas/search/{nombre}', 'App\Http\Controllers\PeliculaController@searchMovie'); //Mostrar registro de busqueda de pelicula con nombre

/*Rutas para acceder a informacion de usuarios */
Route::get('/usuarios', 'App\Http\Controllers\UsuariosController@index'); //Mostrar todos los registros de usuarios
Route::post('/usuarios', 'App\Http\Controllers\UsuariosController@store'); //Mostrar todos los registros de usuarios

/*Rutas para acceder a informacion de login */
Route::get('/login/{user}/{pass}', 'App\Http\Controllers\UsuariosController@login'); //Login
