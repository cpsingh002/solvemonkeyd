<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use App\Models\Package;
use App\Models\Category;
use App\Models\ProductVisit;

class DashboardComponent extends Component
{
    


    public function render()
    {
        $users=User::where('utype','!=','ADM')->count();
        $active_u=User::where('is_active',1)->count();
        $admin_p=Product::where('status','!=',3)->where('user_id',1)->count();
        $user_p=Product::where('status','!=',3)->where('user_id','!=',1)->count();
        $packages=Package::where('status','!=',3)->get();
        $categories=Category::where('status','!=',3)->get();
        $users_data=User::where('is_active',1)->latest()->get()->take(6);
        $products = Product::where('status','!=',3)->latest()->get()->take(10);
        $topProducts=ProductVisit::take(10)->orderBy('visit_count','DESC')->get();
        // dd($topProducts);
        return view('livewire.dashboard-admin1',['users'=>$users,'active_u'=>$active_u,'admin_p'=>$admin_p,
        'user_p'=>$user_p,'packages'=>$packages,'products'=>$products,'topProducts'=>$topProducts,'users_data'=>$users_data,'categories'=>$categories])->layout('layouts.admin1');
    }
}
