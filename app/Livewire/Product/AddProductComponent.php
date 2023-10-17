<?php

namespace App\Livewire\Product;

use Livewire\Component;

class AddProductComponent extends Component
{
    public function render()
    {
<<<<<<< Updated upstream
        // return view('livewire.product.add-product-component');

        return view('livewire.admin1.product.add-product-admin1');
=======
        return view('livewire.admin1.product.add-product-component')->layout('layouts.admin1');
>>>>>>> Stashed changes
    }
}
