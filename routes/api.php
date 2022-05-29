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
/*
Ejemplo de endpoint: http://127.0.0.1:8000/api/peliculas       
*/
Route::get('/peliculas/{idPeliculas}', 'App\Http\Controllers\PeliculaController@show'); //Mostrar registro de busqueda de pelicula con id
/*
Ejemplo de endpoint: http://127.0.0.1:8000/api/peliculas/2       
*/
Route::get('/peliculas/search/{nombre}', 'App\Http\Controllers\PeliculaController@searchMovie'); //Mostrar registro de busqueda de pelicula con nombre
/*
Ejemplo de endpoint: http://127.0.0.1:8000/api/peliculas/spider       
*/

/*Rutas para acceder a informacion de usuarios */
Route::get('/usuarios', 'App\Http\Controllers\UsuariosController@index'); //Mostrar todos los registros de usuarios
/*
Ejemplo de endpoint: http://127.0.0.1:8000/api/usuarios       
*/
Route::post('/usuarios', 'App\Http\Controllers\UsuariosController@store'); //Registrar usuario por metodo post
/*
Ejemplo de endpoint: http://127.0.0.1:8000/api/usuarios       
*/

/*Rutas para acceder a informacion de login */
Route::get('/login/{user}/{pass}', 'App\Http\Controllers\UsuariosController@login'); //Login
/*
Ejemplo de endpoint: http://127.0.0.1:8000/api/login/felix/1234f0       
*/
