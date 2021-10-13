<?php

namespace App\Http\Controllers\Attendant;

use App\Enums\ReservationStatus;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReservationRoom;
use App\Models\ReservationRoomPeople;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('attendant.reservations.index', [
            'reservations' => Reservation::with(['user','rooms','people'])->get()
        ]);
    }

    public function create()
    {
        return view('attendant.reservations.create');
    }

    public function checkin(Reservation $reservation)
    {
        return view('attendant.reservations.checkin', [
            'reservation' => $reservation
        ]);
    }

    public function checkinPost(Request $request, Reservation $reservation)
    {
        // dd( $request->all(), $reservation->toArray() );

        foreach($request->room as $room_id => $roomPeople) {

            $reservationRoom = ReservationRoom::create([
                'reservation_id' => $reservation->id,
                'room_id' => $room_id,
                // unsignedTinyInteger('cribs')->default(0);
            ]);

            foreach($roomPeople as $person) {
                if ( isset($person['dni']) || isset($person['name']) || isset($person['surname']) ) {
                    ReservationRoomPeople::create([
                        'reservation_room_id' => $reservationRoom->id,
                        'dni' => $person['dni'],
                        'name' => $person['name'],
                        'surname' => $person['surname'],
                    ]);
                }
            }
        }

        $reservation->status = ReservationStatus::Checkin();

        $reservation->save();

        return redirect()->route('attendant.reservations.index')->with('success', 'Checkin realizado exitosamente');

    }

    public function checkout(Reservation $reservation)
    {

        $reservation->status = ReservationStatus::Checkout();

        $reservation->save();

        return redirect()->route('attendant.reservations.index')->with('success', 'Se hizo checkout');
    }
}
