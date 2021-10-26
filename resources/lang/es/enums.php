<?php

use App\Enums\ReservationStatus;

return [

    ReservationStatus::class => [
        ReservationStatus::Created      => 'Creada',
        ReservationStatus::Cancelled    => 'Cancelada',
        ReservationStatus::Advanced     => 'Señada',
        ReservationStatus::Ended        => 'Finalizada',
    ],

];