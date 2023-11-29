<?php

namespace App\Livewire\Frontend;

use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Product;
use App\Models\Country;


use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $testimonial = Testimonial::all();
        $categories = Category::all();
        $products = Product::whereDate('created_at', now()->today())->take(10)->get();
        $exchnageproducts = Product::where('is_exchange',1)->inRandomOrder()->get()->take(10);
        $sellproducts = Product::where('is_sell',1)->inRandomOrder()->get()->take(10);
        $countries = Country::all();
        // dd($testimonial);
        return view('livewire.frontend.home-component',['testimonial'=>$testimonial,'categories'=>$categories,
        'products'=>$products,'exchnageproducts'=>$exchnageproducts,'sellproducts'=>$sellproducts,
        'countries'=>$countries])->layout('layouts.base');
    }
}
