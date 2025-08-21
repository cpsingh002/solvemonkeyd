<?php

namespace App\Livewire\AttributeOption;

use Livewire\Component;
use App\Models\AttributeOption;
class AttributeOptionComponent extends Component
{
    public function deleteOption($id)
    {
        $slider = AttributeOption::find($id);
        $slider->status=3;
        $slider->save();
        session()->flash('message',"Attribute's Option has been deleted successfully!");
        $this->js('window.location.reload()');

    }
    public function changeActive($id){
        $slider = AttributeOption::find($id);
        $slider->status=2;
        $slider->save();
        session()->flash('message',"Attribute's Option has been deactivited successfully!");
        $this->js('window.location.reload()');
    }
    public function changeDeactive($id){
        $slider = AttributeOption::find($id);
        $slider->status=1;
        $slider->save();
        session()->flash('message',"Attribute's Option has been activited successfully!");
        $this->js('window.location.reload()');
    }

    public function render()
    {
        $attributeoptions=AttributeOption::where('status','!=',3)->take(1000)->get();
        return view('livewire.attribute-option.attribute-option-component',['attributeoptions'=>$attributeoptions])->layout('layouts.admin1');
    }
}
