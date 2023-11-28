<?php

namespace App\Livewire\User;

use Livewire\Component;

class UserAccountComponent extends Component
{
    public function render()
    {
        return view('livewire.user.user-account-component')->layout('layouts.base');
    }
}
