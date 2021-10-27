<?php

namespace App\Policies;

use App\Enums\ReservationStatus;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function cancel(User $user, Reservation $reservation)
    {
        return $user->id == $reservation->user_id
            && $reservation->status == ReservationStatus::Advanced()
            && $reservation->checkin->diffInDays() >= 6;
    }

    public function checkin(User $user, Reservation $reservation)
    {
        return $user->hasRole('Encargado')
            && $reservation->status == ReservationStatus::Advanced();
    }

    public function checkout(User $user, Reservation $reservation)
    {
        return $user->hasRole('Encargado')
            && $reservation->status == ReservationStatus::Checkin();
    }
}
