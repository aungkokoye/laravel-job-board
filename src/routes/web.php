<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyApplicationsController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('jobs.index'));

Route::resource('jobs', JobController::class);

Route::resource('auth', AuthController::class)->only(['store']);
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('job.application', JobApplicationController::class)->only(['create', 'store']);
    Route::resource('my-applications', MyApplicationsController::class)->only(['index', 'destroy']);
    Route::resource('employer', EmployerController::class)->only(['create', 'store']);
});
