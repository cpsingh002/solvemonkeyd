<?php

namespace App\Livewire\Banner;

use Livewire\Component;
use App\Models\Banner;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class BannerComponent extends Component
{
    public function deleteSlider($id)
    {
        $slider = Banner::find($id);
        $slider->delete();
        session()->flash('message','Banner has been deleted successfully!');
    }
    public function render()
    {
        $sliders = Banner::all();
        return view('livewire.banner-component',['sliders'=>$sliders])->layout('layouts.admin');
    }
}
