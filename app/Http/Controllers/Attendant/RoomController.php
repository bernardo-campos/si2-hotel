<?php

namespace App\Http\Controllers\Attendant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('attendant.rooms.index');
    }
}
