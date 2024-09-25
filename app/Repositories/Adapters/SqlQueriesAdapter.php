<?php

namespace App\Repositories\Adapters;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use stdClass;

abstract readonly class SqlQueriesAdapter extends PersistentAdapter
{
    /**
     * Get the resource collection instance
     * @param  bool|null                 $shouldCache
     * @return Collection|array|stdClass
     */
    public function collect(?bool $shouldCache = true): Collection|array|stdClass
    {
        if ($shouldCache === false) {
            return $this->queries();
        }
        return Cache::remember(key: static::brokers(), ttl: now()->addMonth(), callback: fn () => $this->queries());
    }

    /**
     * Define the cache broker name
     * @return string
     */
    abstract protected function brokers(): string;

    /**
     * Define the SQL query statement
     * @return mixed
     */
    abstract protected function queries(): mixed;

    /**
     * Define the SQL select columns
     * @return array
     */
    abstract protected function columns(): array;
}
