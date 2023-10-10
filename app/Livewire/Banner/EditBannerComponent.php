<?php

namespace App\Livewire\Banner;

use Livewire\Component;
use App\Models\Banner;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditBannerComponent extends Component
{
    use WithFileUPloads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slider_id)
    {
        $slider = Banner::find($slider_id);
        $this->title = $slider->title;
        $this->subtitle=$slider->subtitle;
        $this->price =$slider->price;
        $this->link=$slider->link;
        $this->image=$slider->image;
        $this->status=$slider->status;
        $this->newimage = $slider->newimage;
        $this->slider_id = $slider->id;

    }

    public function updateSlider()
    {
        $slider = Banner::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price =  $this->price;
        $slider->link = $this->link;
        $slider->status= $this->status;
        if($this->newimage){
            $imageName= Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('sliders',$imageName);
            $slider->image = $imageName;
        }
        $slider->save();
        Session()->flash('message','Slider has been Updated Successfully!');
    }

    public function render()
    {
        return view('livewire.banner.edit-banner-component')->layout('layouts.admin');
    }
}
