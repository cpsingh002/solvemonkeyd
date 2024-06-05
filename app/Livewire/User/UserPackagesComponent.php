<?php

namespace App\Livewire\User;
use App\Models\PackagePurchase;
use App\Models\UserProductVisit;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class UserPackagesComponent extends Component
{
    public function render()
    {
        $packages= PackagePurchase::where('user_id',Auth::user()->id)->get();
        $visited= UserProductVisit::where('user_id',Auth::user()->id)->where('status',1)->count();
        // $date=PackagePurchase::where('user_id',Auth::user()->id)->first('created_at');
        // $latestDate=PackagePurchase::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first('created_at');;
        // dd($latestDate);
        // $p_details=$packages->validitycount;
        // dd($packages);
        return view('livewire.user.user-packages-component',['packages'=>$packages,'visited'=>$visited])->layout('layouts.base');
    }
}
