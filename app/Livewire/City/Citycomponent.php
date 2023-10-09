<?php

namespace App\Livewire\City;

use Livewire\Component;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Livewire\WithPagination;

class Citycomponent extends Component
{
    use withPagination;
    
    public function deleteCity($id)
    {
        $category = City::find($id);
        $category->status = 1;
        $category->save();
        session()->flash('message','City has been active successfully!');
    }
    public function deactiveCity($id)
    {
        $category = City::find($id);
        $category->status = 0;
        $category->save();
        session()->flash('message','City has been Deactive successfully!');
    }

    public function render()
    {
        $cities=City::orderBy('id','ASC')->paginate(10);
        return view('livewire.city.citycomponent',['cities'=>$cities])->layout('layouts.admin');
    }
}
