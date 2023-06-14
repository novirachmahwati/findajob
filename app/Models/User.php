<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get the pencariKerja associated with the user.
     */
    public function pencariKerja(): HasOne
    {
        return $this->hasOne(pencariKerja::class);
    }

    /**
     * Get the pencariKerja associated with the user.
     */
    public function penyediaKerja(): HasOne
    {
        return $this->hasOne(penyediaKerja::class);
    }

    public function getRedirectRoute()
    {
        return match($this->role) {
            'Pencari Kerja' => '/pencari-kerja/dashboard',
            'Penyedia Kerja' => '/penyedia-kerja/dashboard'
        };
    }
}
