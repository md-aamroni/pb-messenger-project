<?php

namespace App\Services\Resolvers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

readonly class MessageRoomParticipant
{
    public static function resolve(string $roomID, string $userID): Collection
    {
        return DB::table(table: 'participants', as: 'participant')
            ->where(column: 'participant.room_id', operator: '=', value: $roomID)
            ->select(['user_id'])
            ->get()
            ->reject(callback: fn($i) => $i->user_id === $userID)
            ->map(callback: fn($i) => $i->user_id)
            ->toBase();
    }
}
