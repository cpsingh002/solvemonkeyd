<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductAttribute;
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

class AddUserProductComponent extends Component
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
    public $attributeoptionid;
    public $dfh;

    public $inputs = [];
    public $attribute_arr = [];
    public function mount()
    {
        $this->for_exchange = 1;
        $this->for_sell = 1;
        $this->for_rent = 1;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function changeSubcategory()
    {
       // dd($this->category_id);
        $this->scategory_id = 0;
        
        $this->option_details='';

        
    }
    public function changeattribute()
    {
        $this->attribute_id = 0;
        $this->s_id = $this->scategory_id;
        $this->option_details='';
        $this->brand_id = 0;
        $this->inputs=[];
       // dd($this->b_id,$this->category_id,$this->s_id);
        $at = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->get();
        foreach($at as $sttt)
        {
            $this->inputs[$sttt->id]=0;
        }
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


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'category_id'=>'required',
            'scategory_id'=>'required',
            'brand_id'=>'required',
            'attribute_id'=>'required',
            'modelnumber_id'=>'required',
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
    }
    public function changehghg($at_id, $key)
    {
       
       $this->inputs[$at_id] =$this->attribute_arr[$key];
   
    }
    public function addProduct()
    {
          
        
        $this->validate([
            'category_id'=>'required',
            'scategory_id'=>'required',
            'brand_id'=>'required',
            'attribute_id'=>'required',
            'modelnumber_id'=>'required',
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
            'slug'=>'required|unique:products',
            'inputs'=>'required',
           'attribute_arr'=>'required'
        ]);

        $product =new Product();
        $product->category_id= $this->category_id;
        $product->subcategory_id= $this->scategory_id;
        $product->brand_id= $this->brand_id;
        $product->model_id= $this->modelnumber_id;
        $product->is_exchange= $this->for_exchange;
        $product->is_sell= $this->for_sell;
        $product->is_rent= $this->for_rent;
        $product->prices= $this->prices;
        $product->address= $this->address;
        $product->lat= $this->lat;
        $product->lang= $this->long;
        $product->country_id= $this->country_id;
        $product->state_id= $this->state_id;
        $product->city_id= $this->city_id;
        $product->zipcode= $this->zipcode; 

        $product->meta_keywords= $this->meta_keywords;
        $product->meta_description= $this->meta_description;
        $product->owner_name= $this->owner_name;
        $product->contact_number= $this->contact_number;
        $product->email_id= $this->email_id;

        $imageNamef= Carbon::now()->timestamp.'.'.$this->featimage->extension();
        $this->featimage->storeAs('product/feat',$imageNamef);
        $product->featimage = $imageNamef;

        
        $imageNamet= Carbon::now()->timestamp.'.'.$this->thumbimage->extension();
        $this->thumbimage->storeAs('product/thumb',$imageNamet);
        $product->thumbimage = $imageNamet;


        if($this->images)
        {
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp. $key.'.'.$image->extension();
                $image->storeAs('product/image',$imgName);
                $imagesname = $imagesname.','.$imgName;
            }
            $product->images = $imagesname;
        }      
        
        $product->exchange_for= $this->exchange_for;

        $product->name= $this->name;
        $product->slug=$this->slug;
        $product->user_id = Auth::user()->id;    
        $product->save();    
        
        $at = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->get();
        foreach($at as $key => $atsd){
           // dd($this->dfh.$key);
           // $sdgh[$key] = $this->dfh.$key.'helo'. $this->attributeoption_id.$key;
           // dd($sdgh);
           $PrAt= new ProductAttribute();
           $PrAt->product_id = $product->id;
           $PrAt->attribute_id = $atsd->id;
           $PrAt->attoption_id  = $this->inputs[$atsd->id];
           $PrAt->save();

        }
       // dd($sdgh);
       // dd($this->attributeoptionid.'0');
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

        // return view('livewire.user.add-product-component');
// dd($categories);

        // return view('post-ad',[
        return view('livewire.user.add-product-component',[
            'categories'=>$categories,'scategories'=>$scategories,'brands'=>$brands,
            'modelnumbers'=>$modelnumbers,'attributes'=>$attributes,'attributeoptions'=>$attributeoptions,
            'countries'=>$countries,'states'=>$states,'cities'=>$cities])->layout('layouts.base');
        
    }
}
