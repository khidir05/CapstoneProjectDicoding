<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use App\Models\DetectionResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Client\ConnectionException; // Import eksplisit untuk menangkap exception koneksi

class DetectionController extends Controller
{
    /**
     * Tampilkan halaman diagnosa.
     */
    public function showDiagnosa(): View
    {
        return view('diagnosa');
    }

    /**
     * Tampilkan halaman riwayat diagnosa.
     */
    public function showRiwayatDiagnosa(): View
    {
        $detectionResults = Auth::user()->detectionResults()->latest()->paginate(10);
        return view('riwayat_diagnosa', compact('detectionResults'));
    }

    /**
     * Tampilkan halaman jenis penyakit.
     */
    public function showJenisPenyakit(): View
    {
        return view('jenis_penyakit'); // Mengarahkan ke resources/views/jenis_penyakit.blade.php
    }

     public function showHelp(): View
    {
        return view('help'); // Mengarahkan ke resources/views/help.blade.php
    }


    /**
     * Proses gambar untuk deteksi penyakit dan simpan hasilnya.
     */
    public function analyzeSkin(Request $request)
    {
        \Log::info('--- Starting analyzeSkin request ---'); // Log awal request

        // 1. Validasi Input Gambar
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        \Log::info('Image validation passed.');

        $imageFile = $request->file('image');
        $imagePath = $imageFile->store('diagnosis_images', 'public');
        \Log::info('Image stored at: ' . $imagePath);

        try {
            // 2. Persiapkan Data untuk Dikirim ke API ML
            $imageData = base64_encode(file_get_contents(Storage::disk('public')->path($imagePath)));
            \Log::info('Image converted to Base64.');

            $mlApiEndpoint = 'http://127.0.0.1:5000/predict'; // URL server Flask API Anda
            \Log::info('Attempting to connect to ML API at: ' . $mlApiEndpoint);

            // 3. Mengirim Permintaan ke API ML
            $response = Http::timeout(60)
             ->withHeaders([
                 'Content-Type' => 'application/json',
                 'Accept' => 'application/json',
             ])
             ->post($mlApiEndpoint, [
                 'image' => $imageData,
             ]);

            \Log::info('ML API request sent. Response status: ' . $response->status());
            \Log::info('ML API raw response body: ' . $response->body()); // Log body respons mentah

            // 4. Proses Respons dari API ML
            if ($response->successful()) {
                $mlResult = $response->json();
                \Log::info('ML API response successfully parsed to JSON.');

                // --- Verifikasi Format Respons dari ML API ---
                if (isset($mlResult['diagnosis']) && isset($mlResult['confidence'])) {
                    // 5. Simpan Hasil Deteksi ke Database (MySQL)
                    DetectionResult::create([
                        'user_id' => Auth::id(),
                        'image_path' => $imagePath,
                        'diagnosis_result' => $mlResult, // Simpan array/JSON ke kolom JSON di MySQL
                    ]);
                    \Log::info('Detection result saved to database for user: ' . Auth::id());

                    // 6. Kembalikan Hasil yang Terstruktur ke Frontend
                    return response()->json([
                        'diagnosis' => $mlResult['diagnosis'],
                        'confidence' => $mlResult['confidence'],
                        'description' => $mlResult['description'] ?? 'Tidak ada deskripsi tersedia.',
                    ]);
                } else {
                    \Log::error('ML API Response Format Error: Expected "diagnosis" and "confidence", got: ' . json_encode($mlResult));
                    return response()->json(
                        ['error' => 'Format hasil dari model tidak sesuai. Mohon hubungi administrator.', 'raw_response' => $mlResult],
                        500
                    );
                }

            } else {
                \Log::error('ML API Request Failed (Non-2xx status): ' . $response->status() . ' - Response: ' . $response->body());
                return response()->json(
                    ['error' => 'Gagal terhubung ke model deteksi atau model mengalami kesalahan. Mohon coba lagi.', 'message' => $response->json('message') ?? ''],
                    $response->status()
                );
            }
        } catch (ConnectionException $e) { // Tangkap khusus untuk masalah koneksi HTTP
            \Log::error('ML API Connection Exception: ' . $e->getMessage());
            return response()->json(['error' => 'Tidak dapat terhubung ke server model deteksi. Pastikan server berjalan dan URL benar.'], 503);
        } catch (\Exception $e) { // Tangkap error umum lainnya
            \Log::error('Detection Process General Exception: ' . $e->getMessage() . ' | File: ' . $e->getFile() . ' | Line: ' . $e->getLine());
            return response()->json(['error' => 'Terjadi kesalahan internal pada server saat memproses gambar. Mohon hubungi administrator.'], 500);
        } finally {
            \Log::info('--- analyzeSkin request finished ---'); 
        }
    }

      public function deleteDetectionResult(Request $request, $id): JsonResponse // <<<--- Ini merujuk ke Illuminate\Http\JsonResponse
    {
        \Log::info('Attempting to delete detection result. ID: ' . $id . ', User ID: ' . Auth::id());

        $result = Auth::user()->detectionResults()->find($id);

        if (!$result) {
            \Log::warning('Delete failed: Detection result not found or not owned by user. ID: ' . $id . ', User ID: ' . Auth::id());
            return response()->json(['message' => 'Riwayat diagnosa tidak ditemukan atau Anda tidak memiliki izin untuk menghapusnya.'], 404);
        }

        try {
            $imagePath = $result->image_path;

            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
                \Log::info('Deleted image from storage: ' . $imagePath);
            } else {
                \Log::info('No image path found or image does not exist in storage for result ID: ' . $id);
            }

            $result->delete();
            \Log::info('Successfully deleted detection result from database. ID: ' . $id . ' for user ' . Auth::id());

            return response()->json(['message' => 'Riwayat diagnosa berhasil dihapus.']);

        } catch (\Exception $e) {
            \Log::error('Error deleting detection result (exception caught): ' . $e->getMessage() . ' | ID: ' . $id . ' | User: ' . Auth::id() . ' | File: ' . $e->getFile() . ' | Line: ' . $e->getLine());
            return response()->json(['message' => 'Gagal menghapus riwayat diagnosa. Terjadi kesalahan server.'], 500);
        }
    }
}