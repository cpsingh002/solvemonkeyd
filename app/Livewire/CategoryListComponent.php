<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryListComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-list-component',['categories'=>$categories]);
    }
}
