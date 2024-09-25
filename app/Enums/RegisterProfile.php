<?php

namespace App\Enums;

use App\Traits\EnumCaseHandlerTrait;

enum RegisterProfile: string
{
    use EnumCaseHandlerTrait;

    case CLIENT     = 'C';
    case ADMIN      = 'A';
    case MERCHANT   = 'M';
    case GUEST      = 'G';
}
