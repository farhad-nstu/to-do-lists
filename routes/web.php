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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'ItemsController@index')->name('home');
Route::resource('items', 'ItemsController');
Route::get('item/tasks/{item_id}', 'TasksController@index')->name('item.tasks.index');
Route::post('item/tasks', 'TasksController@store')->name('item.tasks.store');
Route::get('item/tasks-destroy/{task_id}', 'TasksController@destroy')->name('item.tasks.destroy');
