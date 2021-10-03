<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // TODO: implement
    public function hasReservationBetween($from, $to) {
        return false;
    }

    // Attributes
    //...


    public function getPeopleAttribute()
    {
        return $this->attributes['single_beds'] + 2 * $this->attributes['double_beds'];
    }
}
