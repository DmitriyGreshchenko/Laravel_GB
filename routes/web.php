<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news::catalog');

//Route::get('/news', action: '\App\Http\Controllers\NewsController@index');

Route::get('/news/card/{id?}', [NewsController::class, 'card'])
    ->where('id', '[0-9]+')
    ->name('news::card');
