<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nilai_risiko',
        'keterangan',
    ];

    protected $table = 'risk_value';
}
