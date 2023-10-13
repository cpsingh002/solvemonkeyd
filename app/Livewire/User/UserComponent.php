<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
Use App\Models\User;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use withPagination;
    Public $newpassword;
    public function DeactiveUser($id)
    {
        $category = User::find($id);
        $category->is_active = 0;
        $category->save();
        session()->flash('message','User has been Deactive successfully!');
    }
    public function ActiveUser($id)
    {
        $category = User::find($id);
        $category->is_active = 1;
        $category->save();
        session()->flash('message','user has been active successfully!');
    }
    
    public function Changepassword($id)
    {
        $package = user::find($id);
        $package->password = Hash::make($this->newpassword);
        $package->save();
    }

    public function render()
    {
        $users=User::orderBy('id','ASC')->paginate(10);
        // return view('livewire.user.user-component',['users'=>$users])->layout('layouts.admin');

        return view('livewire.admin1.user.user-admin1',['users'=>$users])->layout('layouts.admin1');
    }
}
