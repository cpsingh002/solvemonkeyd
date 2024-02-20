<?php

namespace App\Livewire\AttributeTest;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\AttributeTest;

class EditAttributeTestComponent extends Component
{
    public $aname;
    public $category_id =[];
    public $sub_category_id;
    public $status;
    public $aid;

    public function mount($aid)
    {
        $slider = AttributeTest::find($aid);
        $this->aname = $slider->attribute;
        $this->category_id=json_decode($slider->category_idarray);
        $this->sub_category_id =json_decode($slider->subcategory_idarray);
         $this->status=$slider->status;
        $this->aid = $slider->id;
//dd($this->sub_category_id);
    }

    public function updateAttribute()
    {
        $attribute = Attribute::find($this->bid);
        $attribute->attribute = $this->aname;
        $attribute->category_idarray = $this->category_id;
        $attribute->subcategory_idarray =  $this->sub_category_id;
        $attribute->status= $this->status;
        $attribute->save();
        Session()->flash('message','Attribute has been Updated Successfully!');
    }


    public function changeSubcategory()
    {
        $this->scategory_id = 0;
        $this->aname = '';
    }
    public function changeAttribute()
    {
         $this->aname = '';
    }


    public function render()
    {
        $categories=Category::all();
        $scategories = Subcategory::whereIn('category_id',$this->category_id)->get();
        return view('livewire.attribute-test.edit-attribute-test-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.admin1');
    }
}
