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
    public function addAttribute()
    {
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
        $categories=Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();

        return view('livewire.attribute.add-attribute-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.admin1');
    }
}
