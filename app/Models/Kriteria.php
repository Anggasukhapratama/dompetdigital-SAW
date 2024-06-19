<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama', 'bobot', 'jenis'];

    public function alternatif()
    {
        return $this->belongsToMany(Alternatif::class, 'nilai_kriteria')
                    ->withPivot('nilai');
    }

    public function subkriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }
}
