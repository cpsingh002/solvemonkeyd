<?php

namespace App\Livewire\Attribute;

use Livewire\Component;

class EditProductComponent extends Component
{
    public function render()
    {
        
        return view('livewire.attribute.edit-product-component')->layout('layouts.admin1');
    }
}
