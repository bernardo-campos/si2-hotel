<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('admin.reservations.index');
    }

    public function create()
    {
        return view('admin.reservations.create');
    }
}
