<?php

use App\Enums\ReservationStatus;

return [

    ReservationStatus::class => [
        ReservationStatus::Created => 'Creada',
        ReservationStatus::Advanced => 'Señada',
        ReservationStatus::Ended => 'Finalizada',
    ],

];