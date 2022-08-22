<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
Route::middleware('auth')->group(function(){
    Route::resource('/todo', 'App\Http\Controllers\TodoController');
    Route::put('/todo/complete/{todo}', 'App\Http\Controllers\TodoController@complete' )->name('todo.complete');
    Route::delete('/todo/incomplete/{todo}', 'App\Http\Controllers\TodoController@incomplete' )->name('todo.incomplete');


    // Route::get('/todo', 'App\Http\Controllers\TodoController@index')->name('todo.index');
    // Route::get('/todo/create', 'App\Http\Controllers\TodoController@create' );
    // Route::get('/todo/edit/{todo}', 'App\Http\Controllers\TodoController@edit');
    // Route::patch('/todos/update/{todo}', 'App\Http\Controllers\TodoController@update' )->name('todo.update');
    // Route::delete('/todo/destroy/{todo}', 'App\Http\Controllers\TodoController@destroy' )->name('todo.destroy');
    // Route::post('/todo/create', 'App\Http\Controllers\TodoController@store' );
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/user', 'App\Http\Controllers\UserController@index');
Route::post('/upload', 'App\Http\Controllers\UserController@uploadAvatar' );




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
