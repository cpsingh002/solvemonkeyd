<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use App\MOdels\Subcategory;
use Livewire\WithPagination;
use Cart;

class ProductListComponent extends Component
{   
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;
    public $colortype=[];
    public $sizetype = [];

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
        return;
    }
    public function render()
    {
        $products =Product::whereBetween('prices',[$this->min_price,$this->max_price])->paginate(20);
        //dd($products);
        $categories = Category::all();
        return view('livewire.frontend.product-list-component',['categories'=>$categories,'products'=>$products])->layout('layouts.base');
    }
}
