<?php

namespace App\Services\Interfaces;

use App\Services\Contracts\Message\CreateContract;

interface MessageServiceInterface
{
    /**
     * Handle the incoming creation request
     * @param CreateContract $contract
     * @return mixed
     */
    public function create(CreateContract $contract): mixed;
}
