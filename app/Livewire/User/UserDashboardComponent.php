<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Product;
use App\Models\PackagePurchase;
use Illuminate\Support\Facades\Auth;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $productCount = Product::where('user_id',Auth::user()->id)->where('status','!=',3)->get();
        $topvisitlistings = Product::LeftJoin('product_visits','product_visits.product_id','products.id')
            ->where('products.user_id',Auth::user()->id)->where('status',1)->orderBy('product_visits.visit_count', 'DESC')->get()->take(5);
            
        $activepackage = PackagePurchase::where('user_id',Auth::user()->id)->orderByDesc('created_at')->first();
        
        //   dd($activepackage);
        return view('livewire.user.user-dashboard-component',['productCount'=>$productCount,'topvisitlistings'=>$topvisitlistings,'activepackage'=>$activepackage])->layout('layouts.base');
    }
}
