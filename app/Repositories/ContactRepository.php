<?php

namespace App\Repositories;

use App\Repositories\Adapters\RepositoryAdapter;
use App\Repositories\Contracts\ContactCollectionDataObject;
use App\Repositories\Contracts\ContactCollectionSqlQueries;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use Illuminate\Support\Collection;
use Override;

readonly class ContactRepository extends RepositoryAdapter implements ContactRepositoryInterface
{
    /**
     * Get all the contact collection
     * @return Collection
     */
    #[Override]
    public function collection(): Collection
    {
        return ContactCollectionSqlQueries::instance(authID: $this->authID)
            ->collect(false)
            ->map(callback: fn (object $i) => ContactCollectionDataObject::from(data: $i))
            ->groupBy(groupBy: fn (ContactCollectionDataObject $i) => $i->channel)
            ->toBase();
    }
}
