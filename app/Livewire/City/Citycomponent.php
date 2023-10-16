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

        $cities=City::leftJoin('states','states.id','cities.state_id')->leftjoin('countries','countries.id','states.country_id')->select('cities.*')->where('countries.id',101)->orderBy('id','ASC')->get();


        // $cities=City::orderBy('id','ASC')->paginate(50);
        // return view('livewire.city.citycomponent',['cities'=>$cities])->layout('layouts.admin1');


        return view('livewire.admin1.city.city-admin1',['cities'=>$cities])->layout('layouts.admin1');
    }
}
