<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        // TODO: implement admin view

        return view('attendant.payments.index', [
            'payments' => Payment::all()
        ]);
    }
}
