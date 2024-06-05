<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\WebSetting;
class FooterComponent extends Component
{
    public function render()
    {
        $website=WebSetting::find(1);
        $categories=Category::where('is_home',1)->where('status',1)->get();
        $subcategories=SubCategory::where('is_home',1)->where('status',1)->get();
        return view('livewire.footer-component',['categories'=>$categories,'subcategories'=>$subcategories,'website'=>$website]);
    }
}
