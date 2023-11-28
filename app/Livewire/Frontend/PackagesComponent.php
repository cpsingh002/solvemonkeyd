<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class PackagesComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.packages-component')->layout('layouts.base');
    }
}
