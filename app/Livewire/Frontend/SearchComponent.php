<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Livewire\Component;
use App\Models\SubCategory;
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
    public $for_sell_count;
    public $for_rent_count;
    public $for_exchange_count;    
    public $type =[];
    public $state_id;
    public $city_id;
    public $text;

    public function mount(Request $request)
    {
      // dd($request);
        $this->sorting="default";
        $this->pagesize="12";
        $this->min_price = Product::where('status',1)->min('prices');
        $this->max_price = Product::where('status',1)->max('prices');
        $this->state_id = $request->s;
        $this->city_id = $request->c;
        $this->text = $request->text;
        // dd($this->state_id,$this->city_id,$this->text);

    }
    public function maxchange()
    {
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
    public function render()
    {
        $category_id = Category::where('slug','like','%'.$this->text.'%')->first() ? Category::where('slug','like','%'.$this->text.'%')->first()->id :''; 
        $brand_id = Brand::where('slug','like','%'.$this->text.'%')->first() ? Brand::where('slug','like','%'.$this->text.'%')->first()->id : '';
        $subcategory_id = SubCategory::where('slug','like','%'.$this->text.'%')->first() ? SubCategory::where('slug','like','%'.$this->text.'%')->first()->id : '';
        
       // dd($category_id,$brand_id,$subcategory_id);
        $query = Product::whereBetween('prices',[$this->min_price,$this->max_price])->where('state_id',$this->state_id)->where('status',1)->where('user_verified','0');
        $this->for_rent_count=Product::where('is_rent',1)->where('status',1)->count();
        $this->for_sell_count=Product::where('is_sell',1)->where('status',1)->count();
        $this->for_exchange_count=Product::where('is_exchange',1)->where('status',1)->count();
        if($category_id){
         $query=$query->where('category_id',$category_id);
        }
        elseif($subcategory_id){
            $query=$query->where('subcategory_id',$subcategory_id);
        }elseif($brand_id){
            $query=$query->where('brand_id',$brand_id);
        }else{
          $query=$query->where('name','like','%'.$this->text .'%');
        }
        if($this->city_id){
            //dd($this->city_id);
            $query=$query->where('city_id',$this->city_id);
        }
        
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
        $products=$query->paginate(10);
      
    // dd($products);
        $brands = Brand::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        $states = State::where('country_id','101')->get();
        $cities= City::where('state_id',$this->state_id)->get();
        return view('livewire.frontend.search-component',['categories'=>$categories,'products'=>$products,'brands'=>$brands,'cities'=>$cities,'states'=>$states])->layout('layouts.base');
    }
    
    
    public function changeState()
    {
    //dd($this->state_id);
        $this->city_id = 0;
    }
    
    public function chnagecity()
    {
       // dd($this->city_id);
    }
}
