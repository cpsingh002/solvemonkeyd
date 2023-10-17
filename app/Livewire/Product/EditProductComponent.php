<?php

namespace App\Livewire\Product;

use Livewire\Component;

class EditProductComponent extends Component
{
    public function render()
    {
<<<<<<< Updated upstream
        // return view('livewire.product.edit-product-component');

        return view('livewire.admin1.product.edit-product-admin1');
=======
        
        return view('livewire.admin1.product.edit-product-component')->layout('layouts.admin1');
>>>>>>> Stashed changes
    }
}
