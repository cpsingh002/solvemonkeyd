<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\SubCategory;

class SubCategoryComponent extends Component
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
        $categories=SubCategory::paginate(5);
        //dd($categories);
        return view('livewire.category.sub-category-component',['categories'=>$categories])->layout('layouts.admin1');
    }
}
