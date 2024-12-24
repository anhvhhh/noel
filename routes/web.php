<?php

use App\Http\Controllers\NameController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/get-name', [NameController::class, 'get'])
    ->name('get.name');
Route::post('/sent-name', [NameController::class, 'sent'])
    ->name('sent.name');

