<?php

namespace App\Livewire\Product;

use Livewire\Component;

class ProductComponent extends Component
{
    public function render()
    {

        // return view('livewire.product.product-component');


        
        return view('livewire.admin1.product.product-component')->layout('layouts.admin1');

     //   return view('livewire.admin1.product.product-component')->layout('layouts.admin1');

    }
}
