@extends('layouts.navigation') 

@section('title', 'Diagnosa') 

@section('content')
<h1 class="text-2xl font-bold mb-6 text-gray-800">Diagnosa Kulit Wajah</h1>

<div class="bg-white p-6 rounded-lg shadow-md mb-10">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Langkah 1: Unggah Foto Wajah Anda</h2>
    <div class="flex flex-col items-center gap-4">
        {{-- Input untuk mengunggah file foto --}}
        <input type="file" id="uploadPhotoButton" accept="image/jpeg, image/png, image/jpg" class="hidden">
        <button id="selectPhotoButton" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition duration-150 ease-in-out">
            ⬆️ Pilih Foto dari Galeri
        </button>
        {{-- Preview foto yang diunggah --}}
        <img id="uploadedPhotoPreview" class="hidden w-full max-w-md h-auto rounded-lg shadow-lg border-4 border-blue-400 mt-4" alt="Foto yang Diunggah">
        <p id="fileNameDisplay" class="text-gray-600 text-sm hidden"></p>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Langkah 2: Proses & Lihat Hasil Diagnosa</h2>

    {{-- Form yang akan digunakan untuk mengirim data via AJAX --}}
    <form id="diagnosaForm">
        @csrf {{-- Token CSRF untuk keamanan --}}
        {{-- Input photoData sudah tidak lagi Base64, tapi akan diisi langsung oleh FormData --}}
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Hasil Diagnosa:</label>
            <textarea name="hasil_diagnosa" rows="6" class="w-full p-4 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Hasil akan ditampilkan di sini setelah foto diproses..." readonly></textarea>
        </div>

        <button type="button" id="processAndSaveButton" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow-md transition duration-150 ease-in-out" disabled>
            💾 Proses & Simpan Hasil
        </button>
        <span id="loadingStatus" class="ml-4 text-gray-600 hidden">
            <i class="fas fa-spinner fa-spin mr-2"></i> Memproses...
        </span>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("DOMContentLoaded event fired. Initializing upload setup...");

        const uploadPhotoButton = document.getElementById('uploadPhotoButton');
        const selectPhotoButton = document.getElementById('selectPhotoButton');
        const uploadedPhotoPreview = document.getElementById('uploadedPhotoPreview');
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        const processAndSaveButton = document.getElementById('processAndSaveButton');
        const loadingStatus = document.getElementById('loadingStatus');
        const hasilTextarea = document.querySelector('textarea[name="hasil_diagnosa"]');

        let selectedFile = null; // Untuk menyimpan file yang dipilih

        // Memicu klik pada input file tersembunyi
        selectPhotoButton.addEventListener('click', () => {
            uploadPhotoButton.click();
        });

        // Menangani saat file dipilih
        uploadPhotoButton.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                selectedFile = file; // Simpan file yang dipilih
                fileNameDisplay.textContent = `File: ${file.name}`;
                fileNameDisplay.style.display = 'block';

                const reader = new FileReader();
                reader.onload = (e) => {
                    uploadedPhotoPreview.src = e.target.result;
                    uploadedPhotoPreview.style.display = 'block';
                    processAndSaveButton.disabled = false; // Aktifkan tombol proses
                    hasilTextarea.value = 'Foto siap diproses. Klik "Proses & Simpan Hasil".';
                };
                reader.readAsDataURL(file); // Membaca file sebagai Data URL untuk preview
            } else {
                selectedFile = null;
                uploadedPhotoPreview.src = '';
                uploadedPhotoPreview.style.display = 'none';
                fileNameDisplay.style.display = 'none';
                processAndSaveButton.disabled = true;
                hasilTextarea.value = '';alert('Silakan pilih file foto terlebih dahulu.');
            }
        });

        // Fungsi untuk mengirim data foto ke backend via AJAX
        processAndSaveButton.addEventListener('click', async () => {
            if (!selectedFile) {
                alert('Silakan unggah foto terlebih dahulu!');
                return;
            }

            // Tampilkan status loading
            processAndSaveButton.disabled = true;
            loadingStatus.classList.remove('hidden');
            hasilTextarea.value = 'Memproses diagnosa... Mohon tunggu.';

            const formData = new FormData();
            formData.append('image', selectedFile); // Langsung kirim file yang dipilih

            try {
                const response = await fetch('{{ route('analyze') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        // Penting: Jangan atur 'Content-Type' untuk FormData, browser akan mengaturnya otomatis
                    },
                    body: formData, // Kirim FormData yang berisi file
                });

                const data = await response.json();

                // Sembunyikan status loading
                processAndSaveButton.disabled = false;
                loadingStatus.classList.add('hidden');

                if (response.ok) {
                    if (data.diagnosis) { // Asumsi ML API mengembalikan 'diagnosis' dan 'confidence'
                        hasilTextarea.value = `Diagnosa: ${data.diagnosis}\nKepercayaan: ${(data.confidence * 100).toFixed(2)}%\n${data.description || 'Tidak ada deskripsi tambahan.'}`;
                        alert('Diagnosa berhasil diproses dan disimpan!');
                    } else {
                        hasilTextarea.value = 'Hasil dari model tidak spesifik: ' + JSON.stringify(data, null, 2);
                        alert('Diagnosa berhasil diproses, namun format hasilnya tidak dikenal.');
                    }
                } else {
                    hasilTextarea.value = 'Terjadi kesalahan saat deteksi: ' + (data.message || 'Unknown error');
                    alert('Gagal melakukan diagnosa: ' + (data.error || data.message || 'Silakan coba lagi.'));
                }

            } catch (error) {
                console.error('Error:', error);
                processAndSaveButton.disabled = false;
                loadingStatus.classList.add('hidden');
                hasilTextarea.value = 'Terjadi kesalahan jaringan atau server. Pastikan API ML berjalan.';
                alert('Terjadi kesalahan jaringan atau server. Mohon periksa koneksi atau konsol browser.');
            }
        });
    });
</script>
@endsection