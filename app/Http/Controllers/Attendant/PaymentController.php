<?php

namespace App\Http\Controllers\Attendant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('attendant.payments.index');
    }

    public function create()
    {
        return view('attendant.payments.create');
    }
}
