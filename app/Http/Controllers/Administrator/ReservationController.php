<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('admin.reservations.index', [
            'reservations' => Reservation::with(['user','rooms','people'])->get()
        ]);
    }

    public function create()
    {
        return view('admin.reservations.create');
    }
}
