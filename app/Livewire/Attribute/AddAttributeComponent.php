<?php

namespace App\Livewire\Attribute;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Attribute;


class AddAttributeComponent extends Component
{
    
    public $aname;
    public $category_id;
    public $sub_category_id;
    public $status;
    
    public function mount()
    {
        $this->status = 0;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'aname'=>'required',
            'category_id'=>'required',
            'sub_category_id' =>'required'
        ]);
    }
    public function addAttribute()
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

        $slider = new Attribute();
        $slider->attribute = $this->aname;
        $slider->category_id = $this->category_id;
        $slider->subcategory_id = $this->sub_category_id;
        $slider->status = $this->status;
        $slider->save();
        Session()->flash('message','Attribute has been Created Successfully!');
    }
    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }

    public function render()
    {
        $categories=Category::where('status','!=',3)->get();
        $scategories = Subcategory::where('category_id',$this->category_id)->where('status','!=',3)->get();

        return view('livewire.attribute.add-attribute-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.admin1');
    }
}
