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
Route::get('index', 'CursoController@index')->name('index');

//Muestra todos los cursos segun la categoria que pertenezcan
Route::get('frontend', 'CursoController@frontend')->name('frontend');
Route::get('backend', 'CursoController@backend')->name('backend');

//Rutas del login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//Rutas de las categorias
Route::get('create/categorias', 'CategoriaController@create')->middleware('auth');
Route::post('create/store/categorias', 'CategoriaController@store')->name('categoria')->middleware('auth');

//Rutas de los cursos
Route::get('create/cursos', 'CursoController@create')->middleware('auth');
Route::post('create/store/cursos', 'CursoController@store')->name('cursos')->middleware('auth');