<?php

use App\Http\Controllers\NumberController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NumberController::class, 'index'])->name('index');

Route::post('/', [NumberController::class, 'store'])->name('store');

Route::get('/delete', [NumberController::class, 'destroy'])->name('delete');
