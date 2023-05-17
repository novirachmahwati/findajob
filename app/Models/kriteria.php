<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    protected $fillable = [
        'minimal_pendidikan',
        'prioritas_minimal_pendidikan',
        'tahun_pengalaman',
        'jurusan_pendidikan_terakhir',
        'status_pernikahan',
        'rentang_usia_minimal',
        'rentang_usia_maksimal',
        'bahasa',
        'keterampilan_teknis',
        'prioritas_keterampilan_teknis',
        'keterampilan_non_teknis',
        'prioritas_keterampilan_non_teknis',
        'lowongan_kerja_id'
    ];

    public function setStatusPernikahanAttribute($value)
    {
        $this->attributes['status_pernikahan'] = json_encode($value);
    }

    public function getStatusPernikahanAttribute($value)
    {
        return $this->attributes['status_pernikahan'] = json_decode($value);
    }

    public function setBahasaAttribute($value)
    {
        $this->attributes['bahasa'] = json_encode($value);
    }

    public function getBahasaAttribute($value)
    {
        return $this->attributes['bahasa'] = json_decode($value);
    }

    public function setKeterampilanTeknisAttribute($value)
    {
        $this->attributes['keterampilan_teknis'] = json_encode($value);
    }

    public function getKeterampilanTeknisAttribute($value)
    {
        return $this->attributes['keterampilan_teknis'] = json_decode($value);
    }

    public function setPrioritasKeterampilanTeknisAttribute($value)
    {
        $this->attributes['prioritas_keterampilan_teknis'] = json_encode($value);
    }

    public function getPrioritasKeterampilanTeknisAttribute($value)
    {
        return $this->attributes['prioritas_keterampilan_teknis'] = json_decode($value);
    }

    public function setKeterampilanNonTeknisAttribute($value)
    {
        $this->attributes['keterampilan_non_teknis'] = json_encode($value);
    }

    public function getKeterampilanNonTeknisAttribute($value)
    {
        return $this->attributes['keterampilan_non_teknis'] = json_decode($value);
    }

    public function setPrioritasKeterampilanNonTeknisAttribute($value)
    {
        $this->attributes['prioritas_keterampilan_non_teknis'] = json_encode($value);
    }

    public function getPrioritasKeterampilanNonTeknisAttribute($value)
    {
        return $this->attributes['prioritas_keterampilan_non_teknis'] = json_decode($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lowongankerja()
    {
        return $this->belongsTo(lowongankerja::class, 'lowongan_kerja_id');
    }
}
