<?php

namespace App\Livewire\Banner;

use Livewire\Component;
use App\Models\Banner;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AddBannerComponent extends Component
{
    use WithFileUPloads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }
    public function addSlider()
    {
        $slider = new Banner();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imageName= Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();
        Session()->flash('message','Banner has been Created Successfully!');
    }

    public function render()
    {
        return view('livewire.banner.add-banner-component')->layout('layouts.admin1');
    }
}
