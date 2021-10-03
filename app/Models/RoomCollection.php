<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCollection extends Model
{
    protected $guarded = ['id'];

    public $rooms;

    public function __construct( $rooms_ids = null)
    {
        $this->rooms = $rooms_ids ? Room::find($rooms_ids) : collect();
    }

    public function pushRoom(Room $room)
    {
        $this->rooms->push($room);
    }


    // Attributes

    public function getTotalPriceAttribute()
    {
        return $this->rooms->reduce( fn($carry, $room) => $carry + $room->price, 0.0);
    }

    public function getCapacityAttribute()
    {
        return $this->rooms->reduce( fn($carry, $room) => $carry + $room->people, 0);
    }
}
