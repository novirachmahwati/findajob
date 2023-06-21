<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pencariKerja extends Model
{
    protected $fillable = [
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'no_telp',
        'agama',
        'foto',
        'cv',
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
 
    public function riwayatLamaran(): HasMany
    {
        return $this->hasMany(riwayatLamaran::class);
    }
}
