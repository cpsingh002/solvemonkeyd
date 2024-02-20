<?php

namespace App\Livewire\AttributeTest;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\AttributeTest;

class AddAttributeTestComponent extends Component
{
    public $aname;
    public $category_id =[];
    public $sub_category_id;
    public $status;
    
    public function mount()
    {
        $this->status = 0;
    }
    public function addAttribute()
    {
        $slider = new AttributeTest();
        $slider->attribute = $this->aname;
        $slider->category_idarray = json_encode($this->category_id);
        $slider->subcategory_idarray = json_encode($this->sub_category_id);
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
        $scategories = SubCategory::whereIn('category_id',$this->category_id)->get();
//dd($scategories);
        return view('livewire.attribute-test.add-attribute-test-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.admin1');
    }
}
