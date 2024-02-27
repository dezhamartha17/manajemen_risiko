<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'activity_id',
        'tanggal_evaluasi',
        'penilaian_risiko',
    ];

    public function riskValue()
    {
        return $this->belongsTo(RiskValue::class, 'penilaian_risiko', 'id');
    }
    public function temuans()
    {
        return $this->hasMany(Temuan::class, 'assessment_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }
    protected $table = 'risk_assessment';
}
