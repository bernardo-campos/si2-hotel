<?php

namespace App\Models;

use App\Models\ReservationRoomPeople;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'checkin' => 'date',
        'checkout' => 'date',
    ];


    /* ---- Relationships ---- */

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'reservation_rooms');
    }

    public function people()
    {
        return $this->hasManyThrough(ReservationRoomPeople::class, ReservationRoom::class);
    }
}
