<?php

namespace App\Enums;

use App\Traits\EnumCaseHandlerTrait;

enum BroadcastChannel
{
    use EnumCaseHandlerTrait;

    case ANONYMOUS_REGISTER;

    public function toBroadcastChannel(): string
    {
        return match ($this) {
            self::ANONYMOUS_REGISTER => 'anonymous-channel'
        };
    }

    public function toChannelEventBind(): string
    {
        return match ($this) {
            self::ANONYMOUS_REGISTER => 'anonymous-register',
        };
    }
}
