<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DermaCare - Diagnosa</title>
    <script defer>
        function previewCamera() {
            const video = document.querySelector('#camera');
            if (navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (stream) {
                        video.srcObject = stream;
                    })
                    .catch(function (err) {
                        console.log("Camera error: " + err);
                    });
            }
        }

        function capturePhoto() {
            const canvas = document.getElementById('photoCanvas');
            const video = document.getElementById('camera');
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            document.getElementById('photoData').value = canvas.toDataURL('image/png');
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', previewCamera);
    </script>
    @vite(['resources/css/app.css']) <!-- Jika pakai Vite -->
</head>
<body class="flex h-screen bg-gray-100 text-gray-800">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r shadow-md p-6 flex flex-col">
        <div class="flex flex-col items-center mb-8">
            <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center text-white text-xl">👤</div>
            <p class="mt-2 font-semibold">User</p>
        </div>

        <nav class="space-y-3 text-sm">
            <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100">Dashboard</a>
            <a href="#" class="block px-4 py-2 bg-blue-500 text-white rounded">Diagnosa</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100">Riwayat Diagnosa</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100">Jenis Penyakit</a>
        </nav>

        <div class="mt-auto text-sm">
            <a href="#" class="block px-4 py-2 text-gray-500 hover:text-blue-600">Help</a>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left block px-4 py-2 text-red-500 hover:text-red-700">
            Logout
            </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10 overflow-y-auto bg-gray-50">
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
                <textarea name="hasil" rows="6" class="w-full p-4 bg-gray-100 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Hasil akan ditampilkan di sini..."></textarea>
            </div>

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow">
                💾 Simpan Hasil
            </button>
        </form>
    </main>
</body>
</html>
