@extends('layouts.navigation') {{-- Menggunakan layout dashboard untuk halaman setelah login --}}

@section('title', 'Bantuan & Dukungan')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-gray-800">Pusat Bantuan DermaCare</h1>

<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Pertanyaan yang Sering Diajukan (FAQ)</h2>

    <div class="space-y-4">
        {{-- FAQ Item 1 --}}
        <div class="border border-gray-200 rounded-lg p-4">
            <h3 class="text-md font-semibold text-blue-700 mb-2">Bagaimana cara melakukan diagnosa kulit?</h3>
            <p class="text-gray-600 text-sm">
                Untuk melakukan diagnosa, silakan pergi ke halaman "Diagnosa". Unggah foto wajah Anda yang jelas dan berkualitas baik. Setelah itu, klik tombol "Proses & Simpan Hasil" untuk mendapatkan prediksi dari model AI kami.
            </p>
        </div>

        {{-- FAQ Item 2 --}}
        <div class="border border-gray-200 rounded-lg p-4">
            <h3 class="text-md font-semibold text-blue-700 mb-2">Apakah hasil diagnosa ini akurat?</h3>
            <p class="text-gray-600 text-sm">
                Model AI kami dilatih dengan dataset yang luas dan memiliki akurasi tinggi. Namun, hasil diagnosa ini adalah **prediksi awal** dan **bukan merupakan diagnosis medis final**. Selalu konsultasikan dengan dokter spesialis kulit untuk diagnosis dan penanganan yang akurat.
            </p>
        </div>

        {{-- FAQ Item 3 --}}
        <div class="border border-gray-200 rounded-lg p-4">
            <h3 class="text-md font-semibold text-blue-700 mb-2">Bagaimana saya melihat riwayat diagnosa saya?</h3>
            <p class="text-gray-600 text-sm">
                Anda dapat melihat semua riwayat diagnosa yang pernah Anda lakukan di halaman "Riwayat Diagnosa". Di sana, Anda dapat melihat tanggal, foto yang diunggah, hasil diagnosa, dan tingkat kepercayaan.
            </p>
        </div>

        {{-- FAQ Item 4 --}}
        <div class="border border-gray-200 rounded-lg p-4">
            <h3 class="text-md font-semibold text-blue-700 mb-2">Data saya aman di DermaCare?</h3>
            <p class="text-gray-600 text-sm">
                Kami berkomitmen untuk menjaga privasi dan keamanan data Anda. Semua data yang Anda unggah dan hasil diagnosa disimpan dengan aman sesuai dengan kebijakan privasi kami.
            </p>
        </div>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Hubungi Kami</h2>
    <p class="text-gray-600 mb-4">
        Jika Anda memiliki pertanyaan lebih lanjut, masukan, atau memerlukan bantuan, jangan ragu untuk menghubungi tim dukungan kami.
    </p>
    <ul class="list-disc list-inside text-gray-700 space-y-2">
        <li>Email: <a href="mailto:support@dermacare.com" class="text-blue-600 hover:underline">support@dermacare.com</a></li>
        <li>Telepon: <a href="tel:+6281234567890" class="text-blue-600 hover:underline">+62 812-3456-7890</a></li>
    </ul>
</div>
@endsection