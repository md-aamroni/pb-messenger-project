<?php

namespace App\Services\Interfaces;

use App\Services\Contracts\Conversation\UpsertContract;

interface ConversationServiceInterface
{
    /**
     * Create a new channel if not exist
     * @param  UpsertContract $contract
     * @return mixed
     */
    public function upsert(UpsertContract $contract): mixed;
}
