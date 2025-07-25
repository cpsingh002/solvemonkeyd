<?php

namespace App\Livewire\User;

use Livewire\Component;
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

class EditUserProductComponent extends Component
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
    Public $exchange_for;

    public $name;
    public $slug;
    public $short_description;
    public $description;

    public $icon;
    public $categorythum;
    public $attributeoptionid;
    public $dfh;

    public $in_range;
    public $price_range;

    public $inputs = [];
    public $attribute_arr = [];
    public $pid;
    public $newimages;
    public $newthumbimage;
    public $newfeatimage;
    public $city_id1,$city_id2,$city_id3, $price_negotiable,$remark,$isverified;
    
    public function mount($pid)
    {
        $product = Product::find($pid);
        $this->category_id = $product->category_id;
        $this->scategory_id= $product->subcategory_id;
        $this->brand_id = $product->brand_id;
        $this->modelnumber_id = $product->model_id;
        $this->for_exchange = $product->is_exchange;
        $this->for_sell = $product->is_sell;
        $this->for_rent = $product->is_rent;
        $this->prices =  $product->prices;
        $this->in_range =  $product->in_range;
        $this->price_range = $product->price_range;
        $this->address =   $product->address;
        // $this->lat = $product->lat;
        // $this->long  = $product->lang;
        $this->country_id = $product->country_id;
        $this->state_id = $product->state_id;
        $this->city_id = $product->city_id;
        $this->zipcode = $product->zipcode; 

        $this->meta_keywords = $product->meta_keywords;
        $this->meta_description = $product->meta_description;
        $this->owner_name = $product->owner_name;
        $this->contact_number = $product->contact_number;
        $this->email_id =  $product->email_id;
        $this->featimage = $product->featimage;
        $this->thumbimage = $product->thumbimage;
        $this->images = explode(",",$product->images);

        $this->exchange_for = $product->exchange_for;
        $this->name = $product->name;
        $this->slug = $product->slug;   
        $this->short_description = $product->short_description ;
        $this->description = $product->description ; 
        $this->s_id = $this->scategory_id;
        $this->b_id = $this->brand_id;
        $this->st_id=$this->state_id;
        $this->city_id3 = $product->city_id3;
        $this->city_id2 = $product->city_id2;
        $this->city_id1 = $product->city_id1;
        $this->price_negotiable  = $product->price_negotiable;
        $this->remark = $product->remark;
        $this->isverified = $product->user_verified;


        $Ptss= ProductAttribute::where('product_id',$pid)->get();
        foreach($Ptss as $key => $Pts)
        {
            $this->inputs[$Pts->attribute_id] =$Pts->attoption_id;
            $this->attribute_arr[$key] = $Pts->attoption_id;
        }

        // dd($this->attribute_arr,$this->inputs);
        //dd($this->thumbimage);
        //dd($this->inputs);
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
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
        $this->inputs=[];
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
        //    'modelnumber_id'=>'required',
            'for_exchange'=>'required',
            'for_sell'=>'required',
            'for_rent'=>'required',
            'in_range'=>'required',
            'prices'=>'required',
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
            'exchange_for'=>'required',

            'name'=>'required',
            'slug'=>'required',
            'price_negotiable'=>'required',
        ]);

        if($this->newthumbimage)
        {
            $this->validate([
                'newthumbimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        if($this->newfeatimage)
        {
            $this->validate([
                'newfeatimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
    }
    public function changehghg($at_id, $key)
    {
       $this->inputs[$at_id] =$this->attribute_arr[$key];
   
    }
    public function updateProduct()
    {
        $this->validate([
            'category_id'=>'required',
            'scategory_id'=>'required',
          //  'brand_id'=>'required',
            
        //    'modelnumber_id'=>'required',
            'for_exchange'=>'required',
            'for_sell'=>'required',
            'for_rent'=>'required',
            'prices'=>'required',
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
            // 'inputs'=>'required',
            // 'attribute_arr'=>'required',
            'price_negotiable'=>'required',
            'slug'=>'required|unique:products,slug,'.$this->pid
        ],[
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

        if($this->newthumbimage)
        {
            $this->validate([
                'newthumbimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        if($this->newfeatimage)
        {
            $this->validate([
                'newfeatimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }

        $product = Product::find($this->pid);
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
        else{
            $product->price_range=null;
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
        if($this->newfeatimage)
        {
            if($product->featimage){
            // unlink('admin/product/feat'.'/'.$product->featimage);
            }
            $imageNamef= Carbon::now()->timestamp.'.'.$this->newfeatimage->extension();
            $this->newfeatimage->storeAs('product/feat',$imageNamef);
            $product->featimage = $imageNamef;
        }

        if($this->newthumbimage)
        {
            if($product->thumbimage){
            unlink('admin/product/thumb'.'/'.$product->thumbimage);
            }
            $imageNamet= Carbon::now()->timestamp.'.'.$this->newthumbimage->extension();
            $this->newthumbimage->storeAs('product/thumb',$imageNamet);
            $product->thumbimage = $imageNamet;
        }
        if($this->newimages)
        {
            if($product->images)
            {
                $images = explode(",",$product->images);
                foreach($images as $image)
                {
                    if($image)
                    {
                        unlink('admin/product/image'.'/'.$image);
                    }
                }
            }
            $imagesname = '';
            foreach($this->newimages as $key=>$image)
            {
                $imgName= Carbon::now()->timestamp.$key.'.'.$image->extension();
                $image->storeAs('product/image',$imgName);
                $imagesname = $imagesname.','.$imgName;
            }
            $product->images = $imagesname;      
        }
        $product->exchange_for= $this->exchange_for;

        $product->name= $this->name;
        $product->slug=$this->slug;   
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
            $PAT = ProductAttribute::where('product_id',$this->pid)->where('attribute_id',$atsd->id)->first();
            if(isset($PAT)){
                $PAT->attoption_id  = $this->inputs[$atsd->id];
                $PAT->save();
            }else{
                $PrAt= new ProductAttribute();
                $PrAt->product_id = $product->id;
                $PrAt->attribute_id = $atsd->id;
                $PrAt->attoption_id  = (int)$this->inputs[$atsd->id];
                $PrAt->save();
            }
        }
        Session()->flash('message','Product has been updated Successfully!');

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
        // dd($this->st_id);
        return view('livewire.user.edit-product-component',[
          'categories'=>$categories,'scategories'=>$scategories,'brands'=>$brands,
          'modelnumbers'=>$modelnumbers,'attributes'=>$attributes,'attributeoptions'=>$attributeoptions,
          'countries'=>$countries,'states'=>$states,'cities'=>$cities,'citiys'=>$citiys])->layout('layouts.base');
    }
}
