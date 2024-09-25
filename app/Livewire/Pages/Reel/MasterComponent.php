<?php

namespace App\Livewire\Pages\Reel;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Reel')]
class MasterComponent extends Component
{
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
        return view('livewire.pages.reel.master-component');
    }
}
