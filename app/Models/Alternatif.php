<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class, 'nilai_kriteria')
                    ->withPivot('nilai');
    }
}

