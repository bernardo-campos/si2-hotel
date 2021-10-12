<?php

namespace App\Http\Controllers\Client;

use App\Enums\ReservationStatus;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReservationRoom;
use App\Models\ReservationRoomPeople;
use App\Models\Room;
use App\Models\RoomCollection;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        return view('client.reservations.index', [
            'reservations' => auth()->user()->reservations
        ]);
    }

    public function create(Request $request)
    {
        // $rooms = Room::find( explode(',', $request->rooms) );
        // $capacity = $request->capacity;
        // $from = Carbon::create($request->from);
        // $to = Carbon::create($request->to);

        // return view('client.reservations.create', [
        //     'capacity' => $capacity,
        //     'rooms' => $rooms,
        //     'from' => $from,
        //     'to' => $to,
        // ]);
    }

    public function store(Request $request)
    {

        $roomCollection = new RoomCollection( explode(',', $request->rooms) );

        $reservation = Reservation::create([
            'checkin' => $request->from,
            'checkout' => $request->to,
            'user_id' => auth()->user()->id,
            'price' => $roomCollection->total_price,
            'people_qty' => $request->capacity,
            // string('status')
        ]);

        foreach( explode(',', $request->rooms) as $room_id) {

            $reservationRoom = ReservationRoom::create([
                'reservation_id' => $reservation->id,
                'room_id' => $room_id,
                // unsignedTinyInteger('cribs')->default(0);
            ]);

        }

        return redirect()->route('client.reservations.goToPayment', $reservation);
    }

    public function goToPayment(Reservation $reservation)
    {
        // TODO: Authorize ($reservation->user_id == auth()->id && $reservation->status == created)

        return view('client.reservations.goToPayment', [
            'reservation' => $reservation
        ]);
    }

    public function makePayment(Request $request, Reservation $reservation)
    {

        $reservation->status = ReservationStatus::Advanced();
        $reservation->save();

        return redirect()->route('client.reservations.index')->with('success', 'Reserva realizada exitosamente');
    }

    public function registerPeople(Request $request)
    {
        /*
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
        */

        // return redirect()->route('client.reservations.index')->with('success', 'Reserva registrada');
    }
}
