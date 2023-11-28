<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ContactComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.contact-component')->layout('layouts.base');
    }
}
