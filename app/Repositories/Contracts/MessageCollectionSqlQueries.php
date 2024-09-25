<?php

namespace App\Repositories\Contracts;

use App\Repositories\Adapters\SqlQueriesAdapter;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

readonly class MessageCollectionSqlQueries extends SqlQueriesAdapter
{
    /**
     * Create a static SQL query instance
     * @param string|null $roomID
     * @return void
     */
    final public function __construct(
        private ?string $roomID = null
    ) {
        // Skip Code Here...
    }

    /**
     * Get a static SQL query instance
     * @param string|null $roomID
     * @return MessageCollectionSqlQueries
     */
    public static function instance(?string $roomID = null): MessageCollectionSqlQueries
    {
        return new self(roomID: $roomID);
    }

    /**
     * Define the cache broker name
     * @return string
     */
    #[\Override] protected function brokers(): string
    {
        return MessageRepositoryInterface::COLLECTION;
    }

    /**
     * Define the SQL query statement
     * @return Collection
     */
    #[\Override] protected function queries(): Collection
    {
        return DB::table(table: 'messages', as: 'message')
            ->where(column: 'room_id', operator: '=', value: $this->roomID)
            ->select(columns: $this->columns())
            ->get();
    }

    /**
     * Define the SQL select columns
     * @return array
     */
    #[\Override] protected function columns(): array
    {
        return [
            'message.id',
            'message.user_id',
            'message.bracket',
            'message.content',
            'message.updated_at as datetime',
        ];
    }
}
