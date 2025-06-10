<aside class="w-64 bg-white border-r shadow-md p-6 flex flex-col">
    <div class="flex flex-col items-center mb-8">
        <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center text-white text-xl">👤</div>
        <p class="mt-2 font-semibold">{{ session('username') }}</p>
    </div>

    <nav class="space-y-3 text-sm">
        <a href="{{ route('diagnosa') }}"
           class="block px-4 py-2 rounded {{ request()->routeIs('diagnosa') ? 'bg-blue-500 text-white' : 'hover:bg-blue-100' }}">
            Diagnosa
        </a>
        <a href="{{ route('tabel') }}"
           class="block px-4 py-2 rounded {{ request()->routeIs('tabel') ? 'bg-blue-500 text-white' : 'hover:bg-blue-100' }}">
            Tabel Penyakit
        </a>
    </nav>

    <div class="mt-auto text-sm">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-yellow-700 text-white px-6 py-2 rounded shadow">
                Logout
            </button>
        </form>
    </div>
</aside>
