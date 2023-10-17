<?php

namespace App\Livewire\Product;

use Livewire\Component;

class ProductComponent extends Component
{
    public function render()
    {
<<<<<<< Updated upstream
        // return view('livewire.product.product-component');

        return view('livewire.admin1.product.product-admin1');
=======
        
        return view('livewire.admin1.product.product-component')->layout('layouts.admin1');
>>>>>>> Stashed changes
    }
}
