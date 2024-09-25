<?php

namespace App\Repositories\Adapters;

abstract readonly class RepositoryAdapter extends PersistentAdapter
{
    /**
     * Define the auth user ID
     * @var string|mixed|null
     */
    public ?string $authID;

    /**
     * Create a new repository instance
     * @return void
     */
    final public function __construct()
    {
        $this->authID = auth()->user()->getAuthIdentifier();
    }

    /**
     * Get a new static repository instance
     * @return static
     */
    public static function instance(): static
    {
        return new static();
    }
}
