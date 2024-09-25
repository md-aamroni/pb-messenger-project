<?php

use App\Livewire\Pages\Chat\MasterComponent;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(MasterComponent::class)
        ->assertStatus(200);
});
