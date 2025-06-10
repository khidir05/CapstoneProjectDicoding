@extends('layouts.navigation') {{-- Menggunakan layout dashboard yang memiliki navbar dan sidebar --}}

@section('title', 'Riwayat Diagnosa Kulit')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-gray-800">Riwayat Diagnosa Kulit</h1>

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Daftar Hasil Diagnosa Anda</h2>

    @if($detectionResults->isEmpty())
        <div class="text-center py-10">
            <p class="text-gray-600 mb-4">Anda belum memiliki riwayat diagnosa. Yuk, mulai diagnosa pertama Anda!</p>
            <a href="{{ route('diagnosa') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                Mulai Diagnosa Sekarang
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                            Tanggal Diagnosa
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                            Foto
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                            Diagnosa
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                            Kepercayaan
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                            Deskripsi Singkat
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($detectionResults as $result)
                    <tr id="row-{{ $result->id }}" class="hover:bg-gray-50"> {{-- Tambahkan ID untuk JavaScript --}}
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-900">
                            {{ $result->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-900">
                            @if($result->image_path)
                                <img src="{{ asset('storage/' . $result->image_path) }}" alt="Foto Diagnosa" class="w-20 h-20 object-cover rounded-md border border-gray-200">
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-900">
                            {{ $result->diagnosis_result['diagnosis'] ?? 'Tidak Diketahui' }}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-900">
                            {{ number_format(($result->diagnosis_result['confidence'] ?? 0) * 100, 2) }}%
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-900 max-w-xs overflow-hidden text-ellipsis whitespace-nowrap">
                            {{ $result->diagnosis_result['description'] ?? 'Tidak ada deskripsi.' }}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm font-medium">
                            <button
                                type="button"
                                class="text-red-600 hover:text-red-900 delete-button"
                                data-id="{{ $result->id }}"
                                data-image-path="{{ $result->image_path }}" {{-- Tambahkan path gambar untuk dihapus dari storage --}}
                                title="Hapus Riwayat Ini">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $detectionResults->links() }}
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', async function() {
                const detectionId = this.dataset.id;
                const imagePath = this.dataset.imagePath; // Dapatkan image path dari data attribute
                const rowElement = document.getElementById(`row-${detectionId}`);

                if (confirm('Apakah Anda yakin ingin menghapus riwayat diagnosa ini?')) {
                    try {
                        const response = await fetch(`/riwayat-diagnosa/${detectionId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ image_path: imagePath }) // Kirim image_path di body
                        });

                        if (response.ok) {
                            const result = await response.json();
                            alert(result.message);
                            if (rowElement) {
                                rowElement.remove(); // Hapus baris dari tabel
                            }
                            // Opsional: Jika halaman kosong setelah hapus, refresh page
                            if (document.querySelectorAll('.delete-button').length === 0) {
                                location.reload();
                            }
                        } else {
                            const errorData = await response.json();
                            alert(`Gagal menghapus riwayat: ${errorData.message || 'Unknown error'}`);
                        }
                    } catch (error) {
                        console.error('Error deleting detection result:', error);
                        alert('Terjadi kesalahan saat menghapus riwayat. Silakan coba lagi.');
                    }
                }
            });
        });
    });
</script>
@endsection