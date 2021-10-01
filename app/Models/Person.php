<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'name',
        'surname',
        'phone',
        'celphone',
        'address',
        'birthdate',
    ];


    /* --- relationships --- */

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
