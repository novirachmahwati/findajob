<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class lowongan extends Model
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

    /**
     * Get the kriteria associated with lowongan.
     */
    public function kriteria(): HasOne
    {
        return $this->hasOne(kriteria::class);
    }

    /**
     * Get the kriteria associated with lowongan.
     */
    public function riwayatLamaran(): HasOne
    {
        return $this->hasOne(riwayatLamaran::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penyediaKerja()
    {
        return $this->belongsTo(penyediaKerja::class, 'penyedia_kerja_id');
    }
}
