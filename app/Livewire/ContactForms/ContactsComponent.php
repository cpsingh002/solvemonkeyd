<?php

namespace App\Livewire\ContactForms;

use Livewire\Component;
use App\Models\Contactform;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ReplyMail;

class ContactsComponent extends Component
{
    public $email;
    public $subject;
    public $reply;
    use withPagination;
    public function ActiveStatus($id)
    {
        $contact = Contactform::find($id);
        $contact->status = 1;
        $contact->save();
        session()->flash('message','contact from has been active successfully!');
    }
    public function DeactiveStatus($id)
    {
        $contact = Contactform::find($id);
        $contact->status = 0;
        $contact->save();
        session()->flash('message','contact from has been de-active successfully!');
    }
    public function replyContact($id){
        $contact = Contactform::find($id);
        $this->email=$contact->email;
        $this->dispatch('opencontactReplyModal');
    }
    public function sendMail(){

        $this->validate([
            'email'=>'required',
            'subject' => 'required',
            'reply'=>'required',
        ]);

        $mailData = [
            'subject' => $this->subject,
            'reply' => $this->reply
        ];
         
        Mail::to($this->email)->send(new ReplyMail($mailData));
        $contact = Contactform::where('email',$this->email)->first();
        // dd($contact->is_replay);
        $contact->is_replay=1;
        $contact->save();
        $this->dispatch('closecontactReplyModal');
        $this->js('window.location.reload()');
        session()->flash('message','Mail has been Send successfully!');
    }
    public function render()
    {
        $contacts = Contactform::all();
        return view('livewire.contact-forms.contacts-component',['contacts'=>$contacts])->layout('layouts.admin1');
    }
}
