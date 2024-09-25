<?php

namespace App\Livewire\Pages\Chat\Traits;

use App\Enums\ContentBracket;
use App\Livewire\Traits\EventStringTrait;
use App\Services\Contracts\Message\CreateContract;
use App\Services\Interfaces\MessageServiceInterface;

trait TextStreamTrait
{
    use EventStringTrait;

    public ?string $content = null;

    public function store(MessageServiceInterface $service): void
    {
        $payload = new CreateContract(roomID: $this->roomID, userID: $this->userID, bracket: ContentBracket::TEXT, content: $this->content);
        $isStore = $service->create(contract: $payload);
        $this->dispatch(event: self::SEND_MESSAGE_CONTENT, reload: ['status' => $isStore]);
        $this->content = null;
    }
}
