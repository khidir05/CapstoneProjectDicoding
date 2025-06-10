@extends('layouts.guest') 

@section('title', 'Implementation Service DermaCare')

@section('content')
<div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-3xl font-bold text-center text-blue-700 mb-8">Cara Menggunakan DermaCare - Step by Step</h1>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">1. Registrasi Akun</h2>
                    <p class="text-gray-700 mb-1">Klik tombol "Register" di halaman utama.</p>
                    <p class="text-gray-700 mb-1">Isi formulir dengan email, username, dan password Anda.</p>
                    <p class="text-gray-700 mb-1">Verifikasi email Anda melalui link yang dikirim ke inbox.</p>
                    <div class="mt-2">
                        <img src="{{ asset('img/registrasi.png') }}" alt="Langkah Registrasi" class="rounded-md shadow-md">
                        <p class="text-sm text-gray-500 mt-1">Gambar: Contoh Halaman Registrasi</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">2. Login ke Sistem</h2>
                    <p class="text-gray-700 mb-1">Masukkan username dan password yang telah didaftarkan.</p>
                    <p class="text-gray-700 mb-1">Klik tombol "Login" untuk masuk ke dashboard.</p>
                    <div class="mt-2">
                        <img src="{{ asset('img/login.png') }}" alt="Langkah Login" class="rounded-md shadow-md">
                        <p class="text-sm text-gray-500 mt-1">Gambar: Contoh Halaman Login</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">3. Upload Foto Wajah</h2>
                    <p class="text-gray-700 mb-1">Klik tombol "Upload Foto" di dashboard.</p>
                    <p class="text-gray-700 mb-1">Pilih foto wajah yang ingin dianalisis (format JPG/PNG).</p>
                    <p class="text-gray-700 mb-1">Pastikan foto memiliki pencahayaan yang baik dan fokus jelas.</p>
                    <p class="text-gray-700">Foto harus menampilkan area kulit yang ingin diperiksa.</p>
                    <div class="mt-2">
                        <img src="{{ asset('img/cara_upload.PNG') }}" alt="Langkah Upload Foto" class="rounded-md shadow-md">
                        <p class="text-sm text-gray-500 mt-1">Gambar: Contoh Halaman Upload Foto</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">4. Proses Analisis AI</h2>
                    <p class="text-gray-700 mb-1">Sistem akan memproses gambar Anda secara otomatis.</p>
                    <p class="text-gray-700 mb-1">Teknologi AI kami akan menganalisis:</p>
                    <ul class="list-disc list-inside text-gray-700 ml-4">
                        <li>Tekstur kulit</li>
                        <li>Warna dan pigmentasi</li>
                        <li>Adanya lesi atau kelainan kulit</li>
                    </ul>
                    <p class="text-gray-700">Proses ini memakan waktu sekitar 15-30 detik.</p>
                    <div class="mt-2">
                        <img src="{{ asset('img/proses_diagnosa.PNG') }}" alt="Proses Analisis AI (GIF mungkin)" class="rounded-md shadow-md">
                        <p class="text-sm text-gray-500 mt-1">Gambar: Ilustrasi Proses Analisis AI</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">5. Hasil Diagnosis</h2>
                    <p class="text-gray-700 mb-1">Sistem akan menampilkan hasil analisis berupa:</p>
                    <ul class="list-disc list-inside text-gray-700 ml-4 mb-1">
                        <li><strong>Klasifikasi Penyakit:</strong> <code class="bg-gray-200 rounded-md px-2 py-1 text-sm">['Acne', 'Carcinoma', 'Eczema', 'Keratosis', 'Milia', 'Rosacea']</code></li>
                        <li><strong>Tingkat Keparahan:</strong> Ringan, Sedang, atau Berat</li>
                        <li><strong>Area yang Terkena:</strong> Lokasi spesifik pada wajah</li>
                        <li><strong>Penjelasan Medis:</strong> Deskripsi singkat tentang kondisi</li>
                    </ul>
                    <div class="mt-2">
                        <img src="{{ asset('img/hasil_diagnosa.PNG') }}" alt="Contoh Hasil Diagnosis" class="rounded-md shadow-md">
                        <p class="text-sm text-gray-500 mt-1">Gambar: Contoh Halaman Hasil Diagnosis</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Persyaratan Foto untuk Hasil Optimal</h2>
                    <ul class="list-disc list-inside text-gray-700 ml-4">
                        <li>Gunakan resolusi minimal 1024x768 piksel</li>
                        <li>Pencahayaan alami/tidak berlebihan</li>
                        <li>Fokus pada foto bagian wajah yang bermasalah</li>
                        <li>Tidak menggunakan makeup tebal atau filter</li>
                        <li>Satu area fokus per foto</li>
                    </ul>
                    <div class="mt-2">
                        <img src="{{ asset('img/model_foto.png') }}" alt="Persyaratan Foto" class="rounded-md shadow-md">
                        <p class="text-sm text-gray-500 mt-1">Gambar: Ilustrasi Persyaratan Foto</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection