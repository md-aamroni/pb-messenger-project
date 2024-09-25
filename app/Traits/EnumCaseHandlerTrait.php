<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

trait EnumCaseHandlerTrait
{
    /**
     * Get a collection instance
     * @return Collection
     */
    public static function collection(): Collection
    {
        return collect(self::cases());
    }

    /**
     * Search a value from cases collection
     * @param  string $search
     * @return mixed
     */
    public static function search(string $search): mixed
    {
        return self::collection()->first(callback: fn ($i) => $i->value === strtoupper($search));
    }

    /**
     * Get the values as an array
     * @return array
     */
    public static function values(): array
    {
        return collect(self::cases())->map(fn ($i) => $i->value)->toArray();
    }

    /**
     * Get the labels as an array
     * @return array
     */
    public static function labels(): array
    {
        return collect(self::cases())->map(fn ($i) => $i->name)->toArray();
    }

    /**
     * Get the stringable instance
     * @return Stringable
     */
    public function stringable(): Stringable
    {
        return Str::of(string: $this->name);
    }
}
