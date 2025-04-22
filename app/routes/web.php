<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\WordbookTestController;

Route::get('/', [TopController::class, 'index'])->name('top');
Route::get('/wordbook/{book}/test', [WordbookTestController::class, 'show'])->name('wordbook.test');
Route::get('welcome', function () {
    return view('welcome');
});
