<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\WordbookTestController;
use App\Http\Controllers\WordbookTestHistoryController;

Route::get('/', [TopController::class, 'index'])->name('top');
Route::get('/wordbook/{book}/test', [WordbookTestController::class, 'show'])->name('wordbook.test');
Route::get('/wordbook/{book}/generate-test', [WordbookTestController::class, 'generateWordbookTest'])->name('wordbook.generate-test');
Route::get('/wordbook/test-history/{id?}', [WordbookTestHistoryController::class, 'show'])->name('wordbook.test-history');
Route::get('welcome', function () {
    return view('welcome');
});
