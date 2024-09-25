<?php

namespace App\Repositories\Contracts;

use App\Repositories\Adapters\DataObjectAdapter;
use Illuminate\Support\Str;
use Override;

readonly class ContactCollectionDataObject extends DataObjectAdapter
{
    /**
     * Create a new data object instance
     * @param  string|null $id
     * @param  string|null $room
     * @param  string|null $channel
     * @param  string|null $icon
     * @param  int|null    $total
     * @return void
     */
    final public function __construct(
        public ?string $id      = null,
        public ?string $room    = null,
        public ?string $channel = null,
        public ?string $icon    = null,
        public ?int    $total   = null,
    ) {
        // Skip Code Here...
    }

    /**
     * Data object from incoming data
     * @param  object|array $data
     * @return static
     */
    #[Override]
    public static function from(object|array $data): static
    {
        $str = Str::of(string: $data->room)->substr(start: 0, length: -12);
        return new static(
            id:         $data->id,
            room:       $str->kebab()->replace(search: '-', replace: ' ')->title()->toString(),
            channel:    $data->channel,
            icon:       $str->prepend(self::UI_AVATAR)->toString(),
            total:      $data->total
        );
    }
}
