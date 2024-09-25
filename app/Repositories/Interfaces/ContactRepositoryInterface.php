<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface ContactRepositoryInterface
{
    /**
     * Define the collection cache name
     * @var string
     */
    public const string COLLECTION = 'ContactCollection';

    /**
     * Get all the contact collection
     * @return Collection
     */
    public function collection(): Collection;
}
