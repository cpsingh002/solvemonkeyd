<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\SitePage;

class TermsConditionComponent extends Component
{
    public $tc;
    public function mount()
    {
         $setting = SitePage::find(1);
        if($setting)
        {
            
            $this->tc = $setting->tc;
           
        }
    }
    public function render()
    {
        return view('livewire.frontend.terms-condition-component')->layout('layouts.base');
    }
}
