<?php

namespace App\Enums;

use App\Traits\EnumCaseHandlerTrait;

enum AuthRoleStatus: string
{
    use EnumCaseHandlerTrait;

    case UNKNOWN    = 'U';
    case ADMIN      = 'A';
    case MODERATOR  = 'E';
    case MEMBER     = 'M';
    case PARTNER    = 'P';
}
