<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
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
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [TodolistController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/post', [TodolistController::class, 'store'])->name('store');
   Route::delete('/dashboard/delete{todolist:id}', [TodolistController::class, 'destroy'])->name('destroy');
});



Route::get('/registro', function () {
    return view('auth/register');
})->name('registro');





/* 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



   Route::controller(TodolistController::class)->group(function () {       
Route::get('/dashboard', [TodolistController::class, 'index'])->name('index');
Route::post('/dashboard/post', [TodolistController::class, 'store'])->name('store');
Route::delete('/dashboard/delete{todolist:id}', [TodolistController::class, 'destroy'])->name('destroy');
    })->name('dashboard');
*/