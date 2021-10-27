<?php

namespace App\Http\Controllers\Attendant;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        return view('attendant.payments.index', [
            'payments' => Payment::all()
        ]);
    }

    public function create()
    {
        return view('attendant.payments.create');
    }
}
