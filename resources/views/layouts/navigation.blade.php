<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DermaCare') }} - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@700&family=Prompt:wght@500;600;700&family=Volkhov:wght@400&display=swap" rel="stylesheet">
    {{-- Tambahkan font Poppins untuk tombol Login/Register --}}


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://kit.fontawesome.com/7aee672115.js" crossorigin="anonymous"></script>

    <style>
        /* Variabel CSS untuk warna agar konsisten */
        :root {
            --primary-blue: #0d47a1; /* Biru tua navbar/footer */
            --secondary-blue: #1976d2; /* Biru sedang HOME/tombol */
            --third-blue: #ffffff; /* Putih teks navbar/footer */
            --logo-blue: #0067D5; /* Biru logo DermaCare */
            --hero-title-blue: #0063CC; /* Biru judul hero */
            --hero-desc-blue-opacity: rgba(0, 40, 184, 0.7); /* Biru deskripsi hero */
            --footer-text-blue: #EAF7FF; /* Biru teks footer */
            --login-button-border-blue: #1676DD; /* Biru border tombol login */
            --login-button-text-blue: #0028B8; /* Biru teks tombol login */
            --bg-light-gray: #f0f2f5;
            --navbar-height: 90px; /* Definisi tinggi navbar sebagai variabel */
            --sidebar-width: 250px; /* Definisi lebar sidebar */
        }

        body {
            font-family: 'Figtree', 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-light-gray);
            /* Pastikan body tidak ada overflow tersembunyi yang memblokir fixed */
        }

        /* Dashboard Navbar Styling (Ini akan digunakan di layouts/dashboard.blade.php) */
        .dashboard-navbar {
            background-color: var(--primary-blue); /* Biru tua, seperti desain awal */
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: var(--navbar-height);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1000;
            position: fixed; /* FIXED */
            top: 0;
            left: 0;
            width: 100%;
        }
        .dashboard-navbar .nav-link-dashboard {
            color: white; /* Putih, seperti desain awal */
            margin-left: 25px;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            font-family: 'Montserrat', sans-serif;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .dashboard-navbar .nav-link-dashboard:hover, .dashboard-navbar .nav-link-dashboard.active {
            background-color: var(--secondary-blue); /* Biru sedang */
            color: white;
        }
        .dashboard-navbar .user-dropdown-btn {
            background-color: transparent;
            border: none;
            color: white; /* Putih */
            font-size: 16px;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .dashboard-navbar .user-dropdown-btn:hover {
            background-color: rgba(255,255,255,0.1); /* Sedikit transparan putih */
        }
        .dashboard-navbar .dropdown-menu {
            position: absolute;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 5px;
            right: 0; /* Ubah dari 30px agar rata dengan dropdown button */
            margin-top: 10px;
            z-index: 100;
            min-width: 150px;
        }
        .dashboard-navbar .dropdown-menu a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            font-family: 'Montserrat', sans-serif;
        }
        .dashboard-navbar .dropdown-menu a:hover {
            background-color: #f0f0f0;
        }
        .dashboard-navbar .btn-home-dashboard { /* Untuk tombol Home di navbar dashboard */
            background-color: var(--secondary-blue); /* Biru sedang */
            color: white;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 20px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 16px;
        }
        .dashboard-navbar .btn-home-dashboard:hover {
            background-color: #1565C0; /* Sedikit lebih gelap */
        }

        /* Dashboard Container - Penyesuaian untuk Fixed Navbar dan Sidebar */
        .dashboard-container {
            display: flex;
            /* Memberi ruang agar konten tidak tertutup navbar */
            margin-top: var(--navbar-height);
            min-height: calc(100vh - var(--navbar-height));
            /* Pastikan tidak ada overflow tersembunyi yang memblokir sticky/fixed */
            overflow: hidden; /* Hati-hati dengan ini, tapi kadang perlu untuk flex container */
            position: relative; /* Penting untuk konteks z-index jika ada elemen lain */
        }
        
        .sidebar {
            width: var(--sidebar-width);
            background-color: white;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            padding-top: 20px;
            padding-left: 20px;
            padding-right: 20px;
            
            position: fixed; /* FIXED */
            top: var(--navbar-height); /* Mulai tepat di bawah navbar */
            bottom: 0; /* Meregangkan hingga ke bawah viewport */
            left: 0; /* Menempel di sisi kiri */
            
            height: calc(100vh - var(--navbar-height)); /* Tinggi sidebar sesuai sisa viewport */
            overflow-y: auto; /* Untuk menggulir konten sidebar jika melebihi tinggi */
            z-index: 999; /* Di bawah navbar, di atas konten utama */
        }
        
        /* Memberi ruang di sisi kiri konten utama agar tidak tertutup sidebar */
        .main-content-wrapper {
            margin-left: var(--sidebar-width); /* Ruang di kiri untuk sidebar */
            flex-grow: 1;
            padding: 30px; /* Padding untuk konten utama */
            width: calc(100% - var(--sidebar-width)); /* Lebar konten utama */
            overflow-x: hidden; /* Mencegah scrollbar horizontal yang tidak diinginkan */
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-right: 0px; /* Sesuaikan padding agar tidak terlalu mepet */
        }
        .sidebar-header .user-icon {
            font-size: 24px;
            margin-right: 10px;
            color: #4a4a4a;
        }
        .sidebar-header .user-info p {
            margin: 0;
            font-weight: bold;
            color: #333;
        }
        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-nav li {
            margin-bottom: 10px;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            text-decoration: none;
            color: #555;
            border-radius: 5px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .sidebar-nav a:hover, .sidebar-nav a.active {
            background-color: #e0e0e0;
            color: var(--primary-blue); /* Biru tua */
        }
        .sidebar-nav a i {
            margin-right: 10px;
            font-size: 18px;
        }
        .sidebar-nav .logout-btn {
            color: #dc3545;
        }
        .sidebar-nav .logout-btn:hover {
            background-color: #ffe0e0;
            color: #dc3545;
        }
        /* .main-content { /* Hapus ini jika menggunakan main-content-wrapper langsung */
        /* flex-grow: 1; */
        /* padding: 30px; */
        /* } */

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .dashboard-navbar {
                position: static; /* Navbar tidak fixed lagi di mobile */
                flex-direction: column;
                height: auto;
                padding: 10px 0;
            }
            .dashboard-navbar .nav-link-dashboard,
            .dashboard-navbar .btn-home-dashboard {
                margin: 5px 10px;
            }
            .dashboard-navbar .user-dropdown-btn {
                margin-top: 10px;
            }
            
            .dashboard-container {
                flex-direction: column; /* Sidebar dan konten utama menumpuk */
                margin-top: 0; /* Hapus margin-top karena navbar tidak fixed */
                min-height: 100vh;
                overflow: visible; /* Penting untuk mobile */
            }
            .sidebar {
                width: 100%; /* Sidebar jadi lebar penuh */
                height: auto; /* Tinggi menyesuaikan konten */
                position: static; /* Sidebar tidak fixed di mobile */
                padding: 10px 20px;
                box-shadow: none;
            }
            .main-content-wrapper {
                margin-left: 0; /* Hapus margin kiri di mobile */
                width: 100%; /* Lebar penuh */
                padding: 20px;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <nav class="dashboard-navbar" x-data="{ open: false }">
        <div class="flex items-center">
            <a href="{{ route('diagnosa') }}" class="flex items-center">
                <img src="{{ asset('img/Group7.png') }}" alt="DermaCare Logo" class="h-10 mr-3">
            </a>
        </div>
        <div class="flex items-center">
           
                    <div>{{ Auth::user()->name }}</div>
                    

                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     @click.outside="open = false"
                     class="dropdown-menu"
                     style="display: none;">
                    <a href="{{ route('profile.edit') }}">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <i class="fas fa-user-circle user-icon"></i>
                <div class="user-info">
                    <p class="text-xs text-gray-500">USER</p>
                    <p>{{ Auth::user()->name ?? 'Guest' }}</p>
                </div>
            </div>

            <nav class="sidebar-nav">
                <p class="text-gray-500 text-sm mb-2 uppercase">MAIN</p>
                <ul>
                    <li>
                        <a href="{{ route('diagnosa') }}" class="{{ request()->routeIs('diagnosa') ? 'active' : '' }}">
                            <i class="fas fa-stethoscope"></i> Diagnosa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('riwayat_diagnosa') }}" class="{{ request()->routeIs('riwayat_diagnosa') ? 'active' : '' }}">
                            <i class="fas fa-history"></i> Riwayat Diagnosa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jenis_penyakit') }}" class="{{ request()->routeIs('jenis_penyakit') ? 'active' : '' }}">
                            <i class="fas fa-disease"></i> Jenis Penyakit
                        </a>
                    </li>
                </ul>

                <hr class="my-6 border-gray-200">

                <ul>
                    <li>
                        <a href="{{ route('help') }}" class="{{ request()->routeIs('help') ? 'active' : '' }}">
                            <i class="fas fa-question-circle"></i> Help
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="logout-btn">
                                <i class="fas fa-sign-out-alt"></i> Logout Account
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="main-content-wrapper">
            @yield('content')
        </div>
    </div>
</body>
</html>