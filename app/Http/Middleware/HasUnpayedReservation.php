<?php

namespace App\Http\Middleware;

use App\Enums\ReservationStatus;
use Closure;
use Illuminate\Http\Request;

class HasUnpayedReservation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $unpayedReservation = $request->user()->reservations()->where('status', ReservationStatus::Created)->first();

        if (auth()->check() && $unpayedReservation) {
            return redirect()->route('client.reservations.goToPayment', $unpayedReservation)->with('error', 'Tiene una reserva pendiente');
        }

        return $next($request);
    }
}
