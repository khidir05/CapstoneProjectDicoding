<?php
// app/Models/DetectionResult.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // <-- Pastikan ini

class DetectionResult extends Model
{
    use HasFactory;

    protected $table = 'detection_results'; // Opsional, defaultnya plural dari nama model

    protected $fillable = [
        'user_id',
        'image_path',
        'diagnosis_result', // Akan disimpan sebagai JSON di kolom JSON MySQL
    ];

    protected $casts = [
        'diagnosis_result' => 'array', // Laravel akan otomatis mengkonversi array/objek PHP ke JSON di MySQL
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

}