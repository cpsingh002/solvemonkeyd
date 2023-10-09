<?php

namespace App\Livewire\City;

use Livewire\Component;

class EditCityComponent extends Component
{
    public function render()
    {
        return view('livewire.city.edit-city-component')->layout('layouts.admin');
    }
}
