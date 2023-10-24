<?php

namespace App\Livewire\Attribute;

use Livewire\Component;
use App\Models\Attribute;

class AttributeComponent extends Component
{
    public function render()
    {
        // $attributes = Attribute::all();
        $attributes=Attribute::all();

        return view('livewire.attribute.attribute-component',['attributes'=>$attributes])->layout('layouts.admin1');
    }
}
