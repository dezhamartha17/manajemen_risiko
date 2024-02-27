<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_risiko',
        'deskripsi',
        'kategori',
        'tingkat_risiko',
    ];

    protected $table = 'risk';
}
