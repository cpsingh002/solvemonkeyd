<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;


class ProductComponent extends Component
{
    use withPagination;
    public function deleteCategory($id)
    {
        return;
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','Category has been deleted successfully!');
    }
   
    public function render()
    {

        // return view('livewire.product.product-component');

        $products=Product::paginate(5);
        
        return view('livewire.admin1.product.product-component',['products'=>$products])->layout('layouts.admin1');

     //   return view('livewire.admin1.product.product-component')->layout('layouts.admin1');

    }
}
