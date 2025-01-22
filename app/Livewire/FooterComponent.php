<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\WebSetting;
use App\Models\Subscriber;

class FooterComponent extends Component
{
    public $email;
    public function render()
    {
        $website=WebSetting::find(1);
        $categories=Category::where('is_home',1)->where('status',1)->get();
        $subcategories=SubCategory::where('is_home',1)->where('status',1)->get();
        return view('livewire.footer-component',['categories'=>$categories,'subcategories'=>$subcategories,'website'=>$website]);
    }
    public function subscribe()
    {
        $this->validate([
            'email'=>'required|email'
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $this->email;
        $subscriber->save();
        // dd($subscriber);

        session()->flash('message','You have subscribed successfully!');
    }
}
