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
            padding: 15px 20px;
            min-height: 90px; 
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-custom .nav-link {
            color: var(--hero-title-blue); 
            margin: 0 15px;
            font-weight: 500;
            text-decoration: none;
            padding: 8px 16px; /* Padding untuk link */
            border-radius: 5px; /* Border radius sesuai desain */
            transition: background-color 0.3s ease, color 0.3s ease; /* Transisi halus */
            font-size: 16px; 
            font-family: 'Montserrat', sans-serif; 
        }
        .nav-link:hover, .nav-link.active {
             background-color: var(--secondary-blue); /* Warna hover sesuai desain */
             border : 2px solid var(--secondary-blue); /* Border hover sesuai desain */
             border-radius: 5px; /* Border radius sesuai desain */
             color: var(--third-blue); /* Warna teks saat hover */
             transition: 0.3s ease; /* Transisi */
             padding: 4px 8px
             text-decoration: none;
        }

        /* Footer Styling */
        .footer-custom {
            background-color: var(--primary-blue);
            color: white;
            padding: 30px 0;
            text-align: center;
        }
        .footer-custom .nav-links a {
            color: var(--footer-text-blue); /* Warna EAF7FF dari desain */
            margin: 0 38.5px; /* (77px gap / 2) */
            text-decoration: none;
            font-weight: 500;
            font-size: 26px; /* Sesuai desain */
            font-family: 'Prompt', sans-serif; /* Sesuai desain */
        }
        .footer-custom .social-icons a {
            color: white; /* Ikon putih */
            margin: 0 10px;
            font-size: 20px; /* sesuaikan jika perlu */
            text-decoration: none;
        }
        .footer-custom .contact-info p {
            margin: 5px 0;
            font-size: 16px; /* Sesuai desain */
            font-family: 'Montserrat', sans-serif; /* Sesuai desain */
            font-weight: 500;
        }
        .footer-custom .slogan-text {
            font-family: 'Prompt', sans-serif; 
            font-weight: 600;
            font-size: 24px;
            line-height: 36px;
            color: #FFFFFF;
        }

        /* Hero Section Styling */
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
            padding: 8px 24px; / Frame 2/9 */
            border-radius: 8px; /* Sesuai desain Frame 2/9 */
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 20px;
            line-height: 30px;
        }
        .hero-button.login {
            border: 2px solid var(--login-button-border-blue);
            color: var(--login-button-text-blue);
            background: transparent;
        }
        .hero-button.register {
            border: 2px solid var(--login-button-border-blue);
            color: var(--login-button-text-blue);
            background: transparent;
        }

        .hero-button.login:hover, .hero-button.register:hover {
            background-color: var(--secondary-blue);
            color: white;
            transition : 0.03s ease; /* Transisi halus */
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

        /* resources/css/app.css atau di dalam <style> di layouts/guest.blade.php */

        /* Responsive adjustments for the form */
        @media (max-width: 768px) {
            .login-form-card {
                padding: 20px;
                max-width: 90%; /* Buat form lebih sempit di mobile */
            }
            .login-title {
                font-size: 28px;
            }
            .social-icons-login {
                justify-content: center;
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
                width: 50%; /* Sesuaikan agar tidak terlalu besar */
                height: auto;
                top: 0;
                left: 10%; /* Tengah */
            }
            .illustration-container .shape-blue-light,
            .illustration-container .shape-yellow {
                display: none; /* Sembunyikan bentuk background di mobile untuk kesederhanaan */
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
            {{-- Menggunakan logo gambar dari aset --}}
            <a href="{{ route('landing') }}" class="flex items-center"> <img src="{{ asset('img/Group7.png') }}" alt="Dermacare Logo" class="h-10 mr-3">
                {{-- <span class="logo-text">DermaCare</span> --}}
            </a>
        </div>
        <div class="flex items-center">
            <a href="{{ route('landing') }}" class="nav-link">Home</a> 
            <a href="{{ route('implementation_services') }}" class="nav-link">Implementation Services</a>
        </div>
    </nav>

    <main>
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row items-center justify-between hero-section-wrapper">
            <div class="w-full md:w-1/2 pr-10 md:pr-10 text-center md:text-left">
                <h1 class="hero-title mb-6">AI-Powered Skin Health Starts Here</h1>
                <p class="hero-description mb-8">
                    Lorem ipsum dolor sit amet consectetur. Fringilla phasellus vehicula duis semper magnis commodo accumsan.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center md:justify-start">
                    <a href="{{ route('login') }}" class="hero-button login">Login</a>
                    <a href="{{ route('register') }}" class="hero-button register">Register</a>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex justify-center items-center mt-10 md:mt-0 illustration-container">
                <div class="shape-blue-light"></div>
                <div class="shape-yellow"></div>
                <img src="{{ asset('img/Group6.png') }}" alt="AI-Powered Skin Health" class="main-image"> </div>
        </div>
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