<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/{id}', [ReviewController::class, 'show'])->name('reviews.show');
