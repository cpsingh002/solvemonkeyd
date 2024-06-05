<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\SitePage;

class PrivacyPolicyComponent extends Component
{
    public $pp;
    public function mount()
    {
         $setting = SitePage::find(1);
        if($setting)
        {
            
            $this->pp = $setting->pp;
           
        }
    }
    public function render()
    {
        return view('livewire.frontend.privacy-policy-component')->layout('layouts.base');
    }
}
