<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Created()
 * @method static static Advanced()
 * @method static static Ended()
 */
final class ReservationStatus extends Enum implements LocalizedEnum
{
    const Created = 0;
    const Advanced = 1;
    const Checkin = 2;
    const Checkout = 3;
    const Ended = 4;
}
