<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/dashboard', DashboardController::class)
    ->middleware('auth')
    ->name('dashboard');

require_once 'dist/template.php';
require_once 'dist/order.php';