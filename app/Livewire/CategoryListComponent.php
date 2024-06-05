<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryListComponent extends Component
{
    public function render()
    {
        $categories = Category::where('status',1)->get();
        return view('livewire.category-list-component',['categories'=>$categories]);
    }
}
