<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'phone',
        'adresse',
        'image',
        'cin',
        'role',

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
    protected $attributes = [
        // 'phone' => '0000000',
        'usertype' => '0',
        'cin' => '',
        'adresse' => '',
        'image' => 'default.jpg',
        'role' => 0,
    ];

    // public function studentStages()
    // {
    //     return $this->hasMany(Stage::class, 'etudiant_id');
    // }

    public function supervisorStages()
    {
        return $this->hasMany(Stage::class, 'encadrant_id');
    }
    public function stages()
    {
        return $this->belongsToMany(Stage::class);
    }
}
