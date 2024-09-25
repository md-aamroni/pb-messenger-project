<?php

namespace App\Enums;

use App\Traits\EnumCaseHandlerTrait;

enum ContentBracket: string
{
    use EnumCaseHandlerTrait;

    case ATTACHMENT = 'F';
    case TEXT       = 'T';
    case DOCUMENT   = 'D';
    case VIDEO      = 'V';
    case AUDIO      = 'A';
    case IMAGE      = 'I';
    case REPLY      = 'R';
    case LOCATION   = 'L';
    case CONTACT    = 'C';
    case LINK       = 'U';
    case SNIPPET    = 'S';
}
