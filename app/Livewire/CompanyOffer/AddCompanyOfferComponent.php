<?php

namespace App\Livewire\CompanyOffer;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\CompanyOffer;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AddCompanyOfferComponent extends Component
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

    public function generateslug()
    {
        $this->slug = Str::slug($this->heading);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'company_name'=>'required',
            'offer_link'=>'required',
            'slug'=>'required|unique:company_offers',
            'status'=>'required',
            'offer_template'=>'required|mimes:jpeg,jpg,png',
            'company_logo'=>'required|mimes:jpeg,jpg,png',
            'offer_details' =>'required',
            'heading'=>'required'
        ]);
    }
    public function storeOffer()
    {
        $this->validate([
            'company_name'=>'required',
            'offer_link'=>'required',
            'slug'=>'required|unique:company_offers',
            'status'=>'required',
            'offer_template'=>'required|mimes:jpeg,jpg,png',
            'company_logo'=>'required|mimes:jpeg,jpg,png',
            'offer_details' =>'required',
            'heading'=>'required'
        ]);
        
        

            $category = new CompanyOffer();
            $category->company_name = $this->company_name;
            $category->heading = $this->heading;
            $category->slug = $this->slug;
            $category->offer_link = $this->offer_link;
            $category->status = $this->status;
            if($this->offer_template){
                $imageNamei= Carbon::now()->timestamp.'.'.$this->offer_template->extension();
                $this->offer_template->storeAs('company/template',$imageNamei);
                $category->offer_template = $imageNamei;
            }
            if($this->company_logo){
                $imageName= Carbon::now()->timestamp.'.'.$this->company_logo->extension();
                $this->company_logo->storeAs('company/logo',$imageName);
                $category->company_logo = $imageName;
            }
            $category->offer_details = $this->offer_details;
            $category->save();
        
        session()->flash('message','Company Offer has been created successfully!');
    }

    public function render()
    {
        return view('livewire.company-offer.add-company-offer-component')->layout('layouts.admin1');
    }
}
