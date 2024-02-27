<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_aktivitas',
        'deskripsi',
        'department',
        'risiko_terkait',
    ];
    public function department_join()
    {
        return $this->belongsTo(Department::class);
    }

    public function impacts()
    {
        return $this->hasMany(Dampak::class);
    }

    public function risks()
{
    return $this->hasMany(Risk::class, 'risiko_terkait', 'id');
}

    protected $table = 'activity';
}
