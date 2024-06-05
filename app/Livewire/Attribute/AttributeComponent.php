<?php

namespace App\Livewire\Attribute;

use Livewire\Component;
use App\Models\Attribute;
use App\Models\AttributeOption;

class AttributeComponent extends Component
{
    public function deleteAttribute($id)
    {
        $slider = Attribute::find($id);
        $slider->status=3;
        $slider->save();
        session()->flash('message',"Attribute has been deleted successfully!");
        $this->js('window.location.reload()');
    }
    public function changeActive($id){
        $slider = Attribute::find($id);
        $slider->status=2;
        $slider->save();
        session()->flash('message','Attribute has been deactivited successfully!');
        $this->js('window.location.reload()');
    }
    public function changeDeactive($id){
        $slider = Attribute::find($id);
        $slider->status=1;
        $slider->save();
        session()->flash('message','Brand has been activited successfully!');
        $this->js('window.location.reload()');
    }
    public function render()
    {
        // $attributes = Attribute::all();
        $attributes=Attribute::where('status','!=',3)->get();

        return view('livewire.attribute.attribute-component',['attributes'=>$attributes])->layout('layouts.admin1');
    }
}
