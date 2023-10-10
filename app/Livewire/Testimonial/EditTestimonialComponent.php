<?php

namespace App\Livewire\Testimonial;

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditTestimonialComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $position;
    public $star;
    public $image;
    public $short_description;
    public $newimage;
    public $tid;
    public $t_id;

    public function mount($tid)
    {
        //dd($scategory_slug);
        
        
            $this->t_id= $pid;
            $package =Testimonial::where('id',$this->t_id)->first();
            $this->star = $package->star;
            $this->name= $package->name;
            $this->email = $package->email;
            $this->phone = $package->phone;
            $this->position = $package->position;
            $this->short_description = $package->short_description;
            $this->image = $package->image;
            $this->t_id = $package->id;
    
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'position'=>'required',
            'star'=>'required',
            'short_description'=>'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'image'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
    }
    public function storeTestimonial()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'position'=>'required',
            'star'=>'required',
            'short_description'=>'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'image'=>'required|mimes:jpeg,jpg,png',
            ]);
        }

            $test = Testimonial::find($this->t_id);
            $test->name = $this->name;
            $test->email = $this->email;
            $test->phone = $this->phone;
            $test->position = $this->position;
            $test->star = $this->star;
            $test->short_description = $this->short_description;
            if($this->newimage){
                //unlink('admin/category'.'/'.$test->image);
                
                $imageName= Carbon::now()->timestamp.'.'.$this->newimage->extension();
                $this->categorythum->storeAs('category',$imageName);
                $test->image = $imageName;
                }
            $test->save();
        
        session()->flash('message','Testimonial has been updated successfully!');

    }
    public function render()
    {
        return view('livewire.testimonial.edit-testimonial-component')->layout('layouts.admin');
    }
}
