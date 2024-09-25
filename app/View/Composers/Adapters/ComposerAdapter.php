<?php

namespace App\View\Composers\Adapters;

use App\View\Composers\Interfaces\ComposerInterface;
use Illuminate\View\View;
use Override;

abstract readonly class ComposerAdapter implements ComposerInterface
{
    /**
     * Define that it should be cached or not
     * @return bool
     */
    abstract public function beCached(): bool;

    /**
     * Define the name of the composer
     * @return string
     */
    abstract public function viewName(): string;

    /**
     * Define the view data array or collection or so on
     * @return mixed
     */
    abstract public function viewData(): mixed;

    /**
     * Bind data to the view
     * @param  View $view
     * @return void
     */
    #[Override]
    public function compose(View $view): void
    {
        $view->with(key: $this->viewName(), value: $this->viewData());
    }
}
