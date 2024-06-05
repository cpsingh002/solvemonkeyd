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
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'aname'=>'required',
            'category_id'=>'required',
            'sub_category_id' =>'required'
        ]);
    }

    public function updateAttribute()
    {
        $this->validate([
            'aname'=>'required',
            'category_id'=>'required',
            'sub_category_id' =>'required'
        ],[
            'aname.required'=>'The attribute name field is required.',
            'category_id.required'=>'The category field is required.',
            'sub_category_id.required'=>'The sub-category field is required.'
            ]);
        
        $attribute = Attribute::find($this->aid);
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
        $categories=Category::where('status','!=',3)->get();
        $scategories = Subcategory::where('category_id',$this->category_id)->where('status','!=',3)->get();
        
        return view('livewire.attribute.edit-attribute-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.admin1');
    }
}
