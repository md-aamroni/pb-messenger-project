<?php

namespace App\Livewire\Shared;

use App\Enums\ConversationGenre;
use App\Livewire\Tasks\OnlineStatusTask;
use App\Livewire\Tasks\PinnedPersonTask;
use App\Livewire\Tasks\RecentPersonTask;
use Illuminate\Support\Collection;
use Livewire\Wireable;
use stdClass;
use Override;

readonly class ContactWireable implements Wireable
{
    /**
     * Create a new wireable instance
     * @param  Collection $collection
     * @return void
     */
    final public function __construct(
        private Collection $collection
    ) {
        // Skip Code Here...
    }

    /**
     * Get a static wireable instance
     * @param                  $value
     * @return ContactWireable
     */
    #[Override]
    public static function fromLivewire($value): ContactWireable
    {
        return new self(collection: $value);
    }

    #[Override]
    public function toLivewire(): stdClass
    {
        $single = $this->collection->get(key: ConversationGenre::SINGLE->value) ?? collect();
        $groups = $this->collection->get(key: ConversationGenre::GROUPS->value) ?? collect();
        return new class ($single, $groups) extends stdClass {
            final public function __construct(
                public ?Collection $single = null,
                public ?Collection $groups = null,
            ) {
                // Skip Code Here...
            }
        };
    }
}



//        online = OnlineStatusTask::process($this->collection);
//        $pinned = PinnedPersonTask::process($this->collection);
//        $recent = RecentPersonTask::process($this->collection);

//        return new class ($online, $pinned, $recent) extends stdClass {
//            final public function __construct(
//                public ?Collection $online = null,
//                public ?Collection $pinned = null,
//                public ?Collection $recent = null,
//            ) {
//                // Skip Code Here...
//            }
//        };
