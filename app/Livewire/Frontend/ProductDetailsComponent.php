<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductAttribute;
use Cart;

class ProductDetailsComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function addToWishlist($product_id,$product_name,$product_price)
    {
        cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->dispatch('wishlist-count-component','refreshComponent');
    }
    
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->dispatch('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }
    public function render()
    {
        $product= Product::where('slug',$this->slug)->first();
        $pattributes = ProductAttribute::where('product_id',$product->id)->get();
        //dd($pattributes);
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(8)->get();
        return view('livewire.frontend.product-details-component',['product'=>$product,
        'related_products'=>$related_products,'pattributes'=>$pattributes])->layout('layouts.base');
    }
}
