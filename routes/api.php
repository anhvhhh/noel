<?php

use App\Http\Controllers\NameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get-name', [NameController::class, 'get'])
    ->name('get.name');
Route::post('/sent-name', [NameController::class, 'sent'])
    ->name('sent.name');