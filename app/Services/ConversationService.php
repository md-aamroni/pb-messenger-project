<?php

namespace App\Services;

use App\Services\Adapters\ServiceAdapter;
use App\Services\Contracts\Conversation\UpsertContract;
use App\Services\Interfaces\ConversationServiceInterface;
use Illuminate\Support\Facades\DB;
use Override;

readonly class ConversationService extends ServiceAdapter implements ConversationServiceInterface
{
    /**
     * Create a new channel if not exist
     * @param  UpsertContract $contract
     * @return mixed
     */
    #[Override]
    public function upsert(UpsertContract $contract): mixed
    {
        return DB::transaction(callback: fn () => $contract->process(), attempts: self::DB_TRANSACTION_ATTEMPTS);
    }
}
