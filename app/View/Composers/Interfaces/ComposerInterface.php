<?php

namespace App\View\Composers\Interfaces;

use Illuminate\View\View;

interface ComposerInterface
{
    /**
     * Bind data to the view
     * @param  View $view
     * @return void
     */
    public function compose(View $view): void;
}
