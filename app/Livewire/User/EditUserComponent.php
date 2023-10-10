<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EditUserComponent extends Component
{
    use WithFileUPloads;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $uid;
    public $id;

    public function mount($uid)
    {
        //dd($scategory_slug);
        
        
            $this->p_id= $uid;
            $package =User::where('id',$this->p_id)->first();
            $this->name = $package->name;
            $this->email= $package->email;
            $this->phone = $package->phone;
            $this->id = $package->id;
            
    
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'phone'=>'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            
        ]);
    }
    public function UpdateUser()
    {
        $this->validate([
            'phone'=>'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        
        
       
        $package = User::find($this->id);
        $package->name = $this->name;
        $package->email = $this->email;
        $package->phone = $this->phone;        
        $package->save();
    
        session()->flash('message','User has been Updated successfully!');
    }


    public function render()
    {
        return view('livewire.user.edit-user-component')->layout('layouts.admin');
    }
}
