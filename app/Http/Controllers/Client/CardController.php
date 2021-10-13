<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return view('client.cards.index', [
            'cards' => auth()->user()->cards,
        ]);
    }
}
