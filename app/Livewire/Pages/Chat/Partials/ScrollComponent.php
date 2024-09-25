<?php

namespace App\Livewire\Pages\Chat\Partials;

use App\Livewire\Pages\Chat\Traits\SocketRoomTrait;
use App\Livewire\Traits\EventStringTrait;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class ScrollComponent extends Component
{
    use SocketRoomTrait;

    /**
     * Initialize the component instance
     * @return void
     */
    public function mount(): void
    {
        // Your Code Here...
    }

    /**
     * Display the component markup context
     * @param MessageRepositoryInterface $repository
     * @return Application|Factory|View
     */
    #[On(self::INITIALIZE_CHAT_ROOM)]
    #[On(self::SEND_MESSAGE_CONTENT)]
    #[On(self::RELOAD_MESSAGE_STACK)]
    public function render(MessageRepositoryInterface $repository): View|Factory|Application
    {
        $collection = $repository->collection(roomID: $this->roomID);
        return view('livewire.pages.chat.partials.scroll-component', compact('collection'));
    }
}
