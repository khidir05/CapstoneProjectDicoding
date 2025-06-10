<?php
// database/migrations/xxxx_xx_xx_create_detection_results_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detection_results', function (Blueprint $table) {
            $table->id();
            // Foreign key ke tabel users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Path gambar yang disimpan di storage Laravel
            $table->string('image_path');
            // Kolom untuk menyimpan hasil JSON dari model ML (akan dikonversi ke JSON di DB)
            $table->json('diagnosis_result');
            // Timestamp created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detection_results');
    }
};