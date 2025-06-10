@extends('layouts.navigation') 

@section('title', 'Jenis-jenis Penyakit Kulit')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-gray-800">Jenis-jenis Penyakit Kulit Wajah</h1>

<div class="bg-white p-6 rounded-lg shadow-md">
    <p class="text-gray-700 mb-6">
        Berikut adalah informasi mengenai beberapa jenis kondisi kulit wajah yang umum dan dapat dideteksi oleh sistem kami.
        Informasi ini bersifat edukatif dan bukan pengganti diagnosis medis profesional.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">

        {{-- Contoh Penyakit: Acne (Jerawat) --}}
        <div class="border border-gray-200 rounded-lg p-6 bg-gray-50 hover:shadow-lg transition duration-200 ease-in-out">
            <h3 class="text-xl font-semibold text-blue-700 mb-3">Acne (Jerawat)</h3>
            <p class="text-gray-600 mb-2">
                **Penyebab:** Kondisi kulit yang terjadi ketika folikel rambut tersumbat oleh minyak, sel kulit mati, dan bakteri. Hormon, genetik, stres, dan diet tertentu dapat memperburuk kondisi ini.
            </p>
            <p class="text-gray-600">
                **Solusi:**
            </p>
            <ul class="list-disc list-inside text-gray-600 text-sm pl-4">
                <li>Jaga kebersihan wajah dua kali sehari.</li>
                <li>Gunakan produk non-komedogenik.</li>
                <li>Hindari memencet jerawat.</li>
                <li>Konsultasi dengan dermatologis untuk pengobatan topikal atau oral.</li>
            </ul>
        </div>

        {{-- Contoh Penyakit: Carcinoma (Karsinoma) --}}
        <div class="border border-gray-200 rounded-lg p-6 bg-gray-50 hover:shadow-lg transition duration-200 ease-in-out">
            <h3 class="text-xl font-semibold text-red-700 mb-3">Carcinoma (Kanker Kulit)</h3>
            <p class="text-gray-600 mb-2">
                **Penyebab:** Pertumbuhan sel kulit yang abnormal, seringkali akibat paparan sinar UV berlebihan dari matahari atau tanning bed. Ada beberapa jenis, seperti karsinoma sel basal dan karsinoma sel skuamosa.
            </p>
            <p class="text-gray-600">
                **Solusi:**
            </p>
            <ul class="list-disc list-inside text-gray-600 text-sm pl-4">
                <li>**SEGERA KONSULTASIKAN DENGAN DOKTER SPESIALIS KULIT (DERMATOLOGIS) UNTUK DIAGNOSIS DAN PENANGANAN LEBIH LANJUT.**</li>
                <li>Hindari paparan sinar matahari langsung, gunakan tabir surya.</li>
                <li>Periksa kulit secara rutin untuk perubahan mencurigakan.</li>
            </ul>
        </div>

        {{-- Contoh Penyakit: Eczema (Eksim/Dermatitis Atopik) --}}
        <div class="border border-gray-200 rounded-lg p-6 bg-gray-50 hover:shadow-lg transition duration-200 ease-in-out">
            <h3 class="text-xl font-semibold text-blue-700 mb-3">Eczema (Eksim / Dermatitis Atopik)</h3>
            <p class="text-gray-600 mb-2">
                **Penyebab:** Kondisi kulit kronis yang menyebabkan kulit kering, gatal, meradang, dan terkadang melepuh. Dipengaruhi oleh genetik, alergi, iritasi, dan fungsi barier kulit yang terganggu.
            </p>
            <p class="text-gray-600">
                **Solusi:**
            </p>
            <ul class="list-disc list-inside text-gray-600 text-sm pl-4">
                <li>Jaga kelembaban kulit dengan pelembap secara rutin.</li>
                <li>Identifikasi dan hindari pemicu alergi atau iritasi.</li>
                <li>Gunakan sabun lembut tanpa pewangi.</li>
                <li>Konsultasi dengan dokter untuk salep kortikosteroid atau imunosupresan.</li>
            </ul>
        </div>

        {{-- Contoh Penyakit: Keratosis --}}
        <div class="border border-gray-200 rounded-lg p-6 bg-gray-50 hover:shadow-lg transition duration-200 ease-in-out">
            <h3 class="text-xl font-semibold text-orange-700 mb-3">Keratosis (Seborrhoeic Keratosis / Actinic Keratosis)</h3>
            <p class="text-gray-600 mb-2">
                **Penyebab:**
                <ul class="list-disc list-inside text-gray-600 text-sm pl-4 mb-1">
                    <li>**Seborrhoeic Keratosis:** Pertumbuhan kulit non-kanker yang umum terjadi seiring bertambahnya usia, penyebab pasti tidak diketahui tetapi terkait genetik dan paparan matahari.</li>
                    <li>**Actinic Keratosis:** Lesi pra-kanker yang disebabkan oleh paparan sinar UV jangka panjang.</li>
                </ul>
            </p>
            <p class="text-gray-600">
                **Solusi:**
            </p>
            <ul class="list-disc list-inside text-gray-600 text-sm pl-4">
                <li>**Untuk Actinic Keratosis, konsultasi dokter diperlukan untuk penanganan.**</li>
                <li>Seborrhoeic Keratosis biasanya tidak memerlukan pengobatan kecuali mengganggu estetika atau gatal (dapat diangkat oleh dokter).</li>
                <li>Lindungi kulit dari sinar matahari.</li>
            </ul>
        </div>

        {{-- Contoh Penyakit: Milia --}}
        <div class="border border-gray-200 rounded-lg p-6 bg-gray-50 hover:shadow-lg transition duration-200 ease-in-out">
            <h3 class="text-xl font-semibold text-gray-700 mb-3">Milia</h3>
            <p class="text-gray-600 mb-2">
                **Penyebab:** Benjolan kecil berwarna putih atau kekuningan yang muncul ketika keratin (protein kulit) terjebak di bawah permukaan kulit. Sering terjadi pada bayi, tetapi juga bisa pada orang dewasa akibat kerusakan kulit atau penggunaan produk tertentu.
            </p>
            <p class="text-gray-600">
                **Solusi:**
            </p>
            <ul class="list-disc list-inside text-gray-600 text-sm pl-4">
                <li>Milia seringkali hilang dengan sendirinya.</li>
                <li>Jangan mencoba memencetnya sendiri.</li>
                <li>Gunakan produk perawatan kulit yang lembut dan non-komedogenik.</li>
                <li>Jika mengganggu, dapat diekstraksi oleh profesional kulit.</li>
            </ul>
        </div>

        {{-- Contoh Penyakit: Rosacea --}}
        <div class="border border-gray-200 rounded-lg p-6 bg-gray-50 hover:shadow-lg transition duration-200 ease-in-out">
            <h3 class="text-xl font-semibold text-pink-700 mb-3">Rosacea</h3>
            <p class="text-gray-600 mb-2">
                **Penyebab:** Kondisi kulit kronis yang menyebabkan kemerahan, pembuluh darah terlihat, dan terkadang benjolan kecil berisi nanah di wajah. Penyebab pasti tidak diketahui, tetapi faktor genetik dan lingkungan berperan.
            </p>
            <p class="text-gray-600">
                **Solusi:**
            </p>
            <ul class="list-disc list-inside text-gray-600 text-sm pl-4">
                <li>Hindari pemicu (misalnya makanan pedas, alkohol, kafein, paparan sinar matahari, suhu ekstrem).</li>
                <li>Gunakan produk perawatan kulit yang lembut dan tabir surya.</li>
                <li>Konsultasi dengan dokter untuk obat topikal atau oral, atau terapi laser.</li>
            </ul>
        </div>

        {{-- Anda bisa menambahkan lebih banyak jenis penyakit di sini --}}

    </div>

    <p class="text-gray-600 mt-8 text-sm text-center">
        **Peringatan:** Informasi di halaman ini hanya untuk tujuan edukasi umum dan tidak boleh dianggap sebagai nasihat medis profesional. Selalu konsultasikan dengan dokter atau dermatologis untuk diagnosis dan pengobatan yang akurat.
    </p>
</div>
@endsection