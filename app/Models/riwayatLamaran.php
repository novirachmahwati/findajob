<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class riwayatLamaran extends Model
{
    protected $fillable = [
        'lowongan_id',
        'pencari_kerja_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lowongan()
    {
        return $this->belongsTo(lowongan::class, 'lowongan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pencariKerja()
    {
        return $this->belongsTo(pencariKerja::class, 'pencari_kerja_id');
    }
}
