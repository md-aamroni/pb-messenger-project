<?php

namespace App\Repositories\Contracts;

use App\Repositories\Adapters\SqlQueriesAdapter;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Override;

readonly class ContactCollectionSqlQueries extends SqlQueriesAdapter
{
    /**
     * Create a static SQL query instance
     * @param  string $authID
     * @return void
     */
    final public function __construct(
        private string $authID
    ) {
        // Skip Code Here...
    }

    /**
     * Get a static SQL query instance
     * @param  string                      $authID
     * @return ContactCollectionSqlQueries
     */
    public static function instance(string $authID): ContactCollectionSqlQueries
    {
        return new self(authID: $authID);
    }

    /**
     * Define the cache broker name
     * @return string
     */
    #[Override]
    protected function brokers(): string
    {
        return ContactRepositoryInterface::COLLECTION;
    }

    /**
     * Define the SQL query statement
     * @return Collection
     */
    #[Override]
    protected function queries(): Collection
    {
        return DB::table(table: 'conversations', as: 'conversation')
            ->leftJoin(table: 'participants as participant', first: 'conversation.id', operator: '=', second: 'participant.room_id')
            ->leftJoinSub(query: self::countSubQuery(), as: 'channel', first: 'channel.room_id', operator: '=', second: 'conversation.id')
            ->where(column: 'participant.user_id', operator: '=', value: $this->authID)
            ->select(columns: $this->columns())
            ->orderByDesc(column: 'conversation.created_at')
            ->get();
    }

    /**
     * Define the SQL select columns
     * @return array
     */
    #[Override]
    protected function columns(): array
    {
        return [
            'conversation.id',
            'conversation.room',
            'conversation.channel',
            'channel.total',
        ];
    }

    private static function countSubQuery(): Builder
    {
        return DB::table(table: 'participants')
            ->selectRaw(expression: 'room_id, COUNT(DISTINCT user_id) AS total')
            ->groupBy(groups: 'room_id');
    }
}
