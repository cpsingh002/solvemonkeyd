<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\ModelNumber;
use Livewire\WithPagination;
use Cart;
use App\Models\State;
use App\Models\City;

class CategorySearchComponent extends Component
{
    use WithPagination;
    public $category_slug;
    public $min_price;
    public $max_price;
    public $scategory_slug;
    public $brandtype=[];
    public $sizetype = [];
    public $attributetype = [];
    public $for_sell;
    public $for_exchange;
    public $for_rent;
    public $for_sell_count;
    public $for_rent_count;
    public $for_exchange_count;
    public $state_id;
    public $city_id;
    public $text;
    
    public function mount($category_slug,$scategory_slug=null)
    {
        $this->sorting="default";
        $this->pagesize="12";
        $this->category_slug = $category_slug;
        $this->min_price = Product::where('status',1)->min('prices');
        $this->max_price = Product::where('status',1)->max('prices');
        $this->scategory_slug = $scategory_slug;
    }
    public function maxchange()
    {
        //dd($this->min_price,$this->max_price);
        return;
    }
    public function brandseletc()
    {
        //dd($this->brandtype);
        //dd($this->attributetype);
        return;
    }
    public function resetfilter()
    {
        $this->for_sell=null;
        $this->for_rent=null;
        $this->for_exchange=null;
        $this->brandtype=null;
        $this->attributetype=null;
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
        $category_id = null;
        $category_name = "";
        $filter= "";
        $category = "";
        $scategory = "";
        $scategory_id =null;
        $attributes="";
        $attributeoptions="";
        if($this->scategory_slug)
        {
            $scategory = Subcategory::where('slug',$this->scategory_slug)->first();
            $category_id = $scategory->id;
            $category_name = $scategory->name;
            $filter= "sub";
        }
        if($this->category_slug){
            $category=Category::where('slug',$this->category_slug)->first();
            $category_id= $category->id;
            $category_name =$category->name;
            $filter= "";
        }
        
        $query = Product::whereBetween('prices',[$this->min_price,$this->max_price])->where('status',1)->whereIn('user_verified',['0','2'])->orderBy('id','desc');
        $this->for_rent_count=Product::where('is_rent',1)->where('category_id',$category_id)->where('status',1)->count();
        $this->for_sell_count=Product::where('is_sell',1)->where('category_id',$category_id)->where('status',1)->count();
        $this->for_exchange_count=Product::where('is_exchange',1)->where('category_id',$category_id)->where('status',1)->count();
        $query=$query->leftJoin('product_attributes','product_attributes.product_id','=','products.id');
        if($this->for_sell){
         $query=$query->where('is_sell',$this->for_sell);
        }
        if($this->for_rent){
         $query=$query->where('is_rent',$this->for_rent);
        }
        if($this->for_exchange){
         $query=$query->where('is_exchange',$this->for_exchange);
        }
        if($this->category_slug){
            $query=$query->where('category_id',$category->id);
        }
        if($this->scategory_slug){
            $query=$query->where('subcategory_id',$scategory->id);
        }
        if($this->brandtype !=null){
            $query=$query->whereIn('brand_id',$this->brandtype);
        }
        if($this->attributetype)
        {
            $query=$query-> WhereIn('product_attributes.attoption_id',$this->attributetype);
        }
        if($this->state_id){
            $query=$query->where('state_id',$this->state_id);
       }
       if($this->city_id){
            $query=$query->where('city_id',$this->city_id);
       }
        $query=$query->distinct('products.name')->select('products.*');
        $products=$query->paginate(10);
        
        // if($this->brandtype != null)
        // {
        //     // dd($this->brandtype);
        //     if($this->for_sell || $this->for_rent || $this->for_exchange){
        //         $products =Product::Leftjoin('product_attributes','product_attributes.product_id','=','products.id')->select('products.*')->whereBetween('prices',[$this->min_price,$this->max_price])->where($filter.'category_id',$category_id)->whereIn('brand_id',$this->brandtype)
        //             ->where(function ($query) { $query->where('is_sell',$this->for_sell)
        //                 ->orwhere('is_rent',$this->for_rent)->orWhere('is_exchange', '=', $this->for_exchange)->orWhereIn('product_attributes.attoption_id',$this->attributetype);
        //             })->distinct('products.name')->paginate(20);
        //     }else{
        //         $products =Product::Leftjoin('product_attributes','product_attributes.product_id','=','products.id')->select('products.*')->whereBetween('prices',[$this->min_price,$this->max_price])->where($filter.'category_id',$category_id)->whereIn('brand_id',$this->brandtype)
        //         ->where(function ($query) { $query->orWhereIn('product_attributes.attoption_id',$this->attributetype);
        //         })->distinct('products.name')->paginate(20);
        //     }
        // }else{
        //         $products =Product::whereBetween('prices',[$this->min_price,$this->max_price])->where($filter.'category_id',$category_id)->paginate(20);
        // }

        //$products =Product::whereBetween('prices',[$this->min_price,$this->max_price])->where($filter.'category_id',$category_id)->whereIn('brand_id',$this->brandtype)->paginate(20);
       // dd($products);
        $brands = Brand::where('category_id',$category_id)->where('status',1)->get();
        $subcategories = SubCategory::where('category_id',$category_id)->where('status',1)->get();
        if($this->scategory_slug){
        $attributes = Attribute::where('subcategory_id', $scategory->id)->where('status',1)->get();
        $attributeoptions = AttributeOption::where('subcategory_id', $scategory->id)->where('status',1)->get();
         
       // dd($attributes,$attributeoptions);
        }
$states = State::where('country_id','101')->get();
        $cities= City::where('state_id',$this->state_id)->get();
       // dd($scategory,$category);
        return view('livewire.frontend.category-search-component',['subcategories'=>$subcategories,'products'=>$products,
        'brands'=>$brands,'category_name'=>$category_name,'scategory'=>$scategory,'category'=>$category,
        'attributes'=>$attributes,'attributeoptions'=>$attributeoptions,
        'states'=>$states,'cities'=>$cities])->layout('layouts.base');
    }
}
