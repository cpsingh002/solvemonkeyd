<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Livewire\Component;
use App\MOdels\Subcategory;
use Livewire\WithPagination;
use Cart;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class SearchComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;
    public $colortype=[];
    public $sizetype = [];
    public $for_sell;
    public $for_exchange;
    public $for_rent;
    public $type =[];
    public $state_id;
    public $city_id;
    public $text;

    public function mount(Request $request)
    {
        $this->sorting="default";
        $this->pagesize="12";
        $this->min_price =1;
        $this->max_price=60000;
        $this->state_id = $request->s;
        // $this->city_id = $request->c;
        $this->text = $request->text;
        // dd($this->state_id,$this->city_id,$this->text);

    }

    public function render()
    {
        $query = Product::whereBetween('prices',[$this->min_price,$this->max_price])->where('state_id',$this->state_id)->where('name','like','%'.$this->text .'%');
        if($this->for_sell){
         $query=$query->where('is_sell',$this->for_sell);
        }
        if($this->for_rent){
         $query=$query->where('is_rent',$this->for_rent);
        }
        if($this->for_exchange){
         $query=$query->where('is_exchange',$this->for_exchange);
        }
        $query=$query->distinct()->select('products.*');
        $products=$query->paginate(20);
      
     // dd($products);
        $brands = Brand::all();
        $categories = Category::all();
        return view('livewire.frontend.search-component',['categories'=>$categories,'products'=>$products,'brands'=>$brands])->layout('layouts.base');
    }
}
