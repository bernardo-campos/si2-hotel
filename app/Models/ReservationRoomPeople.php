<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationRoomPeople extends Model
{
    use HasFactory;

    // protected $table = 'reservation_rooms_people';

    protected $guarded = ['id'];


    /* ---- Attributes ---- */
    public function getFullNameAttribute()
    {
        return $this->attributes['surname'] || $this->attributes['name']
            ? $this->attributes['surname'] . ', ' . $this->attributes['name']
            : $this->attributes['dni'];
    }


    /* ---- Relationships ---- */

    public function reservation_room() {
        return $this->belongsTo(ReservationRoom::class);
    }

}
