<?php

namespace App\Livewire\Frontend;

use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Product;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class HomeComponent extends Component
{
    public $state_id;
    public $city_id;
    
    // public function checklogin(){
    //     if(Auth::check())
    //     {
    //         return redirect()->route('post-ad');

    //     }else{
    //         session()->flash('message','For Post-Ad Login first!');
    //         // $this->dispatch('modal-wrapper-login');
    //         return;
    //     }
    // }
    public function render()
    {
        $testimonials = Testimonial::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        $products = Product::whereDate('created_at', now()->today())->where('status',1)->whereIn('user_verified',['0','2'])->take(10)->get();
        // $products = Product::take(8)->get();
        $exchnageproducts = Product::where('is_exchange',1)->where('status',1)->whereIn('user_verified',['0','2'])->latest()->get()->take(6);
        $sellproducts = Product::where('is_sell',1)->where('status',1)->whereIn('user_verified',['0','2'])->latest()->get()->take(10);
       // $countries = Country::all();
        $states = State::where('country_id','101')->get();
        //$citys = City::where('state_id',$this->state_id)->get();
        // dd($testimonial);
        return view('livewire.frontend.home-component',['testimonials'=>$testimonials,'categories'=>$categories,
        'products'=>$products,'exchnageproducts'=>$exchnageproducts,'sellproducts'=>$sellproducts,
        'states'=>$states])->layout('layouts.base');
    }
}
