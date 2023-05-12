<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class lowonganKerja extends Model
{
    protected $fillable = [
        'judul_pekerjaan',
        'deskripsi_pekerjaan',
        'jenis_pekerjaan',
        'lokasi_pekerjaan',
        'rentang_gaji_minimal',
        'rentang_gaji_maksimal',
        'jenis_kelamin',
        'tanggal_tayang',
        'tanggal_kadaluwarsa',
        'kuota',
        'status',
        'penyedia_kerja_id'
    ];

    public function setJenisKelaminAttribute($value)
    {
        $this->attributes['jenis_kelamin'] = json_encode($value);
    }

    public function getJenisKelaminAttribute($value)
    {
        return $this->attributes['jenis_kelamin'] = json_decode($value);
    }

    /**
     * Get the kriteria associated with lowonganKerja.
     */
    public function kriteria(): HasMany
    {
        return $this->hasMany(kriteria::class);
    }
}
