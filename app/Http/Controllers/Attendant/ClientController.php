<?php

namespace App\Http\Controllers\Attendant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('attendant.clients.index');
    }

    public function create()
    {
        return view('attendant.clients.create');
    }
}
