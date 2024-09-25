<?php

namespace App\Services\Interfaces;

use App\Services\Contracts\Connect\CreateContract;
use App\Services\Contracts\Connect\DeleteContract;

interface ConnectServiceInterface
{
    /**
     * Handle the incoming delete or connection request
     * @param  CreateContract $contract
     * @return mixed
     */
    public function create(CreateContract $contract): bool;

    /**
     * Handle the incoming delete or disconnect request
     * @param  DeleteContract $contract
     * @return mixed
     */
    public function delete(DeleteContract $contract): bool;
}
