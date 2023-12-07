<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;

class UserWishlistComponent extends Component
{
    // public function movetoCart($rowId)
    // {
    //     $item = Cart::instance('wishlist')->get($rowId);
    //     Cart::instance('wishlist')->remove($rowId);
    //     Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
    //     $this->emitTo('wishlist-count-component','refreshComponent');
    //     $this->emitTo('cart-count-component','refreshComponent');
    // }
    // public function store($product_id,$product_name,$product_price)
    // {

    //     Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
    //     session()->flash('success_message','Item added in Cart');
    //     return redirect()->route('product.cart');
    // }
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
        if(Auth::check())
        {
            Cart::instance('wishlist')->restore(auth::user()->email);
        }
        return view('livewire.user.user-wishlist-component')->layout('layouts.base');
    }
}
