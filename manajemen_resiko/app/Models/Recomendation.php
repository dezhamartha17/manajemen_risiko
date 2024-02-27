<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'risk_id',
        'tanggal_rekomendasi',
        'deskripsi_rekomendasi',
    ];

    public function risk()
    {
        return $this->belongsTo(Risk::class, 'risk_id', 'id');
    }
    protected $table = 'recomendation';
}
