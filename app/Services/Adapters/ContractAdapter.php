<?php

namespace App\Services\Adapters;

abstract readonly class ContractAdapter extends PersistentAdapter
{
    /**
     * Get the response from incoming request
     * @return mixed
     */
    abstract public function process(): mixed;
}
