@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tabel Penyakit Kulit</h1>

<div class="bg-white p-6 rounded shadow">
    <table class="min-w-full table-auto border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">Penyakit Wajah</th>
                <th class="px-4 py-2 border">Penyebab</th>
                <th class="px-4 py-2 border">Ciri-ciri</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t">
                <td class="px-4 py-2 border font-semibold">Jerawat (Acne)</td>
                <td class="px-4 py-2 border">Produksi minyak berlebih, pori-pori tersumbat, bakteri, hormon, stres, genetik, kosmetik.</td>
                <td class="px-4 py-2 border">Komedo, papula, pustula, nodul/kista. Sering di wajah, leher, dada, punggung.</td>
            </tr>
            <tr class="border-t">
                <td class="px-4 py-2 border font-semibold">Rosacea</td>
                <td class="px-4 py-2 border">Faktor genetik & lingkungan. Pemicu: sinar matahari, makanan pedas, alkohol, stres, bakteri H. pylori.</td>
                <td class="px-4 py-2 border">Kemerahan, telangiektasis, benjolan merah/nanah, sensasi panas, mata iritasi.</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
