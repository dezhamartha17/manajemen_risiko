<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'user_id',
        'tanggal_monitoring',
        'deskripsi_monitoring',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    protected $table = 'monitoring';
}
