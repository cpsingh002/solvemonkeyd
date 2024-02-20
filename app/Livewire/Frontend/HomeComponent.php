<?php

namespace App\Livewire\Frontend;

use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Product;
use App\Models\Country;
use App\Models\State;
use App\Models\City;


use Livewire\Component;

class HomeComponent extends Component
{
    public $state_id;
    public $city_id;
public function mount()
{
    
}
    public function changeState()
    {
       // dd($this->state_id);

    }
    public function render()
    {
        $testimonials = Testimonial::all();
        $categories = Category::all();
        $products = Product::whereDate('created_at', now()->today())->take(10)->get();
        $exchnageproducts = Product::where('is_exchange',1)->inRandomOrder()->get()->take(10);
        $sellproducts = Product::where('is_sell',1)->inRandomOrder()->get()->take(10);
        $countries = Country::all();
        $states = State::where('country_id','101')->get();
        $citys = City::where('state_id',$this->state_id)->get();
        // dd($testimonial);
        return view('livewire.frontend.home-component',['testimonials'=>$testimonials,'categories'=>$categories,
        'products'=>$products,'exchnageproducts'=>$exchnageproducts,'sellproducts'=>$sellproducts,
        'countries'=>$countries,'states'=>$states,'citys'=>$citys])->layout('layouts.base');
    }
}
