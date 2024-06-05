<?php

namespace App\Livewire\Frontend;
use App\Models\Package;
use App\Models\PackagePurchase;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PackagePurchaseComponent extends Component
{
    public $pname;
    public $ptype;
    public $price;
    public $description;
    public $validity;
    public $count;
    public $pid;
    public $p_id;
        
    public function mount($p_id){
        $this->pid= $p_id;
        $package =Package::where('id',$this->pid)->first();
        // dd($package);
            $this->pname= $package->pname;
            $this->ptype = $package->ptype;
            $this->price = $package->price;
            $this->validity = $package->validity;
            $this->count=$package->count;
            $this->description = $package->description;
            $this->p_id = $package->id;

    }
    public function checkacticepackage()
    {
        $activepacke = PackagePurchase::where('user_id', Auth::user()->id)->where('status',1)->first();
        if($activepacke)
        {
             return redirect()->route('package')->with('message','Already A Plan is active !');
        }
    }
    public function render()
    {
        $this->checkacticepackage();
        return view('livewire.frontend.package-purchase-component')->layout('layouts.base');
    }
}
