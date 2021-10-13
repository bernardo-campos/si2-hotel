<?php

namespace App\Models;

use App\Models\Card;
use App\Models\Person;
use App\Models\Reservation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* --- attributes --- */
    public function getNameAttribute()
    {
        return $this->person->name;
    }


    /* --- relationships --- */

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
