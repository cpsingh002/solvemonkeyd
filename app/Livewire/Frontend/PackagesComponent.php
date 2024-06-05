<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Package;
use App\Models\PackagePurchase;
use Illuminate\Support\Facades\Auth;

class PackagesComponent extends Component
{
    public function checklogin($id){
        if(Auth::check())
        {
            
            return redirect()->route('package.purchase',['p_id'=>$id]);

        }else{
            session()->flash('message','For Sell Information Login first!');
            return;
        }
    }
    public function render()
    {
        $packages = Package::where('status',1)->get();
        
        
        return view('livewire.frontend.package-component',['packages'=>$packages])->layout('layouts.base');
    }
}
