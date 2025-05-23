<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - DermaCare</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-blue-400 to-indigo-600 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login to DermaCare</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required autofocus
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Login
            </button>
        </form>
    </div>

</body>
</html>
