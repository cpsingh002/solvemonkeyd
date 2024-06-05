<?php

namespace App\Livewire\CompanyOffer;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\CompanyOffer;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditCompanyOfferComponent extends Component
{
     use WithFileUPloads;
    public $company_name;
    public $company_logo;
    public $offer_link;
    public $offer_template;
    public $offer_details;
    public $slug;
    public $heading;
    public $status;
    public $newoffer_template;
    public $newcompany_logo;
    public $eid;
    
    
     public function mount($eid)
    {
        
       
            $this->eid= $eid;
            $category =CompanyOffer::where('id',$this->eid)->first();
            $this->company_name= $category->company_name;
            $this->slug = $category->slug;
            $this->offer_link = $category->offer_link;
            $this->company_logo = $category->company_logo;
            $this->offer_template = $category->offer_template;
            $this->offer_details=$category->offer_details;
            $this->heading = $category->heading;
            $this->status = $category->status;
            
    }
    

    public function generateslug()
    {
        $this->slug = Str::slug($this->heading);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'company_name'=>'required',
            'offer_link'=>'required',
            
            'status'=>'required',
            'offer_details' =>'required',
            'heading'=>'required',
            'slug' => 'required|unique:company_offers,slug,'.$this->eid
        ]);
        if($this->newoffer_template)
        {
            $this->validateOnly($fields,[
                'newoffer_template'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        if($this->newcompany_logo)
        {
            $this->validateOnly($fields,[
                'newcompany_logo'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
    }
    public function updateOffer()
    {
        $this->validate([
            'company_name'=>'required',
            'offer_link'=>'required',
           'slug' => 'required|unique:company_offers,slug,'.$this->eid.'',
            'status'=>'required',
            'offer_details' =>'required',
            'heading'=>'required'
        ]);
        if($this->newoffer_template)
        {
            $this->validate([
                'newoffer_template'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        if($this->newcompany_logo)
        {
            $this->validate([
                'newcompany_logo'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        
        

            $category = CompanyOffer::find($this->eid);;
            $category->company_name = $this->company_name;
            $category->heading = $this->heading;
            $category->slug = $this->slug;
            $category->offer_link = $this->offer_link;
            $category->status = $this->status;
            if($this->newoffer_template){
                $imageNamei= Carbon::now()->timestamp.'.'.$this->newoffer_template->extension();
                $this->newoffer_template->storeAs('company/template',$imageNamei);
                $category->offer_template = $imageNamei;
            }
            if($this->newcompany_logo){
                $imageName= Carbon::now()->timestamp.'.'.$this->newcompany_logo->extension();
                $this->newcompany_logo->storeAs('company/logo',$imageName);
                $category->company_logo = $imageName;
            }
            $category->offer_details = $this->offer_details;
            $category->save();
        
        session()->flash('message','Company Offer has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.company-offer.edit-company-offer-component')->layout('layouts.admin1');
    }
}
