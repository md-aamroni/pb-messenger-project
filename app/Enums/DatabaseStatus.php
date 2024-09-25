<?php

namespace App\Enums;

use App\Traits\EnumCaseHandlerTrait;

enum DatabaseStatus: int
{
    use EnumCaseHandlerTrait;

    case ACTIVE     = 1;
    case INACTIVE   = 0;
}
