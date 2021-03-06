<?php

namespace App\Http\Controllers\Administrator;

use App\Enums\ReservationStatus;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InformController extends Controller
{
    public function employees()
    {
        return view('admin.reports.employees');
    }

    public function reservations()
    {
        return view('admin.reports.reservations');
    }

    public function payments()
    {
        $incomingsByMonth = Payment::whereYear('created_at', '=', date('Y'))
            ->get()
            ->groupBy( function($payment) {
                return Carbon::parse($payment->created_at)->isoFormat('MMMM');
            })->map( function($payments, $index) {
                $total = $payments->reduce( fn ($carry, $payment) => $carry + $payment->ammount, 0.0);
                return $total;
            })->toArray();

        return view('admin.reports.payments', [
            'months' => array_keys($incomingsByMonth),
            'incomings' => array_values($incomingsByMonth),
        ]);
    }

    public function occupation()
    {
        $reservations = Reservation::with([
                'user',
                'reservation_rooms.room',
                'reservation_rooms.reservation_room_people',
                'people',
                'payments',
            ])->whereStatus( ReservationStatus::Checkin() )->get();

        return view('admin.reports.occupation', [
            'reservations' => $reservations
        ]);
    }

    public function services()
    {
        return view('admin.reports.services');
    }

}
