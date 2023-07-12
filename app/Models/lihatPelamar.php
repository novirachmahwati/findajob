<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lihatPelamar extends Model
{
    protected $connection = 'hasil_perhitungan';

    protected $fillable = [
        'lowongan_id',
        'pencari_kerja_id',
        'riwayat_lamaran_id',
        'rank',
        'skor'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lowongan()
    {
        return $this->belongsTo(penyediaKerja::class, 'lowongan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pencariKerja()
    {
        return $this->belongsTo(pencariKerja::class, 'pencari_kerja_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function riwayatLamaran()
    {
        return $this->belongsTo(riwayatLamaran::class, 'riwayat_lamaran_id');
    }

}
