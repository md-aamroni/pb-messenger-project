<?php

namespace App\Repositories\Contracts;

use App\Repositories\Adapters\DataObjectAdapter;
use Illuminate\Support\Str;
use Override;

readonly class MessageCollectionDataObject extends DataObjectAdapter
{
    /**
     * Create a new data object instance
     * @param string|null $id
     * @param string|null $userID
     * @param string|null $content
     * @param string|null $bracket
     * @param string|null $separator
     * @param string|null $component
     * @param string|null $datetime
     * @return void
     */
    final public function __construct(
        public ?string $id          = null,
        public ?string $userID      = null,
        public ?string $bracket     = null,
        public ?string $content     = null,
        public ?string $separator   = null,
        public ?string $component   = null,
        public ?string $datetime    = null,
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
        return new static(
            id:         $data->id,
            userID:     $data->user_id,
            bracket:    $data->bracket,
            content:    $data->content,
            separator:  $data->separator,
            component:  $data->component,
            datetime:   $data->datetime,
        );
    }
}
