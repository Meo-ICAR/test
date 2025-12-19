<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Rotta singola
Route::get('/area-premium', function () {
    return view('premium.content');
})->middleware(['auth', 'is_subscribed']);

// Gruppo di rotte (es. tutto il portale video)
Route::middleware(['auth', 'is_subscribed'])->group(function () {
    Route::get('/videos', [VideoController::class, 'index']);
    Route::get('/downloads', [DownloadController::class, 'index']);
});
