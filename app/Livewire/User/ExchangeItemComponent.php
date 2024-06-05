<?php

namespace App\Livewire\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class ExchangeItemComponent extends Component
{
    public $exchange_for;
    public $price;
    public $range;
    public $images;

    public function mount($e_for,$p,$r){
        $this->exchange_for=$e_for;
        $this->price=$p;
        $this->range=$r;
    }
    public function render()
    {
        if($range=2){
            $min=$this->price*85/100;
            $max=$this->price*115/100;
        }
        elseif($range=3){
            $min=$this->price*80/100;
            $max=$this->price*120/100;
        }
        elseif($range=4){
            $min=$this->price*75/100;
            $max=$this->price*125/100;
        }
        else{
            $min=$this->price*90/100;
            $max=$this->price*110/100;
        }

        $this->images = explode(",",$this->exchange_for);
        foreach($this->images as $key=> $text)
        {
             $text = trim($text," ");
            //  dd($text);
             $query[$key] = Product::whereBetween('prices',[$min,$max])->where('is_exchange','1')->where(function ($query) use ($text) {
                    $query ->where('exchange_for','like','%'.$text.'%')->orwhere('name','like','%'.$text.'%')->orwhere('meta_keywords','like','%'.$text.'%'); 
                })->where('user_id','!=', Auth::user()->id)->where('status',1)->get();
        }
                    //  dd($query);
        return view('livewire.user.exchange-item-component',['products'=>$query])->layout('layouts.base');
    }
}
