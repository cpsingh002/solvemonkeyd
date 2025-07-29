<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;


class ProductComponent extends Component
{
    use withPagination;
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->status=3;
        $product->save();
        session()->flash('message','Product has been deleted successfully!');
        $this->js('window.location.reload()');
        return;
    }
    public function changeActive($id){
        $product = Product::find($id);
        $product->status=2;
        $product->save();
        session()->flash('message','Product has been deleted successfully!');
        $this->js('window.location.reload()');
    }
    public function changeDeactive($id){
        $product = Product::find($id);
        $product->status=1;
        $product->save();
        session()->flash('message','Product has been deleted successfully!');
        $this->js('window.location.reload()');
    }
     public function admindeverifed($id){
        $product = Product::find($id);
        $product->admin_verified=0;
        $product->user_verified = 1;
        $product->save();
        $this->js('window.location.reload()');
    }
    public function adminverified($id){
        $product = Product::find($id);
        $product->admin_verified=1;
        $product->user_verified = 0;
        $product->save();
        $this->js('window.location.reload()');
    }

   
    public function render()
    {

        // return view('livewire.product.product-component');

        $products=Product::where('status','!=',3)->where('user_id',1)->get();
        
        return view('livewire.admin1.product.product-component',['products'=>$products])->layout('layouts.admin1');

     //   return view('livewire.admin1.product.product-component')->layout('layouts.admin1');

    }
}
