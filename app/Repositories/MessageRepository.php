<?php

namespace App\Repositories;

use App\Enums\ContentBracket;
use App\Repositories\Adapters\RepositoryAdapter;
use App\Repositories\Contracts\MessageCollectionDataObject;
use App\Repositories\Contracts\MessageCollectionSqlQueries;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use Illuminate\Support\Collection;

readonly class MessageRepository extends RepositoryAdapter implements MessageRepositoryInterface
{
    /**
     * Get all the contact collection
     * @param string|null $roomID
     * @return Collection
     */
    #[\Override] public function collection(?string $roomID = null): Collection
    {
        return MessageCollectionSqlQueries::instance(roomID: $roomID)
            ->collect(false)
            ->map(callback: fn($i) => (object) array_merge((array) $i, [
                'separator' => $i->user_id === $this->authID ? 'R' : 'L',
                'component' => ContentBracket::search(search: $i->bracket)->stringable()->lower()->toString()
            ]))
            ->map(callback: fn($i) => MessageCollectionDataObject::from(data: $i))
            ->toBase();
    }
}
