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
    const Created   = 0;
    const Advanced  = 1;
    const Cancelled = 2;
    const Checkin   = 3;
    const Checkout  = 4;
    const Ended     = 5;
}
