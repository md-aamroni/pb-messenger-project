<?php

namespace App\View\Composers;

use App\View\Composers\Adapters\ComposerAdapter;
use Illuminate\View\View;
use Override;

readonly class AuthUserComposer extends ComposerAdapter
{
    /**
     * Define that it should be cached or not
     * @return bool
     */
    #[Override]
    public function beCached(): bool
    {
        return false;
    }

    /**
     * Define the name of the composer
     * @return string
     */
    #[Override]
    public function viewName(): string
    {
        return 'authUser';
    }

    /**
     * Define the view data array or collection or so on
     * @return array|object
     */
    #[Override]
    public function viewData(): array|object
    {
        $instance = auth()->user();
        return (object) [
            'id'        => $instance->id,
            'name'      => $instance->name,
            'email'     => $instance->email,
            'avatar'    => sprintf('https://ui-avatars.com/api/?background=random&color=fff&bold=true&format=svg&name=%s', $instance->name)
        ];
    }
}
