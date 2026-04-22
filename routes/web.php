<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('reception');
});

Route::get('dashboard/{user}', [App\Http\Controllers\UserController::class, 'dashboard']);
