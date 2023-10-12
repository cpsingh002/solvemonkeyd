<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\SubCategory;

class CategoryComponent extends Component
{
    use withPagination;
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','Category has been deleted successfully!');
    }
    public function deleteSubCategory($id)
    {
        $category = SubCategory::find($id);
        $category->delete();
        session()->flash('message','Sub-Category has been deleted successfully!');
    }

    public function render()
    {
        $categories=Category::paginate(5);
        // return view('livewire.category.category-component',['categories'=>$categories])->layout('layouts.admin');

        return view('livewire.admin1.category.list-category-admin1',['categories'=>$categories])->layout('layouts.admin1');
    }
}
