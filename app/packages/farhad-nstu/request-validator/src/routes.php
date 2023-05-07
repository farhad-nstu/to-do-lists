<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'farhad\RequestValidator\Controllers'
], function () {
    Route::get('/validate-request', 'TasksController@index');
});