<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Create a new component instance
     * @param  string|null $title
     * @return void
     */
    final public function __construct(
        public ?string $title = 'Dashboard'
    ) {
        // Skip Code Here...
    }

    /**
     * Get the view or contents that represents the component
     * @return View
     */
    public function render(): View
    {
        return view('layouts.app')->with('title', $this->title);
    }
}
