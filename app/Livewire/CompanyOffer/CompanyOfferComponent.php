<?php

namespace App\Livewire\CompanyOffer;

use Livewire\Component;
use App\Models\CompanyOffer;
use Livewire\WithPagination;

class CompanyOfferComponent extends Component
{
    use withPagination;
    public function deleteOffer($id)
    {
        $category = CompanyOffer::find($id);
        $category->delete();
        session()->flash('message','Offer has been deleted successfully!');
    }
   public function DeactiveOffer($id)
    {
        $category = CompanyOffer::find($id);
        $category->status=0;
        $category->save();
        session()->flash('message','Offer has been Deactive successfully!');
        $this->js('window.location.reload()');
    }
    public function ActiveOffer($id)
    {
        $category = CompanyOffer::find($id);
        $category->status=1;
        $category->save();
        session()->flash('message','Offer has been Active successfully!');
        $this->js('window.location.reload()');
    }
    public function render()
    {
        $companyoffers = CompanyOffer::where('status','!=',3)->get();
        return view('livewire.company-offer.company-offer-component',['companyoffers'=>$companyoffers])->layout('layouts.admin1');
    }
}
