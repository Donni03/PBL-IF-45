<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('users.login');
});
Route::get('/register', [RegisterController::class, 'index'])->name('registrasi');
    Route::post('/register', [RegisterController::class, 'create']);
