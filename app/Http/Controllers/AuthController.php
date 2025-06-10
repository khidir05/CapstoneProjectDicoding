<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User sudah ada
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use Illuminate\Support\Facades\Auth; // Untuk autentikasi user
use Illuminate\Support\Facades\Session; // Untuk Session::flush() jika digunakan, meskipun Auth::logout() lebih baik
use Illuminate\Validation\Rules\Password; // Digunakan oleh Breeze untuk validasi password kuat (opsional)

class AuthController extends Controller
{
    // Method untuk menampilkan form login
    public function showLoginForm()
    {
        return view('Auth.login'); // Mengarahkan ke view resources/views/auth/login.blade.php
    }

    // Method untuk memproses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string', // Sesuai dengan field username di desain Anda
            'password' => 'required|string',
        ]);

        // Coba autentikasi menggunakan username
        // Perlu diingat: Authentikasi ini akan gagal jika tabel 'users' belum ada di database MySQL Anda.
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate(); // Regenerasi session ID untuk keamanan
            return redirect()->intended('/diagnosa'); // Arahkan ke /dashboard setelah login berhasil
        }

        // Jika autentikasi username gagal, coba dengan email (jika desain mengizinkan login via email juga)
        // Ini hanya contoh, jika Anda yakin hanya login via username, hapus bagian ini
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/diagnosa');
        }

        // Jika kedua percobaan autentikasi gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.', // Pesan error yang akan ditampilkan
        ])->onlyInput('username'); // Mengisi kembali input username
    }

    // Method untuk menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('Auth.register'); // Mengarahkan ke view resources/views/auth/register.blade.php
    }

    // Method untuk memproses registrasi
    public function register(Request $request)
    {
        // Validasi input registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users', // 'unique:users' akan memeriksa tabel users di database
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()], // 'confirmed' membutuhkan field password_confirmation
        ]);

        // Membuat user baru di database
        // PERHATIAN: Ini akan gagal jika database MySQL belum terhubung dan tabel 'users' belum ada
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
        ]);

        // Opsional: Langsung login setelah registrasi
        return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login dengan akun Anda.');
    }

    // Method untuk logout (sesuai permintaan di routes/web.php Anda)
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user dari session
        $request->session()->invalidate(); // Menghapus semua data session
        $request->session()->regenerateToken(); // Meregenerasi token CSRF untuk keamanan

        return redirect('/login'); // Arahkan kembali ke halaman login
    }
}