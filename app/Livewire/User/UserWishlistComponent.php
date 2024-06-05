<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;

class UserWishlistComponent extends Component
{
    
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
