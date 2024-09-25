<?php

namespace App\Services\Contracts\Connect;

use App\Enums\DatabaseStatus;
use App\Models\User;
use App\Services\Adapters\ContractAdapter;
use Override;

readonly class CreateContract extends ContractAdapter
{
    /**
     * Create a new contract instance
     * @param  string|null $id
     * @param  string|null $socket
     * @return void
     */
    final public function __construct(
        private ?string $id     = null,
        private ?string $socket = null,
    ) {
        // Skip Code Here...
    }

    /**
     * Get the response from incoming request
     * @return bool
     */
    #[Override]
    public function process(): bool
    {
        $instance = User::query()->findOrFail(id: $this->id);
        if (isset($instance) && $instance instanceof User) {
            return $instance->update(attributes: $this->mapper());
        }
        return false;
    }

    /**
     * Define the model attributes
     * @return array
     */
    private function mapper(): array
    {
        return [
            'socket' => $this->socket,
            'is_online' => DatabaseStatus::ACTIVE
        ];
    }
}
