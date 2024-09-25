<?php

namespace App\Livewire\Layouts;

use App\Livewire\Shared\ContactWireable;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class SidebarComponent extends Component
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
     * @param  ContactRepositoryInterface $repository
     * @return Application|Factory|View
     */
    public function render(ContactRepositoryInterface $repository): View|Factory|Application
    {
        $dataSource = $repository->collection();
        $collection = ContactWireable::fromLivewire(value: $dataSource)->toLivewire();
        return view('livewire.layouts.sidebar-component', compact('collection'));
    }
}
