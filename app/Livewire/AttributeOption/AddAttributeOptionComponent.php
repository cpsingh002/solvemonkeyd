<?php

namespace App\Livewire\AttributeOption;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Attribute;
use App\Models\AttributeOption;


class AddAttributeOptionComponent extends Component
{
    public $category_id;
    public $scategory_id;
    public $attribute_id;
    public $option_details;
    public $status;
    public $s_id;
    public function mount()
    {
        $this->status = 0;
    }
    public function addAttributeOption()
    {
        $slider = new AttributeOption();
        $slider->category_id = $this->category_id;
        $slider->subcategory_id = $this->scategory_id;
        $slider->attribute_id = $this->attribute_id;
        $slider->option_details = $this->option_details;
        $slider->status = $this->status;
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

    public function render()
    {
        $categories=Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        
        $attributes = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->get();
      
        return view('livewire.attribute-option.add-attribute-option-component',['categories'=>$categories,'scategories'=>$scategories,'attributes'=>$attributes])->layout('layouts.admin1');
    }
}
