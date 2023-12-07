<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Package;

class PackagesComponent extends Component
{
    public function render()
    {
        $packages = Package::all();
        return view('livewire.frontend.package-component',['packages'=>$packages])->layout('layouts.base');
    }
}
