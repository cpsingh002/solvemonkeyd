<?php

namespace App\Livewire\AttributeOption;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Attribute;
use App\Models\AttributeOption;

class EditAttributeOptionComponent extends Component
{
    public $category_id;
    public $scategory_id;
    public $attribute_id;
    public $option_details;
    public $status;
    public $s_id;
    public $oid;

    public function mount($oid)
    {
        $slider = AttributeOption::find($oid);
        $this->option_details = $slider->option_details;
        $this->category_id=$slider->category_id;
        $this->scategory_id =$slider->subcategory_id;
        $this->attribute_id=$slider->attribute_id;
         $this->status=$slider->status;
        $this->oid = $slider->id;
        $this->s_id = $this->scategory_id;

    }
    public function updateAttributeOption()
    {
        $attribute = AttributeOption::find($this->oid);
        $attribute->option_details = $this->option_details;
        $attribute->category_id = $this->category_id;
        $attribute->subcategory_id =  $this->scategory_id;
        $attribute->attribute_id=$this->attribute_id;
        $attribute->status= $this->status;
        $attribute->save();
        Session()->flash('message',"Attribute's option has been Updated Successfully!");
    }
    public function changeSubcategory()
    {
        $this->scategory_id = 0;
        $this->option_details='';
        
    }
    public function changeattribute()
    {
        $this->attribute_id = 0;
        $this->s_id = $this->scategory_id;
        $this->option_details='';
    }

    public function render()
    {
        $categories=Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        
        $attributes = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->get();
      
        return view('livewire.attribute-option.edit-attribute-option-component',['categories'=>$categories,'scategories'=>$scategories,'attributes'=>$attributes])->layout('layouts.admin1');
    }
}
