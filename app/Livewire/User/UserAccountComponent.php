<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserAccountComponent extends Component
{
    public function render()
    {
        $products= Product::where('user_id',Auth::user()->id)->get();
        return view('livewire.user.user-account-component',['products'=>$products])->layout('layouts.base');
    }
}
