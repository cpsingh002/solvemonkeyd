<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\SitePage;

class PageComponent extends Component
{
     public $tc;
        public $lp;
        public $pp;
        public $faq;
    public function mount()
    {
       
        
        $setting = SitePage::find(1);
        if($setting)
        {
            $this->tc = $setting->tc;
            $this->lp = $setting->lp;
            $this->pp = $setting->pp;
            $this->faq = $setting->faq;
        }
    }
     public function updated($fields)
    {
        $this->validateOnly($fields,[
            // 'lp' => 'required|email',
             'pp' => 'required',
            //  'tc' => 'required',
            //  'faq' => 'required'
            ]);
        
    }
    
    public function saveSettings()
    {
        $this->validate([
            // 'lp' => 'required|email',
             'pp' => 'required',
            //  'tc' => 'required',
            //  'faq' => 'required'
             
        ]);
        
//dd($this->tc);
        $setting = SitePage::find(1);
        if(!$setting)
        {
            $setting = new SitePage();
        }
        $setting->lp = $this->lp;
        $setting->pp = $this->pp;
        $setting->tc = $this->tc;
        $setting->faq = $this->faq;
        $setting->save();
        session()->flash('message','Settings has been upadted successfully!');

    }
    
    public function render()
    {
        // $sitepage = SitePage::find(1);
        return view('livewire.frontend.page-component')->layout('layouts.admin1');
    }
}
