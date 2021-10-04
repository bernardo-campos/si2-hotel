<?php

namespace App\Http\Controllers\Web;

use App\Models\Room;
use App\Models\RoomCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function makeCombiUtil(&$collection, $left, $k, &$tmp, &$ans) {
        if ($k == 0) {
            $ans->push( clone $tmp );
            return;
        }

        for ($i = $left; $i < $collection->count(); $i++)
        {
            $tmp->push( $collection[$i] );
            $this->makeCombiUtil($collection, $i + 1, $k - 1, $tmp, $ans);
            $tmp->pop();
        }
    }

    public function makeCombi($collection, $k)
    {
        $tmp = collect();
        $ans = collect();
        $this->makeCombiUtil($collection, 0, $k, $tmp, $ans);
        return $ans;
    }

    public function searchRooms($capacity, $rooms_qty, $range)
    {
        $group = collect();

        $rooms = Room::all()->filter(
            fn ($room) => !$room->hasReservationBetween($range[0], $range[1])
        );

        $room_combinations = $this->makeCombi( $rooms->pluck('id'), $rooms_qty );

        foreach ($room_combinations as $combination) {
            $group->push( new RoomCollection($combination) );
        }

        return $group->filter(
            fn ($groupItem) => $capacity == $groupItem->min_capacity
        );
    }

    public function index()
    {
        $groupedRoomsCollection = null;
        $total_days = 0;

        if (request()->has(['capacity', 'rooms', 'range'])) {
            $range = array_map( function ($d) {
                    return \Carbon\Carbon::createFromFormat('d/m/Y', $d);//->toDateString();
                }, explode(' - ', request()->range)
            );
            $total_days = $range[1]->diffInDays($range[0]) + 1;

            $groupedRoomsCollection = $this->searchRooms(
                request()->capacity,
                request()->rooms,
                $range
            );
        }

        // dd($groupedRoomsCollection);

        return view('web.rooms.index', [
            'results' => $groupedRoomsCollection,
            'total_days' => $total_days,
        ]);
    }
}
