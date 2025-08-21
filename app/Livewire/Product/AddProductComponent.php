<?php

namespace App\Livewire\Product;

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
    public $short_description;
    public $description;

    public $icon;
    public $categorythum;
    public $attributeoptionid;
    public $dfh;
    
    public $price_range;
    public $range;
    public $in_range;

    public $inputs = [];
    public $attribute_arr = [];
    public $city_id1,$city_id2,$city_id3, $price_negotiable, $model_id;
    
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
        $this->scategory_id = 0;
        $this->option_details='';
        $this->$this->modelnumber_id = '';
        $this->model_id = '';
        $this->brand_id = '';

        
    }
    public function changeattribute()
    {
        $this->attribute_id = 0;
        $this->s_id = $this->scategory_id;
        $this->option_details='';
        $this->brand_id = 0;
        $this->inputs=[];
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
          $this->model_id = '';
          $this->modelnumber_id = '';
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
    //   // $ip='162.159.24.227';
    //     // $data = \Location::get($ip);    
    //     $currentUserInfo = Location::get($ip);
    //     $this->lat = $currentUserInfo->latitude ;
    //     $this->long = $currentUserInfo->longitude; 
    //     $this->zipcode = $currentUserInfo->zipCode;
    //     //dd($currentUserInfo);
    //     return;
    // }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'category_id'=>'required',
            'scategory_id'=>'required',
           // 'brand_id'=>'required',
            //'attribute_id'=>'required',
            'modelnumber_id'=>'required',
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
            'contact_number'=>'required',
            'email_id'=>'required',

            'featimage'=>'required',
            'images'=>'required',
            'thumbimage'=>'required',
            'exchange_for'=>'required',

            'name'=>'required',
            'slug'=>'required|unique:products',
        ]);
    }
    public function changehghg($at_id, $key)
    {
        //dd($this->attribute_arr[$key]);
       // dd($at_id,$key,$this->attributeoption_id.$key);
       $this->inputs[$at_id] =$this->attribute_arr[$key];
    //    if(!in_array($at_id,$this->attributeoption_id))
    //     {
    //         array_push($this->inputs,$at_id);
    //         array_push($this->attribute_arr,$this->attributeoption_id);
           
    //     }
    }
    public function ranges()
    {
        $this->in_range=$this->in_range;
    }
    public function preview()
    {
        $this->dispatch('openproductPreviewModal');
    }
    public function addProduct()
    {
        
        $this->validate([
            'category_id'=>'required',
            'scategory_id'=>'required',
            //'brand_id'=>'required',
            'attribute_id'=>'required',
            //'modelnumber_id'=>'required',
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
            'contact_number'=>'required',
            'email_id'=>'required',

            'featimage'=>'required',
            'images'=>'required',
            'thumbimage'=>'required',
            'exchange_for'=>'required',

            'name'=>'required',
            'slug'=>'required|unique:products',
            //'inputs'=>'required',
          // 'attribute_arr'=>'required'
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
        $product->short_description =  $this->short_description;
        $product->description = $this->description; 
        $product->price_negotiable = $this->price_negotiable;
        $product->city_id1 = $this->city_id1;
        $product->city_id2 = $this->city_id2;
        $product->city_id3 = $this->city_id3;
        $product->save();    
        
        $at = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->get();
        foreach($at as $key => $atsd){
           // dd($this->dfh.$key);
           // $sdgh[$key] = $this->dfh.$key.'helo'. $this->attributeoption_id.$key;
           // dd($sdgh);
           
           if($this->input[$atsd->id] == 0){
               
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
    public function chnagemodel()
    {
        $this->model_id = $this->modelnumber_id;
    }
    

    public function render(Request $request)
    {
           //  $ip = $request->ip();
       // $currentUserInfo = Location::get($ip);
       
        //dd($currentUserInfo->currencyCode);

        $categories=Category::where('status','!=',3)->get();
        $scategories = Subcategory::where('category_id',$this->category_id)->where('status','!=',3)->get();
        $brands = Brand ::where('category_id',$this->category_id)->where('subcategory_id',$this->scategory_id)->where('status','!=',3)->get();
        $modelnumbers = ModelNumber::where('brand_id',$this->b_id)->where('category_id',$this->category_id)->where('subcategory_id',$this->s_id)->where('status','!=',3)->get();
        $attributes = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->where('status',1)->get();
        
        // if($this->scategory_id == '10'){
        //     if(!empty($this->model_id))
        //     {
        //         $query = Attribute::where('category_id', $this->category_id)
        //             ->where('subcategory_id', $this->s_id)
        //             ->where('status', '!=', 3)
        //             ->with(['attributeoptions' => function ($q) {
        //                 if (isset($this->model_id)) {
        //                     $q->where('model_id', $this->model_id);
        //                 }
        //             }]);

        //         if (is_array($modelnumbers) && isset($modelnumbers[0])) {
        //             $query->whereHas('attributeoptions', function ($q) {
        //                 $q->where('model_id', $this->model_id);
        //             });
        //         }
        //         $attributes = $query->get();
        //     }else{
        //     $attributes = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->where('status','!=',3)->get();
        //     }
        // }else{
        //     $attributes = Attribute::where('category_id', $this->category_id)->where('subcategory_id', $this->s_id)->where('status','!=',3)->get();
        // }

        $countries = Country::all();
        $states = State::where('country_id',$this->country_id)->get();
        $cities = City::where('state_id',$this->st_id)->get();
        $citiys = City::leftJoin('states','states.id','=','cities.state_id')->where('states.country_id','101')->select('cities.*')->get();
       
        return view('livewire.admin1.product.add-product-component',[
            'categories'=>$categories,'scategories'=>$scategories,'brands'=>$brands,
            'modelnumbers'=>$modelnumbers,'attributes'=>$attributes,
            'countries'=>$countries,'states'=>$states,'cities'=>$cities,'citiys'=>$citiys])->layout('layouts.admin1');

    }
}
