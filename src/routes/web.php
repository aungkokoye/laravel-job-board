<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('jobs.index'));

Route::resource('jobs', JobController::class);

Route::resource('auth', AuthController::class)->only(['store']);
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');
