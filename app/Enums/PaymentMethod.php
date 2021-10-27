<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CreditCard()
 * @method static static Cash()
 */
final class PaymentMethod extends Enum
{
    const CreditCard = 0;
    const Cash = 1;
}
