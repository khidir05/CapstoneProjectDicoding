<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'DermaCare' }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="flex h-screen bg-gray-100 text-gray-800">
    @include('layouts.sidebar')
    <main class="flex-1 p-10 overflow-y-auto bg-gray-50">
        @yield('content')
    </main>
</body>
</html>
