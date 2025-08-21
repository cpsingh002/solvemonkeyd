<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use App\Models\Chatuser;
use App\Models\ProductChat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MessageComponent extends Component
{
    public $uuid;
    public $pid;
    public $user;
    public $chatid;
    public $message;


    public function send_message()
    {
        $this->validate(['message' => "required"]);


        ProductChat::create([
            'user_id' => auth()->id(),
            'message' => $this->message,
            'chat_id' => Chatuser::where(['user_id'=>auth()->id(), 'friend_id' =>$this->user->id])->first()->chat_id,
            'friend_id' => $this->user->id
        ]);
        $this->dispatch('header-component','refreshComponent');
        $this->message='';
        $this->render();
    }

    public function mount($chatid='')
    {
        //  dd($uuid,$pid);
        if($chatid != ''){
        $chatuser = Chatuser::where('chat_id',$this->chatid)->where('user_id',Auth::id())->first();
        $this->uuid = $chatuser->friend_id;
        
        $this->pid = $chatuser->product_id;
        $product= Product::where('id',$this->pid)->first();
        $this->user = User::where('id',$this->uuid)->first();


            // if (Chatuser::where(['user_id' => Auth::id(), 'friend_id' => $this->user->id,'product_id' => $this->pid])->count() === 0 || Chatuser::where(['user_id' => $this->user->id, 'friend_id' => Auth::id(),'product_id' => $this->pid])->count() === 0) {
            //     $uuid = Str::uuid();
            //     Chatuser::create([
            //         'user_id' => Auth::id(),
            //         'chat_id' => $uuid,
            //         'friend_id' => $this->user->id,
            //         'product_id' => $this->pid
            //     ]);

            //     Chatuser::create([
            //         'user_id' => $this->user->id,
            //         'chat_id' => $uuid,
            //         'friend_id' => Auth::id(),
            //         'product_id' => $this->pid
            //     ]);
            // }
        }
    }
    public function render()
    {
        $contacts = Chatuser::where("friend_id",auth()->id())->latest()->get();
        // dd($contacts);
        if($this->uuid != ''){
            $messages = ProductChat::where('chat_id',Chatuser::where(['user_id'=>Auth::id(), 'friend_id' =>$this->user->id,'product_id' => $this->pid])->first()->chat_id)->get();
        }else{
            $messages = [];
        }
        $product = Product::where('id',$this->pid)->first();
        // dd($messages);
        return view('livewire.user.message-component',['contacts'=>$contacts,'messages'=>$messages,'product'=>$product])->layout('layouts.base');
    }
    public function readmsg()
    {
        ProductChat::where('chat_id',Chatuser::where(['user_id'=>Auth::id(), 'friend_id' =>$this->user->id,'product_id' => $this->pid])->first()->chat_id)->update(['read_status'=>1]);
        $this->dispatch('header-component','refreshComponent');
    }
}
