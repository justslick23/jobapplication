<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('departments', DepartmentController::class);
    Route::resource('jobs', JobController::class);

    // Custom route to show the application form for a specific job
    Route::get('applications/create/{job_id}', [ApplicationController::class, 'create'])->name('applications.create');

    // Resource routes for applications (this handles store, show, edit, etc.)
    Route::resource('applications', ApplicationController::class)->except(['create', 'edit']);
});
