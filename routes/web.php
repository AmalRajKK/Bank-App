<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Mail\JobPosted;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\BankingController;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/userMenu', [BankingController::class, 'index'])->name('home')->middleware('auth');;
    Route::get('/deposit', [BankingController::class, 'depositView'])->name('depositView')->middleware('auth');;
    Route::post('/deposit', [BankingController::class, 'deposit'])->name('deposit')->middleware('auth');;
    Route::get('/withdraw', [BankingController::class, 'withdrawView'])->name('withdrawView')->middleware('auth');;
    Route::post('/withdraw', [BankingController::class, 'withdraw'])->name('withdraw')->middleware('auth');;
    Route::get('/transfer', [BankingController::class, 'transferView'])->name('transferView')->middleware('auth');;
    Route::post('/transfer', [BankingController::class, 'transfer'])->name('transfer')->middleware('auth');;
    Route::get('/statement', [BankingController::class, 'statement'])->name('statement')->middleware('auth');;
});
