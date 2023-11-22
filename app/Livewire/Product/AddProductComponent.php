<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\ModelNumber;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class AddProductComponent extends Component
{
    use WithFileUPloads;
    public $category_id;
    public $scategory_id;
    public $brand_id;
    public $attribute_id;
    public $modelnumber_id;
    public $attributeoption_id;
    public $option_details;
    public $s_id;
    public $b_id;


    public $for_exchange;
    public $for_sell;
    public $for_rent;
    public $prices;
    public $address;
    public $lat;
    public $long;
    public $country_id;
    public $state_id;
    public $city_id;
    public $st_id;
    public $click_location;
    public $zipcode; 

    public $meta_keywords;
    public $meta_description;
    public $owner_name;
    public $contact_number;
    public $email_id;

    public $featimage;
    public $images;
    public $thumbimage;
    Public $exchange_for;

    public $name;
    public $slug;

    public $icon;
    public $categorythum;

    public function generateslug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function changeSubcategory()
    {
        $this->scategory_id = 0;
        $this->option_details='';
        
    }
    public function changeattribute()
    {
        $this->attribute_id = 0;
        $this->s_id = $this->scategory_id;
        $this->option_details='';
        $this->brand_id = 0;
    }
    public function changebrands()
    {
          $this->b_id = $this->brand_id;
          //dd($this->b_id,$this->category_id,$this->s_id);
    }

    public function changecountry()
    {
        //dd($this->country_id);
        $this->state_id = 0;
        $this->city_id = 0;
        return;
    }
    public function changestate()
    {
        $this->st_id = $this->state_id;
        $this->city_id = 0;
        return;
        
    }

    public function currentlocation()
    {
        // $ip = $request->ip();
        $ip='162.159.24.227';
        // $data = \Location::get($ip);    
        $currentUserInfo = Location::get($ip);
        $this->lat = $currentUserInfo->latitude ;
        $this->long = $currentUserInfo->longitude; 
        $this->zipcode = $currentUserInfo->zipCode;
        //dd($currentUserInfo);
        return;
    }
    public function addProduct(Request $request)
    {
        dd($request);
        $this->validate([
            'category_id'=>'required',
            'scategory_id'=>'required',
            'brand_id'=>'required',
            'attribute_id'=>'required',
            'modelnumber_id'=>'required',
            'attributeoption_id'=>'required',
            'option_details'=>'required',
            's_id'=>'required',
            'b_id'=>'required',


            'for_exchange'=>'required',
            'for_sell'=>'required',
        'for_rent'=>'required',
        'prices'=>'required',
        'address'=>'required',
        'lat'=>'required',
        'long'=>'required',
        'country_id'=>'required',
        'state_id'=>'required',
        'city_id'=>'required',
        'st_id'=>'required',
        'click_location'=>'required',
        'zipcode'=>'required', 

        'meta_keywords'=>'required',
        'meta_description'=>'required',
        'owner_name'=>'required',
        'contact_number'=>'required',
        'email_id'=>'required',

        'featimage'=>'required',
        'images'=>'required',
        'thumbimage'=>'required',
        'exchange_for'=>'required',

        'name'=>'required',
        'slug'=>'required',
        ]);

        $product =new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description =  $this->short_description;
        $product->description = $this->description;
        $product->regular_price= $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;

        $imageName= Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;

        if($this->images)
        {
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp. $key.'.'.$image->extension();
                $image->storeAs('products',$imgName);
                $imagesname = $imagesname.','.$imgName;
            }
            $product->images = $imagesname;
        }

        $product->category_id= $this->category_id;
        if($this->scategory_id)
        {
            $product->subcategory_id = $this->scategory_id;
        }
        $product->save();

        foreach($this->attribute_values as $key=>$attribute_value)
        {
            $avalues = explode(",",$attribute_value);
            foreach($avalues as $avalue)
            {
                $attr_value = new AttributeValue();
                $attr_value->product_attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }
        $j=1;
        foreach($this->para as $key => $tdata)
        {
            $product_varaint = new ProductVariant();
            $product_varaint->varaint_detail = $tdata;
            $product_varaint->product_id = $product->id;
            $product_varaint->v_SKU = $this->skus[$key];
            $product_varaint->v_regular_price = $this->mrps[$key];
            $product_varaint->v_sale_price = $this->pris[$key];
            $product_varaint->v_quantity = $this->qtyes[$key];
            $product_varaint->v_stock_status = 'instock';

            if($this->attr_image[$key])
            {
                $imagevsname = '';
               
                foreach($this->attr_image[$key] as $key1=>$vimage)
                {
                    $vimgName = Carbon::now()->timestamp. $key1.$j.'vp.'.$vimage->extension();
                    $vimage->storeAs('products',$vimgName);
                    $imagevsname = $imagevsname.','.$vimgName;
                   
                }
                $product_varaint->v_images = $imagevsname;
            }
            $j++;

            $product_varaint->save();

        }
        
        //dd($this->attribute_values);
        //$fgh =$this->tablepara($this->attribute_values);
        Session()->flash('message','Product has been Created Successfully!');

    }
    

public function render()
    {

        $categories=Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        $brands = Brand ::where('category_id',$this->category_id)->where('subcategory_id',$this->scategory_id)->get();
        $modelnumbers = ModelNumber::where('brand_id',$this->b_id)->where('category_id',$this->category_id)->where('subcategory_id',$this->s_id)->get();
        $attributes = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->get();
        $attributeoptions = AttributeOption::where('attribute_id',$this->attribute_id)->where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->get();
      
        $countries = Country::all();
        $states = State::where('country_id',$this->country_id)->get();
        $cities = City::where('state_id',$this->st_id)->get();
        // return view('livewire.product.add-product-component');


        //return view('livewire.admin1.product.add-product-admin1');
       
        return view('livewire.admin1.product.add-product-component',[
            'categories'=>$categories,'scategories'=>$scategories,'brands'=>$brands,
            'modelnumbers'=>$modelnumbers,'attributes'=>$attributes,'attributeoptions'=>$attributeoptions,
            'countries'=>$countries,'states'=>$states,'cities'=>$cities])->layout('layouts.admin1');


        //return view('livewire.admin1.product.add-product-component')->layout('layouts.admin1');

    }
}
