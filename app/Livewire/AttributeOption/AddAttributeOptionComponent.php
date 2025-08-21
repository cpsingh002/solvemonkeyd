<?php

namespace App\Livewire\AttributeOption;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Brand;
use App\Models\ModelNumber;

class AddAttributeOptionComponent extends Component
{
    public $category_id;
    public $scategory_id;
    public $attribute_id;
    public $option_details;
    public $status;
    public $s_id;
    public $model_id;
    public $brand_id,$b_id;
    
    public function mount()
    {
        $this->status = 0;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            
            'category_id'=>'required',
            'scategory_id' =>'required',
            'attribute_id'=>'required',
            'option_details'=>'required',
        ]);
    }
    public function addAttributeOption()
    {
        $this->validate([
           
            'category_id'=>'required',
            'scategory_id' =>'required',
            'attribute_id'=>'required',
            'option_details'=>'required',
        ],[
            'attribute_id.required'=>'The attribute field is required.',
            'category_id.required'=>'The category field is required.',
            'scategory_id.required'=>'The sub-category field is required.'
            ]);
        
        $slider = new AttributeOption();
        $slider->category_id = $this->category_id;
        $slider->subcategory_id = $this->scategory_id;
        $slider->attribute_id = $this->attribute_id;
        $slider->option_details = $this->option_details;
        $slider->status = $this->status;
        $slider->model_id = $this->model_id;
        $slider->brand_id = $this->brand_id;
        $slider->save();
        Session()->flash('message',"Attribute's Option has been Created Successfully!");
    }
    public function changeSubcategory()
    {
        $this->scategory_id = 0;
        
    }
    public function changeattribute()
    {
        $this->attribute_id = 0;
        $this->s_id = $this->scategory_id;
    }
    public function changebrands()
    {
        $this->b_id = $this->brand_id;
    }

    public function render()
    {
        $categories=Category::where('status','!=',3)->get();
        $scategories = Subcategory::where('category_id',$this->category_id)->where('status','!=',3)->get();
        
        $attributes = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->where('status','!=',3)->get();
      
        $brands = Brand ::where('category_id',$this->category_id)->where('subcategory_id',$this->s_id)->where('status','!=',3)->get();
        $modelnumbers = ModelNumber::where('brand_id',$this->b_id)->where('category_id',$this->category_id)->where('subcategory_id',$this->s_id)->where('status','!=',3)->get();
        
        return view('livewire.attribute-option.add-attribute-option-component',['modelnumbers'=>$modelnumbers,'brands'=>$brands,'categories'=>$categories,'scategories'=>$scategories,'attributes'=>$attributes])->layout('layouts.admin1');
    }
}
