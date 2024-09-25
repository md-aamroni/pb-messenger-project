<?php

namespace App\Livewire\Pages\Chat\Partials;

use App\Livewire\Pages\Chat\Traits\SocketRoomTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class HeaderComponent extends Component
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
        return view('livewire.pages.chat.partials.header-component');
    }
}
