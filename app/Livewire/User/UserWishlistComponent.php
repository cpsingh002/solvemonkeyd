<?php

namespace App\Livewire\User;

use Livewire\Component;

class UserWishlistComponent extends Component
{
    public function render()
    {
        return view('livewire.user.user-wishlist-component')->layout('layouts.base');
    }
}
