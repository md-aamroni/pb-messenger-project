<?php

namespace App\Services\Adapters;

abstract readonly class ServiceAdapter extends PersistentAdapter
{
    /**
     * Define the transaction attempt
     * @var int
     */
    protected const int DB_TRANSACTION_ATTEMPTS = 5;

    /**
     * Create a new service instance
     * @return void
     */
    final public function __construct()
    {
        // Skip Code Here...
    }

    /**
     * Get a new static service instance
     * @return static
     */
    public static function instance(): static
    {
        return new static();
    }
}
