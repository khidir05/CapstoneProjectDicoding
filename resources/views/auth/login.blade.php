@extends('layouts.guest') {{-- Menggunakan layout guest yang sudah ada navbar dan footer --}}

@section('content')
<div class="container mx-auto px-4 py-16 flex flex-col md:flex-row items-center justify-between">
    {{-- Kolom Kiri: Form Login --}}
    <div class="w-full md:w-1/2 pr-0 md:pr-10">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto login-form-card">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center login-title">Login</h2>

            {{-- Session Status Message --}}
            @if (session('status'))
                <div class="mb-4 text-green-600 font-medium">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-4 text-red-600 font-medium">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                    <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('username') }}" required autofocus autocomplete="username">
                    @error('username')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" required autocomplete="current-password">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg w-full focus:outline-none focus:shadow-outline login-button">
                        Login
                    </button>
                </div>

                <div class="text-center mt-4 text-sm">
                    Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-bold register-link">Register</a>
                </div>

                <div class="flex justify-center space-x-4 mt-6 social-icons-login">
                    <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-facebook-f text-xl"></i></a>
                    <a href="#" class="text-green-500 hover:text-green-700"><i class="fab fa-whatsapp text-xl"></i></a>
                    <a href="#" class="text-blue-400 hover:text-blue-600"><i class="fab fa-telegram-plane text-xl"></i></a>
                </div>
            </form>
        </div>
    </div>

    {{-- Kolom Kanan: Ilustrasi --}}
    <div class="w-full md:w-1/2 flex justify-center items-center mt-10 md:mt-0 illustration-container">
        <div class="shape-blue-light"></div>
        <div class="shape-yellow"></div>
        <img src="{{ asset('img/Group6.png') }}" alt="AI-Powered Skin Health" class="main-image">
    </div>
</div>
@endsection
