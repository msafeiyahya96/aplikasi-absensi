<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table        = "absensi";
    protected $primaryKey   = "id";
    protected $fillable     = [
        'id',
        'user_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'jam_kerja'
    ];

    public function user() {
        $this->belongsTo(User::class);
    }
}
