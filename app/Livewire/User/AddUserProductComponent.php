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
    // public $lat;
    // public $long;
    public $country_id;
    public $state_id;
    public $city_id;
    public $st_id;
    // public $click_location;
    public $zipcode; 

    public $meta_keywords;
    public $meta_description;
    public $owner_name;
    public $contact_number;
    public $email_id;

    public $featimage;
    public $images;
    public $thumbimage;
    public $exchange_for;

    public $name;
    public $slug;

    public $icon;
    public $categorythum;
    public $attributeoptionid;
    public $dfh;
    
    public $range;
    public $in_range;
    public $price_range;
    public $short_description;
    public $description;


    public $inputs = [];
    public $attribute_arr = [];
     public $city_id1,$city_id2,$city_id3, $price_negotiable,$remark,$isverified;
     
    public function mount()
    {
        $this->for_exchange = 1;
        $this->for_sell = 1;
        $this->for_rent = 1;
        $this->in_range = "0";
        $this->owner_name=Auth::user()->name;
        $this->contact_number=Auth::user()->phone;
        $this->email_id=Auth::user()->email;
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
        $at = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->where('status',1)->get();
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

    // public function currentlocation(Request $request)
    // {
    //      $ip = $request->ip();
    //     //$ip='162.159.24.227';
    //     // $data = \Location::get($ip);    
    //     $currentUserInfo = Location::get($ip);
    //     $this->lat = $currentUserInfo->latitude ;
    //     $this->long = $currentUserInfo->longitude; 
    //     $this->zipcode = $currentUserInfo->zipCode;
    //     //dd($currentUserInfo);
    //     return;
    // }

    public function ranges()
    {
        $this->in_range=$this->in_range;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'category_id'=>'required',
            'scategory_id'=>'required',
          //  'brand_id'=>'required',
        // 'attribute_id'=>'required',
        // 'modelnumber_id'=>'required',
            'for_exchange'=>'required',
            'for_sell'=>'required',
            'for_rent'=>'required',
            'prices'=>'required|numeric',
            'in_range'=>'required',
            'address'=>'required',
            // 'lat'=>'required',
            // 'long'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
            'zipcode'=>'required', 

            'meta_keywords'=>'required',
            'meta_description'=>'required',
            'owner_name'=>'required',
            'contact_number'=>['required','numeric','digits:10'],
            'email_id'=>'required',

            'featimage'=>'required',
            'images'=>'required',
            'thumbimage'=>'required',
            'exchange_for'=>'required_if:for_exchange,1',

            'name'=>'required',
            'slug'=>'required',
            'price_negotiable'=>'required',
        ]);
        if($this->thumbimage)
        {
            $this->validateOnly($fields,[
                'thumbimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        if($this->featimage)
        {
            $this->validateOnly($fields,[
                'featimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
    }
    public function changehghg($at_id, $key)
    {
       
       $this->inputs[$at_id] =$this->attribute_arr[$key];
   
    }
    public function preview(){
        $this->dispatch('openproductPreviewModal');
    } 
    public function addProduct()
    {
          //dd($this->inputs,$this->attribute_arr);
        
        $this->validate([
            'category_id'=>'required',
            'scategory_id'=>'required',
           // 'brand_id'=>'required',
            //'attribute_id'=>'required',
            //'modelnumber_id'=>'required',
            'for_exchange'=>'required',
            'for_sell'=>'required',
            'for_rent'=>'required',
            'prices'=>'required|numeric',
            'in_range'=>'required',
            'address'=>'required',
            // 'lat'=>'required',
            // 'long'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
             'zipcode'=>'required', 

            'meta_keywords'=>'required',
            'meta_description'=>'required',
            'owner_name'=>'required',
            'contact_number'=>['required','numeric','digits:10'],
            'email_id'=>'required',

            'featimage'=>'required',
            'images'=>'required',
            'thumbimage'=>'required',
            'exchange_for'=>'required_if:for_exchange,1',

            'name'=>'required',
            'slug'=>'required|unique:products',
            'price_negotiable'=>'required',
            // 'inputs'=>'required',
        //   'attribute_arr'=>'required'
        ],[
            'name.required'=>'The title field is required.',
            'category_id.required'=>'The category field is required.',
            'scategory_id.required'=>'The sub-category field is required.',
            'attribute_id.required'=>'The attribute field is required.',
           'country_id.required'=>'The country field is required.',
           'state_id.required'=>'The state field is required.',
           'city_id.required'=>'The city is required.',
           'thumbimage.required'=>'The thumnail image field is required.',
           'featimage.required'=>'The featured image field is required.',
           'meta_keywords.required'=>'The meta tag field is required.'
            ]);
        if($this->thumbimage)
        {
            $this->validate([
                'thumbimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        if($this->featimage)
        {
            $this->validate([
                'featimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }

        $product =new Product();
        $product->category_id= $this->category_id;
        $product->subcategory_id= $this->scategory_id;
        if($this->brand_id){
        $product->brand_id= $this->brand_id;
        $product->model_id= $this->modelnumber_id;
        }
        $product->is_exchange= $this->for_exchange;
        $product->is_sell= $this->for_sell;
        $product->is_rent= $this->for_rent;
        $product->prices= $this->prices;
         $product->in_range=$this->in_range;
        if($this->in_range){
            $product->price_range=$this->price_range;
        }
        $product->address= $this->address;
        // $product->lat= $this->lat;
        // $product->lang= $this->long;
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
        $product->short_description =  $this->short_description;
        $product->description = $this->description;
        $product->price_negotiable = $this->price_negotiable;
        $product->city_id1 = $this->city_id1;
        $product->city_id2 = $this->city_id2;
        $product->city_id3 = $this->city_id3;
        $product->remark = $this->remark;
        $product->user_verified = $this->isverified;
        $product->save();    
        
        $at = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->where('status',1)->get();
        foreach($at as $key => $atsd){
           // dd($this->dfh.$key);
           // $sdgh[$key] = $this->dfh.$key.'helo'. $this->attributeoption_id.$key;
           // dd($sdgh);
             if($this->inputs[$atsd->id] == 0){
               
           }else{
           $PrAt= new ProductAttribute();
           $PrAt->product_id = $product->id;
           $PrAt->attribute_id = $atsd->id;
           $PrAt->attoption_id  = $this->inputs[$atsd->id];
           $PrAt->save();
           }

        }
       // dd($sdgh);
       // dd($this->attributeoptionid.'0');
        Session()->flash('message','Product has been Created Successfully!');

    }
    
    
    public function render()
    {

        $categories=Category::where('status',1)->get();
        $scategories = Subcategory::where('category_id',$this->category_id)->where('status',1)->get();
        $brands = Brand ::where('category_id',$this->category_id)->where('subcategory_id',$this->scategory_id)->where('status',1)->get();
        $modelnumbers = ModelNumber::where('brand_id',$this->b_id)->where('category_id',$this->category_id)->where('subcategory_id',$this->s_id)->where('status',1)->get();
        $attributes = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->where('status',1)->get();
        $attributeoptions = AttributeOption::where('attribute_id',$this->attribute_id)->where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->where('status',1)->get();
      
        $countries = Country::all();
        $states = State::where('country_id',$this->country_id)->get();
        $cities = City::where('state_id',$this->st_id)->get();
        $citiys = City::leftJoin('states','states.id','=','cities.state_id')->where('states.country_id','101')->select('cities.*')->get();

        // return view('livewire.user.add-product-component');
// dd($categories);

        // return view('post-ad',[
        return view('livewire.user.add-product-component',[
            'categories'=>$categories,'scategories'=>$scategories,'brands'=>$brands,
            'modelnumbers'=>$modelnumbers,'attributes'=>$attributes,'attributeoptions'=>$attributeoptions,
            'countries'=>$countries,'states'=>$states,'cities'=>$cities,'citiys'=>$citiys])->layout('layouts.base');
        
    }
}
