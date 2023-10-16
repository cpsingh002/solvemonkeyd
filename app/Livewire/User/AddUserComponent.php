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

class AddUserComponent extends Component
{
    use WithFileUPloads;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'phone'=>'required|unique:users',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function storeUser()
    {
        $this->validate([
            'phone'=>'required|unique:users',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        event(new Registered($user = $this->create()));
       
    
        session()->flash('message','User has been created successfully!');
    }

    protected function create()
    {
        return User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone
        ]);
    }

    public function render()
    {
        // return view('livewire.user.add-user-component')->layout('layouts.admin');

        return view('livewire.admin1.user.add-user-admin1')->layout('layouts.admin1');
    }
}
