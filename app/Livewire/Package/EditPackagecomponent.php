<?php

namespace App\Livewire\Package;

use Livewire\Component;
use App\Models\Package;

class EditPackagecomponent extends Component
{
    public $up_to;
    public $pname;
    public $ptype;
    public $price;
    public $description;
    public $validity;
    public $pid;
    public $p_id;

    public function mount($pid)
    {
        //dd($scategory_slug);
        
        
            $this->p_id= $pid;
            $package =Package::where('id',$this->p_id)->first();
            $this->up_to = $package->up_to;
            $this->pname= $package->pname;
            $this->ptype = $package->ptype;
            $this->price = $package->price;
            $this->validity = $package->validity;
            $this->description = $package->description;
            $this->p_id = $package->id;
    
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'pname'=>'required',
            'ptype'=>'required',
            'price'=>'required',
            'validity'=>'required',
            'description'=>'required'
        ]);
    }

    public function updatePacakge()
    {
        $this->validate([
            'pname'=>'required',
            'ptype'=>'required',
            'price'=>'required',
            'validity'=>'required',
            'description'=>'required'
        ]);
        
            
     
            $package = Package::find($this->p_id);
            $package->pname = $this->pname;
            $package->ptype = $this->ptype;
            $package->price = $this->price;
            $package->validity = $this->validity;
            $package->up_to = $this->up_to;
            $package->description = $this->description;         
            $package->save();
        
        session()->flash('message','Package has been upadted successfully !');
    }
    
    public function render()
    {
         return view('livewire.package.edit-packagecomponent')->layout('layouts.admin1');


        //return view('livewire.admin1.package.edit-package-admin1')->layout('layouts.admin1');
    }
}
