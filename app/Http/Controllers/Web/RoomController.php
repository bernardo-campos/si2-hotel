<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function searchRooms($capacity, $rooms, $range)
    {
        return [];
    }

    public function index()
    {
        $rooms = null;
        if (request()->has(['capacity', 'rooms', 'range'])) {
            $capacity = request()->capacity;
            $rooms = request()->rooms;
            $range = explode(' - ', request()->range);
            $rooms = $this->searchRooms($capacity, $rooms, $range);
        }

        return view('web.rooms.index', [
            'results' => $rooms,
        ]);
    }
}
