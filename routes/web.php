<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetectionController; // Import DetectionController
use App\Http\Controllers\ProfileController; 

Route::get('/', function () {
    return view('landing'); // Mengarahkan ke landing.blade.php
})->name('landing');

Route::get('/implementation-services', function () {
    return view('implementation_services');
})->name('implementation_services');

// Rute Autentikasi (sesuai desain Login & Register)
// Pastikan AuthController Anda menangani ini dengan benar
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::middleware('auth')->group(function () { // Menggunakan middleware 'auth' bawaan Laravel
    // Dashboard (sesuai desain Dashboard/Diagnosa, tapi ini untuk halaman dashboard utama)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Untuk menyimpan perubahan profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Untuk hapus akun

    // Halaman Diagnosa (sesuai desain "Desktop - 2.png")
    Route::get('/diagnosa', [DetectionController::class, 'showDiagnosa'])->name('diagnosa');
    Route::post('/analyze', [DetectionController::class, 'analyzeSkin'])->name('analyze'); // Untuk proses deteksi

    // Riwayat Diagnosa (mungkin ini yang Anda maksud dengan 'tabel')
    Route::get('/riwayat-diagnosa', [DetectionController::class, 'showRiwayatDiagnosa'])->name('riwayat_diagnosa');

    //delete riwayat diagnosa
    Route::delete('/riwayat-diagnosa/{id}', [DetectionController::class, 'deleteDetectionResult'])->name('riwayat_diagnosa.delete');
    
    // Jenis Penyakit
    Route::get('/tabel', [DetectionController::class, 'tabel'])->name('jenis_penyakit');

    // Help
    Route::get('/help', [DetectionController::class, 'showHelp'])->name('help');

    // Tambahkan rute untuk halaman jenis penyakit
    Route::get('/jenis-penyakit', [DetectionController::class, 'showJenisPenyakit'])->name('jenis_penyakit');

    // Logout
    Route::post('/logout', function () {
        Auth::logout(); // Cara logout yang disarankan oleh Laravel
        Session::invalidate(); // Mengakhiri session
        Session::regenerateToken(); // Meregenerasi token CSRF
        return redirect()->route('login'); // Kembali ke halaman login
    })->name('logout');
});


