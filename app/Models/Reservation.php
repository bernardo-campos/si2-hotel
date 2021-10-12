<?php

namespace App\Models;

use App\Enums\ReservationStatus;
use App\Models\ReservationRoom;
use App\Models\ReservationRoomPeople;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'checkin' => 'date',
        'checkout' => 'date',
        'status' => ReservationStatus::class
    ];


    /* ---- Attributes ---- */

    public function getTotalDaysAttribute()
    {
        return $this->checkout->diffInDays($this->checkin) + 1;
    }

    public function getPriceAttribute()
    {
        return number_format($this->attributes['price'], 2, ',', '.');
    }

    public function getAdvancePriceAttribute()
    {
        return number_format($this->attributes['price'] * 0.1, 2, ',', '.');
    }


    /* ---- Relationships ---- */

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function rooms() {
        return $this->belongsToMany(Room::class, 'reservation_rooms');
    }

    public function people() {
        return $this->hasManyThrough(ReservationRoomPeople::class, ReservationRoom::class);
    }
}
