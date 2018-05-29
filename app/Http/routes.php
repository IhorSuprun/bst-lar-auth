<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/tasks', 'TaskController@index')->name('tasks.index');
Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');
Route::post('/task', 'TaskController@store')->name('tasks.store');
Route::delete('/task/{task}', 'TaskController@destroy')->name('tasks.destroy');