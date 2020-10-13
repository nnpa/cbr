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

Route::get('/', 'App\Http\Controllers\RestController@index')->name('home');
Route::post('/search', 'App\Http\Controllers\RestController@search');

/*
Route::get('/', function () {
    return view('welcome');
})->name('home');
**/

//Route::post('/login/login','App\Http\Controllers\UsersController@postLogin');

Route::get('/rest','App\Http\Controllers\RestController@show');


Route::get('/parser','App\Http\Controllers\ParserController@parser');


Route::get('/log','App\Http\Controllers\SessionsController@create');
Route::get('/logout','App\Http\Controllers\SessionsController@destroy');
Route::post('/log','App\Http\Controllers\SessionsController@store');


Route::get('/registration','App\Http\Controllers\RegistrationController@create');
Route::post('/registration','App\Http\Controllers\RegistrationController@store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
