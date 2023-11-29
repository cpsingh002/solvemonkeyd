<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Contactform;

class ContactComponent extends Component
{
    public $fname;
    public $lname;
    public $phone;
    Public $email;
    public $message;
    public $checkbox;
    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'lname'=>'required',
            'fname'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',
            'checkbox' =>'required',
        ]);
    }

    public function addContactform()
    {

        $this->validate([
            'lname'=>'required',
            'fname'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',
            'checkbox' =>'required',
        ]);

        $contact = new Contactform();
        $contact->fname = $this->fname;
        $contact->lname = $this->lname;
        $contact->phone = $this->phone;
        $contact->email = $this->email;
        $contact->message = $this->message;
        $contact->save();
        $this->thankyou = 1;
        Session()->flash('message','Message has been Saved Successfully!');
    }
    public function verifyForCheckout()
    {
        
        if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.frontend.contact-component')->layout('layouts.base');
    }
}
