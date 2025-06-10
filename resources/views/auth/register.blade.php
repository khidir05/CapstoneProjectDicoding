@extends('layouts.guest') 

@section('content')
<div class="container mx-auto px-4 py-16 flex flex-col md:flex-row items-center justify-between">
    {{-- Kolom Kiri: Form Register --}}
    <div class="w-full md:w-1/2 pr-0 md:pr-10">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto register-form-card">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center register-title">Please Fill out Form to Register!</h2>

            {{-- Error Validasi Manual --}}
            @if ($errors->any())
                <div class="mb-4">
                    <div class="font-medium text-red-600">
                        Whoops! Terjadi kesalahan saat memproses data Anda.
                    </div>

                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}"> 
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Full name:</label>
                    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name') }}" required autofocus autocomplete="name">
                    {{-- Error spesifik field (optional) --}}
                    {{-- @error('name')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror --}}
                </div>

        
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                    <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('username') }}" required autocomplete="username">
                    {{-- @error('username')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('email') }}" required autocomplete="email">
                    {{-- @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autocomplete="new-password">
                    {{-- @error('password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autocomplete="new-password">
                    {{-- @error('password_confirmation')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg w-full focus:outline-none focus:shadow-outline register-button">
                        Register
                    </button>
                </div>

                <div class="text-center mt-4 text-sm">
                    Yes I have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-bold login-link">Login</a>
                </div>

                <div class="flex justify-center space-x-4 mt-6 social-icons-register">
                    {{-- Ikon media sosial sesuai desain (Facebook, WhatsApp, Telegram) --}}
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