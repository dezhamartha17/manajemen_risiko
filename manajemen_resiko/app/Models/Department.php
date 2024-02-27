<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_department',
        'deskripsi',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    protected $table = 'department';
}
