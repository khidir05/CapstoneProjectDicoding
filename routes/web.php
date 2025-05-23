<?php

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/diagnosa', function () {
//     return view('diagnosa');
// });

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('custom.auth')->group(function () {
    Route::get('/diagnosa', function () {
        return view('diagnosa');
    })->name('diagnosa');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

