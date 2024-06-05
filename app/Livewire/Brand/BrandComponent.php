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
        $brand = Brand::find($id);
       $brand->status=3;
        $brand->save();
        session()->flash('message','Brand has been deleted successfully!');
        $this->js('window.location.reload()');

    }
    public function changeActive($id){
        $brand = Brand::find($id);
        $brand->status=2;
        $brand->save();
        session()->flash('message','Brand has been deactivited successfully!');
        $this->js('window.location.reload()');
    }
    public function changeDeactive($id){
        $brand = Brand::find($id);
        $brand->status=1;
        $brand->save();
        session()->flash('message','Brand has been activited successfully!');
        $this->js('window.location.reload()');
    }
    // public function deleteSubCategory($id)
    // {
    //     $category = SubCategory::find($id);
    //     $category->delete();
    //     session()->flash('message','Sub-Category has been deleted successfully!');
    // }
    public function render()
    {
        $brands=Brand::where('status','!=',3)->get();
        
        return view('livewire.brand.brand-component',['brands'=>$brands])->layout('layouts.admin1');
    }
}
