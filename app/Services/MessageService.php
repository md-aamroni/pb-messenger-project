<?php

namespace App\Services;

use App\Services\Adapters\ServiceAdapter;
use App\Services\Contracts\Message\CreateContract;
use App\Services\Interfaces\MessageServiceInterface;
use Illuminate\Support\Facades\DB;

readonly class MessageService extends ServiceAdapter implements MessageServiceInterface
{
    /**
     * Handle the incoming creation request
     * @param CreateContract $contract
     * @return mixed
     */
    #[\Override] public function create(CreateContract $contract): mixed
    {
        return DB::transaction(callback: fn () => $contract->process(), attempts: self::DB_TRANSACTION_ATTEMPTS);
    }
}
