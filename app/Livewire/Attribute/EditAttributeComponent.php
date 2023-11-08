<?php

namespace App\Livewire\Attribute;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Attribute;


class EditAttributeComponent extends Component
{
    public $aname;
    public $category_id;
    public $sub_category_id;
    public $status;
    public $aid;

    public function mount($aid)
    {
        $slider = Attribute::find($aid);
        $this->aname = $slider->attribute;
        $this->category_id=$slider->category_id;
        $this->sub_category_id =$slider->subcategory_id;
         $this->status=$slider->status;
        $this->aid = $slider->id;

    }

    public function updateAttribute()
    {
        $attribute = Attribute::find($this->bid);
        $attribute->attribute = $this->aname;
        $attribute->category_id = $this->category_id;
        $attribute->subcategory_id =  $this->sub_category_id;
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
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        
        return view('livewire.attribute.edit-attribute-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.admin1');
    }
}
