<?php

namespace App\Livewire\Product;

use Livewire\Component;

class EditProductComponent extends Component
{
    public function render()
    {

        // return view('livewire.product.edit-product-component');

        
        return view('livewire.admin1.product.edit-product-component')->layout('layouts.admin1');

      //  return view('livewire.admin1.product.edit-product-component')->layout('layouts.admin1');

    }
}