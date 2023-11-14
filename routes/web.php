<?php

use App\Http\Controllers\ChairController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/dashboard', DashboardController::class)
    ->middleware('auth')    
    ->name('dashboard');

Route::get('/chair/new', [ChairController::class, 'create'])
    ->middleware('auth')    
    ->name('chair.create');

require_once 'dist/template.php';