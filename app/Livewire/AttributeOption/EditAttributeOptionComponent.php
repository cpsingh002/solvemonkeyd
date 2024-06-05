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
    public function update($fields){
        $this->validateOnly($fields,[
            'option_details'=>'required',
            'category_id'=>'required',
            'scategory_id' =>'required',
            'attribute_id'=>'required'
        ]);
    }
    public function updateAttributeOption()
    {
        $this->validate([
            'option_details'=>'required',
            'category_id'=>'required',
            'scategory_id' =>'required',
            'attribute_id'=>'required'
        ],[
            'attribute_id.required'=>'The attribute field is required.',
            'category_id.required'=>'The category field is required.',
            'scategory_id.required'=>'The sub-category field is required.'
            ]);
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
        $categories=Category::where('status','!=',3)->get();
        $scategories = Subcategory::where('category_id',$this->category_id)->where('status','!=',3)->get();
        
        $attributes = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->where('status','!=',3)->get();
      
        return view('livewire.attribute-option.edit-attribute-option-component',['categories'=>$categories,'scategories'=>$scategories,'attributes'=>$attributes])->layout('layouts.admin1');
    }
}
