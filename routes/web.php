<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddNewsController;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Новости
 */
Route::get('/news', [NewsController::class, 'index'])
    ->name("news::catalog");
//Route::get('/news', '\App\Http\Controllers\NewsController@index');
Route::get('/news/{id}', [NewsController::class, 'card'])
    ->where('id', '[0-9]+')
    ->name('news::card');
Route::get('/news/category/{name}', [NewsController::class, 'category'])
    ->where('name', '[a-z]+');
Route::get('/news/category/{name}/news', [NewsController::class, 'categoryNews'])
    ->where('name', '[a-z]+');

Route::get('/add', [AddNewsController::class, 'index']);
Route::get('/hello', [HelloController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);

/** Админка новостей */
Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
], function () {
    Route::get('/', [AdminNewsController::class, 'index'] )
        ->name('index');
    Route::get('/create',[AdminNewsController::class, 'create'])
        ->name('create');
    Route::get('/update',[AdminNewsController::class, 'update'])
        ->name('update');
    Route::get('/delete',[AdminNewsController::class, 'delete'])
        ->name('delete');
});
