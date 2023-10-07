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

    public function render()
    {
        $cities=City::orderBy('id','ASC')->paginate(10);;
        return view('livewire.city.citycomponent',['cities'=>$cities])->layout('layouts.admin');
    }
}
