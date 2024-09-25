<?php

namespace App\Services\Contracts\Conversation;

use App\Enums\AuthRoleStatus;
use App\Enums\ConversationGenre;
use App\Enums\RegisterProfile;
use App\Models\Conversation;
use App\Models\User;
use App\Services\Adapters\ContractAdapter;
use App\Utilities\CreativeRoomTitle;
use Illuminate\Database\Eloquent\Collection;
use Override;

readonly class UpsertContract extends ContractAdapter
{
    /**
     * Create a new contract instance
     * @param  string|null $id
     * @return void
     */
    final public function __construct(
        private ?string $id = null,
    ) {
        // Skip Code Here...
    }

    /**
     * Get the response from incoming request
     * @return array|false
     */
    #[Override]
    public function process(): array|false
    {
        $instance = User::query()->withCount(relations: 'conversations')->findOrFail(id: $this->id);
        $isExists = $this->exists(instance: $instance);
        if (!blank($isExists) && count($isExists) > 0) {
            $init = Conversation::query()->create(attributes: $this->mapper());
            return $init->users()->sync(ids: array_merge($isExists, [$this->id]));
        }
        return false;
    }

    /**
     * Get the model attributes
     * @return array
     */
    private function mapper(): array
    {
        return [
            'room'      => CreativeRoomTitle::generate(),
            'channel'   => ConversationGenre::GROUPS
        ];
    }

    /**
     * Check whether any conversation exists or not
     * @param  object           $instance
     * @return array|Collection
     */
    private function exists(object $instance): Collection|array
    {
        if ($instance->conversations_count === 0 && $instance->role === AuthRoleStatus::UNKNOWN && $instance->profile === RegisterProfile::GUEST) {
            return User::query()->where(column: 'role', operator: '=', value: AuthRoleStatus::ADMIN)
                ->get(columns: ['id'])
                ->map(fn (User $i) => $i->getAuthIdentifier())
                ->toArray();
        }
        return [];
    }
}
