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
        $slider->delete();
        session()->flash('message',"Attribute has been deleted successfully!");
    }
    public function render()
    {
        // $attributes = Attribute::all();
        $attributes=Attribute::all();

        return view('livewire.attribute.attribute-component',['attributes'=>$attributes])->layout('layouts.admin1');
    }
}
