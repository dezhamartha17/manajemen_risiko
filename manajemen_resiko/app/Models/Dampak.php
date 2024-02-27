<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dampak extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_risk',
        'nama_dampak',
        'deskripsi_dampak',
        'nilai_dampak',
    ];
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    protected $table = 'dampak';
}
