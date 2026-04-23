<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceptionController;
use Illuminate\Support\Facades\Route;

// Admin فقط
Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return 'admin only';
});

// الصفحة الرئيسية
Route::get('/', function () {
    return redirect('/login');
});

// Worker dashboard
Route::middleware(['auth', 'role:worker'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])
        ->name('dashboard');
});

// Reception (chef)
Route::middleware(['auth', 'role:reception'])->group(function () {
    Route::get('/reception', [ReceptionController::class, 'index']);
    Route::post('/validate-code', [ReceptionController::class, 'validateCode']);
});

// Profile (أي واحد logged in)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';