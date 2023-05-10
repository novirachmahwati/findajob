<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    protected $fillable = [
        'pendidikan',
        'skill',
        'pengalaman_kerja',
        'penghargaan',
        'organisasi',
        'bahasa',
        'deskripsi',
        'foto',
        'lowongan_kerja_id'
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
