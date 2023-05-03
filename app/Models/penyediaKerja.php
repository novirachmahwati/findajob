<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penyediaKerja extends Model
{
    protected $fillable = [
        'nama_administrator',
        'no_telp_administrator',
        'bidang',
        'alamat',
        'no_telp',
        'jml_karyawan',
        'deskripsi',
        'website',
        'sosial_media',
        'foto',
        'user_id'
    ];

    protected $appends = [
        'name',
        'email'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
