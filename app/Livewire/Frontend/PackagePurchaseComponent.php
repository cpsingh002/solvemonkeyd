<?php

namespace App\Livewire\Frontend;
use App\Models\Package;
use App\Models\PackagePurchase;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $this->count= $package->count;
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
    public function purchase()
    {
        dd('purchase');
        // $this->validate([
        //     'package_id ' => 'required',
        //     'price' => 'required',
        //     'transcation_id' => 'required',
        //     'amonut' => 'required',
        // ]);
        $package = new PackagePurchase();
        $package->user_id = Auth::user()->id;
        $package->package_id  = $this->pid ;
        $package->transcation_id = 'TXN' . strtoupper(Str::random(10));;
        $package->amonut = $this->price;
        $package->valid_upto = now()->addDays($this->validity);
        $package->count = $this->count;
        $package->status = 1;
        $package->save();
        return redirect()->route('package')->with('message','Plan Purchased Successfully !');
    }
    public function render()
    {
        $this->checkacticepackage();
        return view('livewire.frontend.package-purchase-component')->layout('layouts.base');
    }
}
