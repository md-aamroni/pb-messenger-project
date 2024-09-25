<?php

namespace App\Livewire\Pages\Chat;

use App\Livewire\Pages\Chat\Traits\ConnectionTrait;
use App\Livewire\Pages\Chat\Traits\SocketRoomTrait;
use App\Livewire\Traits\EventStringTrait;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Chat')]
class MasterComponent extends Component
{
    use ConnectionTrait;

    /**
     * Initialize the component instance
     * @return void
     */
    public function mount(): void
    {
        // Your Code Here...
    }

    /**
     * Pre-loader the skeleton element
     * @return Application|Factory|View
     */
    public function placeholder(): View|Factory|Application
    {
        return view('skeleton');
    }

    /**
     * Display the component markup context
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('livewire.pages.chat.master-component');
    }
}
