<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $users = [
            ['username' => 'fikri', 'password' => '123456'],
            ['username' => 'admin', 'password' => 'password'],
        ];

        foreach ($users as $user) {
            if ($request->username === $user['username'] && $request->password === $user['password']) {
                session(['username' => $user['username']]);
                return redirect()->route('diagnosa');
            }
        }

        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
