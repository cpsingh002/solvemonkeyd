<?php

namespace App\Livewire\Brand;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\SubCategory;
use App\Models\Brand;


class BrandComponent extends Component
{
    use withPagination;
    public function deleteBrand($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','Brand has been deleted successfully!');
    }
    public function deleteSubCategory($id)
    {
        $category = SubCategory::find($id);
        $category->delete();
        session()->flash('message','Sub-Category has been deleted successfully!');
    }
    public function render()
    {
        $brands=Brand::paginate(5);
        
        return view('livewire.brand.brand-component',['brands'=>$brands])->layout('layouts.admin1');
    }
}
