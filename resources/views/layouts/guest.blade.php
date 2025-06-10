<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dermacare</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@700&family=Prompt:wght@500;600&family=Volkhov:wght@400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>

    <style>
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

    }

    body {
        font-family: 'Figtree', 'Montserrat', sans-serif;
        margin: 0;
        padding: 0;
        background-color: var(--bg-light-gray);
    }

    /* Navbar Styling */
    .navbar-custom {
        background-color: var(--bg-light-gray); 
        color: white;
        padding: 15px 20px;
        min-height: 90px;
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
        
    }
    .navbar-custom .nav-link {
        color: var(--primary-blue); 
        margin: 0 15px;
        font-weight: 500;
        text-decoration: none; 
        padding: 8px 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-size: 16px;
        font-family: 'Montserrat', sans-serif;
    }

    .nav-link:hover, .nav-link.active {
        background-color: var(--secondary-blue);
        border : 2px solid var(--secondary-blue);
        border-radius: 5px;
        color: var(--third-blue);
        transition: 0.3s ease;
        padding: 4px 8px; 
        text-decoration: none; 
    }
    /* Style untuk tombol HOME di navbar */

    /* Footer Styling */
    .footer-custom {
        background-color: var(--primary-blue);
        color: white;
        padding: 30px 0;
        text-align: center;
    }
    .footer-custom .nav-links a {
        color: var(--footer-text-blue);
        margin: 0 38.5px;
        text-decoration: none;
        font-weight: 500;
        font-size: 26px;
        font-family: 'Prompt', sans-serif;
    }
    .footer-custom .social-icons a {
        color: white;
        margin: 0 10px;
        font-size: 20px;
        text-decoration: none;
    }
    .footer-custom .contact-info p {
        margin: 5px 0;
        font-size: 16px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
    }
    .footer-custom .slogan-text {
        font-family: 'Prompt', sans-serif;
        font-weight: 600;
        font-size: 24px;
        line-height: 36px;
        color: #FFFFFF;
    }

    /* Hero Section Styling (Tetap di sini sementara untuk referensi, tapi akan dipindahkan) */
    .hero-title {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        font-size: 48px;
        line-height: 59px;
        color: var(--hero-title-blue);
    }
    .hero-description {
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        font-size: 24px;
        line-height: 29px;
        color: var(--hero-desc-blue-opacity);
    }
    .hero-button {
        padding: 8px 24px;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 20px;
        line-height: 30px;
        display: inline-block; /* Agar padding bekerja baik */
        text-align: center; /* Agar teks di tengah */
        text-decoration: none; /* Hilangkan underline */
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        cursor: pointer;
    }
    .hero-button.login {
        border: 2px solid var(--login-button-border-blue);
        color: var(--login-button-text-blue);
        background: transparent;
    }
    .hero-button.register {
        background: var(--login-button-border-blue);
        color: #FFFFFF;
    }
    .hero-button.login:hover, .hero-button.register:hover {
        background-color: var(--secondary-blue);
        color: white;
        border-color: var(--secondary-blue); /* Pastikan border juga berubah */
        transition: 0.3s ease;
    }

    /* Ilustrasi Section - latar belakang geometris */
    .illustration-container {
        position: relative;
        width: 556px;
        height: 510px;
    }
    .illustration-container .main-image {
        position: relative;
        z-index: 10;
        width: 393px;
        height: 392px;
        border-radius: 65px;
        object-fit: contain;
        top: 66px;
        left: 74px;
    }
    .illustration-container .shape-blue-light {
        position: absolute;
        width: 195px;
        height: 195px;
        background: #72E1F2;
        border-radius: 40px;
        top: 0px;
        left: 0px;
        z-index: 1;
    }
    .illustration-container .shape-yellow {
        position: absolute;
        width: 179px;
        height: 179px;
        background: #F6D633;
        border-radius: 40px;
        bottom: 0px;
        right: 0px;
        z-index: 1;
    }

    /* Styling Form Login/Register */
    .login-form-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    .login-title {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        font-size: 32px;
        color: #333;
        margin-bottom: 24px;
    }
    .login-button {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 8px;
        background-color: #1676DD;
        color: white;
        display: inline-block; /* Pastikan ini juga inline-block untuk padding/width */
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    .login-button:hover {
        background-color: #1565C0; /* Warna sedikit lebih gelap saat hover */
    }
    .register-link {
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        color: #1676DD;
        text-decoration: none; /* Hilangkan underline bawaan browser */
        transition: color 0.3s ease;
    }
    .register-link:hover {
        color: #0028B8; /* Warna sedikit lebih gelap saat hover */
    }
    .social-icons-login a {
        font-size: 24px;
        margin: 0 10px;
        transition: color 0.3s ease;
    }
    .social-icons-login .fa-facebook-f { color: #3b5998; } /* Warna Facebook */
    .social-icons-login .fa-whatsapp { color: #25D366; } /* Warna WhatsApp */
    .social-icons-login .fa-telegram-plane { color: #0088CC; } /* Warna Telegram */
    .social-icons-login a:hover {
        opacity: 0.8; /* Sedikit transparan saat hover */
    }


/* Contoh styling untuk form register */
    .register-form-card {
        /* Sesuaikan shadow dan background jika berbeda dari default */
        background-color: white; /* Dari desain */
        border-radius: 8px; /* Contoh radius */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Contoh shadow */
        padding: 30px; /* Contoh padding */
    }

    .register-title {
        font-family: 'Montserrat', sans-serif; /* Sesuaikan font */
        font-weight: 700;
        font-size: 32px; /* Sesuaikan ukuran font */
        color: #333; /* Warna teks */
        margin-bottom: 24px;
    }

    .register-button {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 18px; /* Sesuaikan ukuran font */
        padding: 10px 20px; /* Sesuaikan padding */
        border-radius: 8px; /* Sesuaikan border radius */
        background-color: #1676DD; /* Warna biru tombol register */
        color: white;
        text-decoration: none; /* Tambahkan ini untuk jaga-jaga */
    }

    .register-button:hover {
        background-color: #1565C0; /* Warna sedikit lebih gelap saat hover */
    }

    .login-link { /* Ini adalah link 'Login' di halaman register */
        font-family: 'Montserrat', sans-serif; /* Sesuaikan font */
        font-weight: 600;
        color: #1676DD; /* Warna link login */
        text-decoration: none; /* Pastikan tidak ada underline */
    }

    .login-link:hover {
        color: #0028B8; /* Warna sedikit lebih gelap saat hover */
    }

    .social-icons-register a {
        font-size: 24px; /* Ukuran ikon */
        margin: 0 10px; /* Jarak antar ikon */
        text-decoration: none; /* Pastikan tidak ada underline */
    }
    .social-icons-register .fa-whatsapp {
        color: #25D366; /* Warna WhatsApp */
    }
    .social-icons-register .fa-telegram-plane {
        color: #0088CC; /* Warna Telegram */
    }
    .social-icons-register a:hover {
        opacity: 0.8;
    }

    /* Responsive adjustments for the form */
    @media (max-width: 768px) {
        .register-form-card {
            padding: 20px;
            max-width: 90%; /* Buat form lebih sempit di mobile */
        }
        .register-title {
            font-size: 28px;
        }
        .social-icons-register {
            justify-content: center;
        }
    }


    /* Responsive adjustments */
    @media (max-width: 768px) {
        .login-form-card {
            padding: 20px;
            max-width: 90%;
        }
        .login-title {
            font-size: 28px;
        }
        .social-icons-login {
            justify-content: center;
        }
        .hero-section-wrapper > div {
            padding: 0 1rem;
        }
    }
    @media (max-width: 1024px) {
        .navbar-custom {
            flex-direction: column;
            height: auto;
            padding: 10px 0;
        }
        .navbar-custom .btn-home,
        .navbar-custom .nav-link {
            margin: 5px 10px;
        }
        .hero-section-wrapper {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .hero-section-wrapper > div {
            width: 100%;
            padding: 0 1rem;
        }
        .illustration-container {
            width: 100%;
            height: 400px;
            margin-top: 2rem;
        }
        .illustration-container .main-image {
            width: 50%;
            height: auto;
            top: 0;
            left: 10%;
        }
        .illustration-container .shape-blue-light,
        .illustration-container .shape-yellow {
            display: none;
        }
        .footer-custom .nav-links {
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }
        .footer-custom .nav-links a {
            margin: 5px 10px;
            font-size: 20px;
        }
    }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <nav class="navbar-custom flex justify-between items-center px-8 w-full">
        <div class="flex items-center">
            <a href="{{ route('landing') }}" class="flex items-center">
                <img src="{{ asset('img/Group7.png') }}" alt="Dermacare Logo" class="h-10 mr-3">
            </a>
        </div>
        <div class="flex items-center">
            <a href="{{ route('landing') }}" class="nav-link">Home</a>
            <a href="{{ route('implementation_services') }}" class="nav-link">Implementation Services</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer-custom mt-10">
        <div class="container mx-auto px-4">
            <div class="nav-links mb-4 flex justify-center">
                <a href="#">About</a>
                <a href="#">Website</a>
                <a href="#">Policies</a>
                <a href="#">Contact</a>
                <a href="#">Feedback</a>
                <a href="#">Blog</a>
            </div>
            <p class="mb-4 slogan-text">Lorem ipsum dolor sit amet consectetur.</p>
            <div class="social-icons mb-4 flex justify-center">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
            <div class="contact-info">
                <p>📍 DermaCare | 📧 support.DermaCare@gmail.com | 📞 +91 1234567890</p>
            </div>
        </div>
    </footer>
</body>
</html>