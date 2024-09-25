<?php

use App\Livewire\Layouts\MenubarComponent;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(MenubarComponent::class)
        ->assertStatus(200);
});
