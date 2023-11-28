<?php

namespace App\Livewire\Frontend;

use App\Models\Testimonial;

use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $testimonial = Testimonial::all();
        // dd($testimonial);
        return view('livewire.frontend.home-component',['testimonial'=>$testimonial])->layout('layouts.base');
    }
}
