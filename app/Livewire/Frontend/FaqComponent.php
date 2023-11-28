<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class FaqComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.faq-component')->layout('layouts.base');
    }
}
