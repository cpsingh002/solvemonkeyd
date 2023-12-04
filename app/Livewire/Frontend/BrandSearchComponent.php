<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\ModelNumber;
use Livewire\WithPagination;
use Cart;

class BrandSearchComponent extends Component
{
    use WithPagination;
    public $category_slug;
    public $min_price;
    public $max_price;
    public $scategory_slug;
    public $brand_slug; 

    public function mount($brand_slug)
    {
        $this->sorting="default";
        $this->pagesize="12";
        $this->brand_slug = $brand_slug;
        $this->min_price =1;
        $this->max_price=60000;
        
        
    }
    public function render()
    {
        $brand_id = null;
        $brand_name = "";
        $filter= "";
        if($this->brand_slug)
        {
            $brand = Brand::where('slug',$this->brand_slug)->first();
            $brand_id = $brand->id;
            $brand_name = $brand->name;
        }

        $products =Product::whereBetween('prices',[$this->min_price,$this->max_price])->where('brand_id',$brand_id)->paginate(20);
        //dd($products);
        //$brands = Brand::where('category_id',$category_id)->get();
        $categories = Category::where('category_id',$brand->category_id)->get();
        $subcategories = Subcategory::where('category_id',$brand->subcategory_id)->get();
        return view('livewire.frontend.brand-search-component',['products'=>$product,'bname'=>$brand_name,'categories'=>$categories])->layout('layouts.base');
    }
}
