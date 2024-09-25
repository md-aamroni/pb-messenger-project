<?php

namespace App\Enums;

use App\Traits\EnumCaseHandlerTrait;

enum ConversationGenre: string
{
    use EnumCaseHandlerTrait;

    case SINGLE = 'S';
    case GROUPS = 'G';
}
