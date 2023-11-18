<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/order/new', [OrderController::class, 'create'])
    ->middleware('auth')
    ->name('order.create');

Route::get('/order', [OrderController::class, 'index'])
    ->middleware('auth')
    ->name('order.index');

Route::post('/order/new', [OrderController::class, 'store'])
    ->middleware('auth')
    ->name('order.store');

Route::get('/order/new/select-chair', [OrderController::class, 'selectChair'])
    ->middleware('auth')
    ->name('order.create.selectchair');

Route::get('/order/{order}', [OrderController::class, 'show'])
    ->middleware('auth')
    ->name('order.show');

Route::delete('/order/{order}/cancel', [OrderController::class, 'cancel'])
    ->middleware('auth')
    ->name('order.show.cancel');