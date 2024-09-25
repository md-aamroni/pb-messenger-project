<?php

use App\Livewire\Pages\Chat\Partials\FooterComponent;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(FooterComponent::class)
        ->assertStatus(200);
});
