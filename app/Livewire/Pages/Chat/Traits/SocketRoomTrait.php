<?php

namespace App\Livewire\Pages\Chat\Traits;

use App\Livewire\Traits\EventStringTrait;
use Livewire\Attributes\On;

trait SocketRoomTrait
{
    use EventStringTrait;

    /**
     * Define the room ID
     * @var string|null
     */
    public ?string $roomID = null;

    /**
     * Define the user ID
     * @var string|null
     */
    public ?string $userID = null;

    /**
     * Update the current states
     * @param  string|null $roomID
     * @return void
     */
    #[On(self::INITIALIZE_CHAT_ROOM)]
    public function updateStates(?string $roomID = null): void
    {
        $this->roomID = $roomID;
        $this->userID = auth()->id();
    }
}
