<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserAccountComponent extends Component
{
    public function exchangeable($exchange_for,$price,$range)
    {
        if($range==null){
            $range=1;
        }
        return redirect()->route('user.exchangeitem',['e_for'=>$exchange_for,'p'=>$price,'r'=>$range]);
    }
    public function render()
    {
        $products= Product::where('user_id',Auth::user()->id)->where('status',1)->get();
        // dd($products);
        return view('livewire.user.user-account-component',['products'=>$products])->layout('layouts.base');
    }
}
