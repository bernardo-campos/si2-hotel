<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return view('client.cards.index', [
            'cards' => auth()->user()->cards,
        ]);
    }

    public function destroy(Request $request, Card $card)
    {
        // TODO: authorize card delete

        $card->delete();

        return redirect()->route('client.cards.index')->with('success', 'La tarjeta se eliminó');
    }
}
