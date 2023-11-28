<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ProductListComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.product-list-component')->layout('layouts.base');
    }
}
