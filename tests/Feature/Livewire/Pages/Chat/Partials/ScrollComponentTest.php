<?php

use App\Livewire\Pages\Chat\Partials\ScrollComponent;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ScrollComponent::class)
        ->assertStatus(200);
});
