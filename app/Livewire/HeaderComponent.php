<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Chatuser;
use App\Models\ProductChat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HeaderComponent extends Component
{
    public $messagecount;
    protected $listeners = ['header-component'=>'$refresh'];
    public function render()
    {
        if(Auth::check())
        {
           $this->messagecount =  ProductChat::where('friend_id',Auth::id())->where('read_status','0')->count();
        }else{
            $this->messagecount = 0;
        }
        return view('livewire.header-component');
    }
}
