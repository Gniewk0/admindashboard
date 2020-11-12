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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test']);
Route::get('/loginlist', [App\Http\Controllers\HomeController::class, 'loginlist']);
Route::get('/sesja', [App\Http\Controllers\HomeController::class, 'show']);
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users']);
Route::get('/onlineusers', [App\Http\Controllers\HomeController::class, 'getOnlineUsers']);
Route::post('/text', [App\Http\Controllers\UserTextController::class, 'store']);
Route::post('/count', [App\Http\Controllers\UserCountController::class, 'store']);
