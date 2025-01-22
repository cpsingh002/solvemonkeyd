<?php

namespace App\Livewire\Subscribers;

use Livewire\Component;
use App\Models\Subscriber;

class SubscriberComponent extends Component
{
    public function render()
    {
        $subscribers = Subscriber::all();
        return view('livewire.subscribers.subscriber-component',['subscribers'=>$subscribers])->layout('layouts.admin1');
    }
}
