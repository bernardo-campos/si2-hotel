<?php

namespace App\Http\Controllers\Attendant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('attendant.reservations.index');
    }

    public function create()
    {
        return view('attendant.reservations.create');
    }
}
