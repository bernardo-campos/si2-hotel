<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationRoom extends Model
{
    use HasFactory;

    // protected $table = 'reservation_rooms';
    protected $guarded = ['id'];


    /* ---- Relationships ---- */

    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }
}
