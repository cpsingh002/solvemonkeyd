<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\SubCategory;

class SubCategoryComponent extends Component
{
    use withPagination;
    // public function deleteCategory($id)
    // {
    //     $category = Category::find($id);
    //     $category->delete();
    //     session()->flash('message','Category has been deleted successfully!');
    // }
    public function deleteSubCategory($id)
    {
        $category = SubCategory::find($id);
        $category->status=3;
        $category->save();
        session()->flash('message','Sub-Category has been deleted successfully!');
        $this->js('window.location.reload()');
    }
    public function changeActive($id){
        $scategory = SubCategory::find($id);
        $scategory->status=2;
        $scategory->save();
        session()->flash('message','Sub-Category has been deactivited successfully!');
        $this->js('window.location.reload()');
    }
    public function changeDeactive($id){
        $scategory = SubCategory::find($id);
        $scategory->status=1;
        $scategory->save();
        session()->flash('message','Sub-Category has been activited successfully!');
        $this->js('window.location.reload()');
    }
    public function render()
    {
        $categories=SubCategory::where('status','!=',3)->get();
        //dd($categories);
        return view('livewire.category.sub-category-component',['categories'=>$categories])->layout('layouts.admin1');
    }
}
