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

class ProductListComponent extends Component
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

    public function mount()
    {
        $this->sorting="default";
        $this->pagesize="12";
        $this->min_price =1;
        $this->max_price=60000;
    }
    
    public function maxchange()
    {
        //dd($this->min_price,$this->max_price);
        //dd($this->for_sell,$this->for_rent,$this->for_exchange);
        //dd($this->type);
        return;
    }

    public function render()
    {
       // dd($this->for_rent);
    //    $query=DB::table('products');
        $query = Product::whereBetween('prices',[$this->min_price,$this->max_price]);
       if($this->for_sell){
        $query=$query->where('is_sell',$this->for_sell);
       }
       if($this->for_rent){
        $query=$query->where('is_rent',$this->for_rent);
       }
       if($this->for_exchange){
        $query=$query->where('is_exchange',$this->for_exchange);
       }

    //    if($this->for_sell || $this->for_rent || $this->for_exchange){
    //     $products =Product::whereBetween('prices',[$this->min_price,$this->max_price])->where(function ($query) {
    //         $query->where('is_sell',$this->for_sell)
    //         ->orwhere('is_rent',$this->for_rent)
    //               ->orWhere('is_exchange', '=', $this->for_exchange);
    //     })->paginate(20);
       
    //    }else{
    //     $products =Product::whereBetween('prices',[$this->min_price,$this->max_price])->paginate(20);
    //    }
        $query=$query->distinct()->select('products.*');
        $products=$query->paginate(20);
      
     //dd($products);
        $brands = Brand::all();
        $categories = Category::all();
        return view('livewire.frontend.product-list-component',['categories'=>$categories,'products'=>$products,'brands'=>$brands])->layout('layouts.base');
    }
}
