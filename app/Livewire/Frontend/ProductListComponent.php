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
use Livewire\Attributes\Url;

class ProductListComponent extends Component
{   
    use WithPagination;
 
    public $sorting;
    public $pagesize;
    #[Url]
    public $min_price;
    #[Url]
    public $max_price;
    public $colortype=[];
    public $sizetype = [];
    #[Url]
    public $for_sell;
    public $for_exchange;
    public $for_rent;
    public $type =[];
    public $for_sell_count;
    public $for_rent_count;
    public $for_exchange_count;
    public $state_id;
    public $city_id;
    public $text;
    public $state;

    public function mount()
    {
        $this->sorting="default";
        $this->pagesize="12";
        $this->min_price = Product::where('status',1)->min('prices');
        $this->max_price = Product::where('status',1)->max('prices');
    }
    
    public function maxchange()
    {
        //dd($this->min_price,$this->max_price);
        //dd($this->for_sell,$this->for_rent,$this->for_exchange);
        //dd($this->type);
        return;
    }
    public function resetfilter()
    {
        $this->for_sell=null;
        $this->for_rent=null;
        $this->for_exchange=null;
        $this->min_price = Product::where('status',1)->min('prices');
        $this->max_price = Product::where('status',1)->max('prices');
        return;

    }
    public function changeState()
    {
    //dd($this->state_id);
        $this->city_id = 0;
        return;
    }
    
    public function chnagecity()
    {
       // dd($this->city_id);
    }
    public function render()
    {
        $query = Product::whereBetween('prices',[$this->min_price,$this->max_price])->where('status',1)->whereIn('user_verified',['0','2'])->orderby('id','desc');
        $this->for_rent_count=Product::where('is_rent',1)->where('status',1)->count();
        $this->for_sell_count=Product::where('is_sell',1)->where('status',1)->count();
        $this->for_exchange_count=Product::where('is_exchange',1)->where('status',1)->count();
       if($this->for_sell){
        $query=$query->where('is_sell',$this->for_sell);
       }
       if($this->for_rent){
        $query=$query->where('is_rent',$this->for_rent);
       }
       if($this->for_exchange){
        $query=$query->where('is_exchange',$this->for_exchange);
       }
       if($this->state_id){
        $query=$query->where('state_id',$this->state_id);
       }
       if($this->city_id){
        $query=$query->where('city_id',$this->city_id);
       }

        $query=$query->distinct()->select('products.*');
        $products=$query->paginate(12);
      
        //dd($products);
        $brands = Brand::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        $states = State::where('country_id','101')->get();
        $cities= City::where('state_id',$this->state_id)->get();


        return view('livewire.frontend.product-list-component',['categories'=>$categories,'products'=>$products,'brands'=>$brands,
        'states'=>$states,'cities'=>$cities])->layout('layouts.base');
    }
     
}
