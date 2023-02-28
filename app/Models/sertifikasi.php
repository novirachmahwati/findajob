<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sertifikasi extends Model
{
    protected $fillable = [
        'nama',
        'penerbit',
        'tgl_diterbitkan',
        'tgl_kadaluwarsa',
        'kredensial_id',
        'kredensial_url',
        'pencari_kerja_id'
    ];

    /**
     * Validation rules
     *
     * @param $existing
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'nama' => 'required|max:255',
            'penerbit' => 'required|max:255'
        ];
    }
}
