@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Diagnosa Kulit</h1>

<div class="bg-white p-6 rounded shadow mb-10">
    <h2 class="text-lg font-semibold mb-4">Ambil Foto</h2>
    <div class="flex flex-col items-center gap-4">
        <video id="camera" autoplay class="w-96 h-64 bg-black rounded shadow"></video>
        <canvas id="photoCanvas" width="384" height="256" class="hidden"></canvas>

        <button onclick="capturePhoto()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
            📸 Ambil Foto
        </button>
    </div>
</div>

<form method="POST" action="/diagnosa" class="bg-white p-6 rounded shadow">
    @csrf
    <input type="hidden" id="photoData" name="photoData">

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Hasil Diagnosa</label>
        <textarea name="hasil" rows="6" class="w-full p-4 bg-gray-100 border border-gray-300 rounded" placeholder="Hasil akan ditampilkan di sini..."></textarea>
    </div>

    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow">
        💾 Simpan Hasil
    </button>
</form>

<script>
    function previewCamera() {
        const video = document.querySelector('#camera');
        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => video.srcObject = stream)
                .catch(err => console.log("Camera error: " + err));
        }
    }

    function capturePhoto() {
        const canvas = document.getElementById('photoCanvas');
        const video = document.getElementById('camera');
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        document.getElementById('photoData').value = canvas.toDataURL('image/png');
    }

    document.addEventListener('DOMContentLoaded', previewCamera);
</script>
@endsection
