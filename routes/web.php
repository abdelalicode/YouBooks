<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;

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



// Route::get('/books/{id}', [BookController::class , 'show'])->name('show');
// Route::get('/reserved', [BookController::class , 'reserved'])->name('reserved');

// Route::post('/addbook' , [BookController::class, 'store'])->name('book.store');


Route::resource('book', BookController::class);

Route::get('/signup', [AuthController::class , 'create'])->name('form.signup');
Route::get('/signin', [AuthController::class , 'signform'])->name('form.signin');
Route::post('/signup/store', [AuthController::class , 'store'])->name('signup');
Route::post('/login', [AuthController::class , 'login'])->name('login');
Route::get('/logout', [AuthController::class , 'logout'])->name('logout');

Route::get('/reservation', [ReservationController::class , 'index'])->name('reservation.index');
Route::post('/reservation/store/{book}', [ReservationController::class,'store'])->name('reservation.store');
Route::delete('/reservation/destroy/{reservation}', [ReservationController::class,'destroy'])->name('reservation.destroy');
Route::put('/reservation/{reservation}', [ReservationController::class,'update'])->name('reservation.update');


Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::put('/users/{users}', [ReservationController::class,'update'])->name('users.update');
