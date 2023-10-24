<?php

namespace App\Livewire\Attribute;

use Livewire\Component;

class AddAttributeComponent extends Component
{
    public function render()
    {
        return view('livewire.attribute.add-attribute-component')->layout('layouts.admin1');
    }
}
