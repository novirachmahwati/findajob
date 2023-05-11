<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class lowonganKerja extends Model
{
    protected $fillable = [
        'judul_pekerjaan',
        'jenis',
        'lokasi',
        'gaji',
        'deskripsi',
        'status',
        'penyedia_kerja_id'
    ];

    /**
     * Get the kriteria associated with lowonganKerja.
     */
    public function kriteria(): HasMany
    {
        return $this->hasMany(kriteria::class);
    }
}
