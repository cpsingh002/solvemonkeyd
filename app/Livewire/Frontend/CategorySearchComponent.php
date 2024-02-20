<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\ModelNumber;
use Livewire\WithPagination;
use Cart;

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

    public function mount($category_slug,$scategory_slug=null)
    {
        $this->sorting="default";
        $this->pagesize="12";
        $this->category_slug = $category_slug;
        $this->min_price =1;
        $this->max_price=60000;
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
        
        $query = Product::whereBetween('prices',[$this->min_price,$this->max_price]);
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

        $query=$query->distinct('products.name')->select('products.*');
        $products=$query->paginate(20);
       // dd($products);
        $brands = Brand::where('category_id',$category_id)->get();
        $subcategories = Subcategory::where('category_id',$category_id)->get();
        if($this->scategory_slug){
        $attributes = Attribute::where('subcategory_id', $scategory->id)->get();
        $attributeoptions = AttributeOption::where('subcategory_id', $scategory->id)->get();
       // dd($attributes,$attributeoptions);
        }

       // dd($scategory,$category);
        return view('livewire.frontend.category-search-component',['subcategories'=>$subcategories,'products'=>$products,
        'brands'=>$brands,'category_name'=>$category_name,'scategory'=>$scategory,'category'=>$category,
        'attributes'=>$attributes,'attributeoptions'=>$attributeoptions])->layout('layouts.base');
    }
}
