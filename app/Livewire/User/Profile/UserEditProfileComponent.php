<?php

namespace App\Livewire\User\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $phone;
    public $profile;
    public $address;
    public $line2;
    public $city_id;
    Public $state_id;
    public $st_id;
    public $country_id;
    public $zipcode;
    public $newimage;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->profile = $user->profile;
        $this->address = $user->address;
        $this->city_id = $user->city;
        $this->state_id = $user->state;
        $this->country_id = $user->country;
        $this->zipcode = $user->zipcode;
        $this->st_id=$this->state_id;


    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
           // 'email' => 'required',
            'phone'=>'required',
            'address' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id'=>'required',
            'zipcode' => 'required'
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }

    }

    public function updateProfile(){
        $this->validate([
            'name'=>'required',
           // 'email' => 'required',
            'phone'=>'required',
            'address' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id'=>'required',
            'zipcode' => 'required'
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }

        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone= $this->phone;
        $user->state = $this->state_id;
        $user->country =$this->country_id;
        $user->city = $this->city_id;
        $user->zipcode = $this->zipcode;
        $user->address = $this->address;
        
        if($this->newimage)
        {
            if($this->profile)
            {
                unlink('assets/admin/userprofile/'.$this->profile);
            }
            $imgName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('userprofile',$imgName);
            $user->profile = $imgName;
        }
        $user->save();
        session()->flash('message','Profile Has been updated Successfully!!');

    }
    public function changecountry()
    {
        //dd($this->country_id);
        $this->state_id = 0;
        $this->city_id = 0;
        return;
    }
    public function changestate()
    {
        $this->st_id = $this->state_id;
        $this->city_id = 0;
        return;
        
    }

    public function render()
    {
        $user = User::find(Auth::user()->id);
        $countries = Country::all();
        $states = State::where('country_id',$this->country_id)->get();
        $cities = City::where('state_id',$this->st_id)->get();
    
        return view('livewire.user.profile.user-edit-profile-component',['user'=>$user,'countries'=>$countries,'states'=>$states,'cities'=>$cities])->layout('layouts.base');
    }
}
