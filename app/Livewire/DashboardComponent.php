<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardComponent extends Component
{
    


    public function render()
    {
        // return view('livewire.dashboard-component')->layout('layouts.admin');

        return view('livewire.dashboard-admin1')->layout('layouts.admin1');
    }
}
