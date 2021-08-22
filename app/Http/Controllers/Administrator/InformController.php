<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformController extends Controller
{
    public function employees()
    {
        return view('admin.reports.employees');
    }

    public function reservations()
    {
        return view('admin.reports.reservations');
    }

    public function payments()
    {
        return view('admin.reports.payments');
    }

    public function occupation()
    {
        return view('admin.reports.occupation');
    }

    public function services()
    {
        return view('admin.reports.services');
    }

}
