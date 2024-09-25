<?php

namespace App\Livewire\Pages\Home;

use App\Services\Contracts\Conversation\UpsertContract;
use App\Services\Interfaces\ConversationServiceInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
class MasterComponent extends Component
{
    /**
     * Initialize the component instance
     * @param  ConversationServiceInterface $service
     * @return void
     */
    public function mount(ConversationServiceInterface $service): void
    {
        $payload = new UpsertContract(auth()->user()->getAuthIdentifier());
        $service->upsert(contract: $payload);
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
        return view('livewire.pages.home.master-component');
    }
}
