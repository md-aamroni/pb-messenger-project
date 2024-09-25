<?php

namespace App\Services\Contracts\Connect;

use App\Enums\DatabaseStatus;
use App\Models\User;
use App\Services\Adapters\ContractAdapter;
use Override;

readonly class DeleteContract extends ContractAdapter
{
    /**
     * Create a new contract instance
     * @param  string|null $id
     * @return void
     */
    final public function __construct(
        private ?string $id = null
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
            'socket'    => null,
            'is_online' => DatabaseStatus::INACTIVE
        ];
    }
}
