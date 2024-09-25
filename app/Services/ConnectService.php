<?php

namespace App\Services;

use App\Services\Adapters\ServiceAdapter;
use App\Services\Contracts\Connect\CreateContract;
use App\Services\Contracts\Connect\DeleteContract;
use App\Services\Interfaces\ConnectServiceInterface;
use Illuminate\Support\Facades\DB;
use Override;

readonly class ConnectService extends ServiceAdapter implements ConnectServiceInterface
{
    /**
     * Handle the incoming delete or connection request
     * @param  CreateContract $contract
     * @return mixed
     */
    #[Override]
    public function create(CreateContract $contract): bool
    {
        return DB::transaction(callback: fn () => $contract->process(), attempts: self::DB_TRANSACTION_ATTEMPTS);
    }

    /**
     * Handle the incoming delete or disconnect request
     * @param  DeleteContract $contract
     * @return mixed
     */
    #[Override]
    public function delete(DeleteContract $contract): bool
    {
        return DB::transaction(callback: fn () => $contract->process(), attempts: self::DB_TRANSACTION_ATTEMPTS);
    }
}
