<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        return view('client.reservations.index');
    }

    public function create(Request $request)
    {
        $rooms = Room::find( explode(',', $request->rooms) );
        $from = Carbon::create($request->from);
        $to = Carbon::create($request->to);

        return view('client.reservations.create', [
            'rooms' => $rooms,
            'from' => $from,
            'to' => $to,
        ]);
    }

    // TODO: implement
    public function store(Request $request)
    {
        dd( $request->all() );
    }
}
