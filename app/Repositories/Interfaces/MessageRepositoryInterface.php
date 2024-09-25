<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface MessageRepositoryInterface
{
    /**
     * Define the collection cache name
     * @var string
     */
    public const string COLLECTION = 'MessageCollection';

    /**
     * Get all the contact collection
     * @param string|null $roomID
     * @return Collection
     */
    public function collection(?string $roomID = null): Collection;
}
