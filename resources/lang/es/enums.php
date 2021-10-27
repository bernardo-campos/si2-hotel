<?php

use App\Enums\PaymentMethod;
use App\Enums\ReservationStatus;

return [

    ReservationStatus::class => [
        ReservationStatus::Created      => 'Creada',
        ReservationStatus::Cancelled    => 'Cancelada',
        ReservationStatus::Advanced     => 'Señada',
        ReservationStatus::Ended        => 'Finalizada',
    ],

    PaymentMethod::class => [
        PaymentMethod::CreditCard   => 'Tarjeta de crédito',
        PaymentMethod::Cash         => 'Efectivo',
    ],

];