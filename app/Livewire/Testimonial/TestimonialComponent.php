<?php

namespace App\Livewire\Testimonial;

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\WithPagination;

class TestimonialComponent extends Component
{
    use withPagination;
    public function ActiveStatus($id)
    {
        $category = Testimonial::find($id);
        $category->status = 1;
        $category->save();
        session()->flash('message','Testimonial has been Active successfully!');
    }
    public function DeactiveStatus($id)
    {
        $category = Testimonial::find($id);
        $category->status = 0;
        $category->save();
        session()->flash('message','Testimonial has been Deactive successfully!');
    }
    public function Verifiedstatus($id)
    {
        $category = Testimonial::find($id);
        $category->verified = 1;
        $category->delete();
        session()->flash('message','Testimonial has been verified successfully!');
    }
    public function DeVerifiedstatus($id)
    {
        $category = Testimonial::find($id);
        $category->verified = 0;
        $category->delete();
        session()->flash('message','Testimonial has been Deverified successfully!');
    }
    public function render()
    {
        $testimonials = Testimonial::paginate(5);
        return view('livewire.testimonial.testimonial-component',['testimonials'=>$testimonials])->layout('layouts.admin1');
    }
}
