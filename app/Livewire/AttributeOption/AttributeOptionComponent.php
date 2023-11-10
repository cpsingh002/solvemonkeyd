<?php

namespace App\Livewire\AttributeOption;

use Livewire\Component;
use App\Models\AttributeOption;
class AttributeOptionComponent extends Component
{
    public function deleteOption($id)
    {
        $slider = AttributeOption::find($id);
        $slider->delete();
        session()->flash('message',"Attribute's Option has been deleted successfully!");
    }

    public function render()
    {
        $attributeoptions=AttributeOption::all();
        return view('livewire.attribute-option.attribute-option-component',['attributeoptions'=>$attributeoptions])->layout('layouts.admin1');
    }
}
