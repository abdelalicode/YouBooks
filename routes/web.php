<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [BookController::class , 'index'])->name('homepage');
Route::get('/books/{id}', [BookController::class , 'show'])->name('show');
Route::get('/reserved', [BookController::class , 'reserved'])->name('reserved');