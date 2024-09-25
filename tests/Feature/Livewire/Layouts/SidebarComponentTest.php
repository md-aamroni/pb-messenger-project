<?php

use App\Livewire\Layouts\SidebarComponent;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(SidebarComponent::class)
        ->assertStatus(200);
});
