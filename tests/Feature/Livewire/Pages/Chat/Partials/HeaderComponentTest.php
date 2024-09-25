<?php

use App\Livewire\Pages\Chat\Partials\HeaderComponent;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(HeaderComponent::class)
        ->assertStatus(200);
});
