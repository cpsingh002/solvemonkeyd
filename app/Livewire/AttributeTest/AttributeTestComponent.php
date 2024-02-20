<?php

namespace App\Livewire\AttributeTest;

use Livewire\Component;
use App\Models\AttributeTest;
use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\SubCategory;

class AttributeTestComponent extends Component
{
    public function deleteAttribute($id)
    {
        $slider = AttributeTest::find($id);
        $slider->delete();
        session()->flash('message',"Attribute has been deleted successfully!");
    }
    public function render()
    {
        // $attributes = Attribute::all();
        $attributes=AttributeTest::all();
        return view('livewire.attribute-test.attribute-test-component',['attributes'=>$attributes])->layout('layouts.admin1');
    }
    public function categoryname($cid)
    {
        return Category::where('id',$cid)->first();
    }
    public function subcategoryname($sid)
    {
        return SubCategory::where('id',$sid)->first();
    }
}
