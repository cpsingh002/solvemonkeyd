<?php

namespace App\Livewire\Package;

use Livewire\Component;
use App\Models\Package;


class AddPackagecomponent extends Component
{
    public $up_to;
    public $pname;
    public $ptype;
    public $price;
    public $validity;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'pname'=>'required|unique:packages',
            'ptype'=>'required|unique:packages',
            'price'=>'required',
            'validity'=>'required'
        ]);
    }

    public function storePackage()
    {
        $this->validate([
            'pname'=>'required|unique:packages',
            'ptype'=>'required|unique:packages',
            'price'=>'required',
            'validity'=>'required'
        ]);
        
       

            $package = new Package();
            $package->pname = $this->pname;
            $package->ptype = $this->ptype;
            $package->price = $this->price;
            $package->validity = $this->validity;
            $package->up_to = $this->up_to;
            $package->status = '1';
            $package->save();
    
        session()->flash('message','Package has been created successfully!');
    }

    public function render()
    {
        // return view('livewire.package.add-packagecomponent')->layout('layouts.admin');

        return view('livewire.admin1.package.add-package-admin1')->layout('layouts.admin1');
    }
}
