<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


//Muestra todos los cursos
Route::get('index', 'CursoController@index');

//Muestra todos los cursos segun la categoria que pertenezcan
Route::get('frontend', 'CursoController@frontend');
Route::get('backend', 'CursoController@backend');

//Rutas del login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//Rutas del crud de cursos y categorias
Route::get('create/cursos', 'CursoController@welcomeCurso')->middleware('auth');
Route::get('create/categoria', 'CursoController@welcomeCategoria')->middleware('auth');