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



Route::get('index', 'CursoController@index');
Route::get('frontend', 'CursoController@frontend');
Route::get('backend', 'CursoController@backend');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
