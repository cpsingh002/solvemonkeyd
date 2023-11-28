<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ProductDetailsComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.product-details-component')->layout('layouts.base');
    }
}
