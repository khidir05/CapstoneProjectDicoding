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
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/diagnosa', fn () => view('diagnosa'))->name('diagnosa');
    Route::get('/tabel', fn () => view('tabel'))->name('tabel');
});

Route::post('/logout', function () {
    Session::flush();
    return redirect('/login');
})->name('logout');


