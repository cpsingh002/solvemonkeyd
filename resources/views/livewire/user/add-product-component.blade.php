<div> 
    <style>
        #mapa{
            position: sticky !important;
            margin-top:2%;
            border-radius:10px;
            height:450px;
        }
    </style>
    <div class="addList-Details section-padding2">
        <div class="container">
            <div class="row justify-content-center rowee">
                <div class="col-xl-8 col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Properties</a></li>
                            <li class="breadcrumb-item"><a href="#">Post ad</a></li>
                        </ol>
                        <h4 class="priceTittle pt-20 pb-20">Post your ad</h4>
                    </nav>

                    <div class="card">
                        <div class="card-body">
                            <div class="listingDetails-Wrapper">
                                <div class="listingDetails">
                                    <div class="row">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                        <form class="form-horizontal"  enctype="multipart/form-data" wire:submit.prevent="addProduct">
                                            <div class="row ">
                                                <div class="col-lg-6 col-md-6  mb-3">
                                                    <div class="select-itmss">
                                                        <label class="infoTitle">Category</label>
                                                        <select class="form-control" wire:model="category_id" wire:change="changeSubcategory"   >
                                                            <option value="">Select Category</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6  mb-3">
                                                    <div class="select-itmss">
                                                        <label class="infoTitle">Subcategory</label>

                                                        <select  class="form-control " wire:model="scategory_id" wire:change="changeattribute">
                                                            <option value="">Select Sub Category</option>
                                                            @foreach($scategories as $scategory)
                                                            <option value="{{$scategory->id}}">{{$scategory->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('scategory_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                @if(isset($brands[0]))
                                                <div class="col-lg-6 col-md-6  mb-3">
                                                    <div class="select-itmss">
                                                        <label class="infoTitle">Brand</label>
                                                        <select  class="form-control " wire:model="brand_id" wire:change="changebrands">
                                                            <option value="">Select Brand Name</option>
                                                            @foreach($brands as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('brand_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6  mb-3">
                                                    <div class="select-itmss">
                                                        <label class="infoTitle ">Brand Model Number</label>
                                                        <select name="select" class="form-control " wire:model="modelnumber_id">
                                                            <option value="">Select Brand Model</option>
                                                            @foreach($modelnumbers as $modelnumber)
                                                            <option value="{{$modelnumber->id}}">
                                                                {{$modelnumber->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('modelnumber_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                @endif
                                            </div>
                                             
                                            @if(isset($attributes[0]))
                                            <div class="mb-2">
                                                    <label for="form-banner" class="form-label infoTitle info">Attributes </label>
                                                        <div class="col-md-12">
                                                            @foreach($attributes as $key1 => $attribute)
                                                                <label class="infoTitle infos">{{$attribute->attribute}}</label>
                                                                <!-- <input type="hidden" value="{{$attribute->id}}" wire:model="dfh.{{$key1}}"> -->
                                                                
                                                                <select class="form-control" wire:model="attribute_arr.{{$key1}}" wire:change="changehghg({{$attribute->id}}, {{$key1}})" required >
                                                                    <option value="">Select</option>
                                                                    @foreach($attribute->attributeoptions as $attributeoption)
                                                                    <option value="{{$attributeoption->id}}">{{$attributeoption->option_details}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @endforeach
                                                        </div>
                                                    @error('attribute_arr') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                @endif
                                            <div class="row">
                                                <div class="col-lg-12  mb-3">
                                                    <label class="infoTitle ">Title</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" class="form-control " placeholder="Product Title" wire:model="name" wire:keyup="generateslug">
                                                    </div>
                                                    @error('name') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                                <!--mb-4-->
                                                <div class="mbr  mb-3">
                                                    <label for="form-category/slug" class="form-label infoTitle">Product Slug</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" placeholder="Product Slug" class="form-control"
                                                            wire:model="slug" />
                                                    </div>
                                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-lg-12  mb-3">
                                                    <label class="infoTitle"> Short Description</label>
                                                    <div class="input-form input-form2 " wire:ignore>
                                                        <textarea  id="short_description"  placeholder="Short Description" wire:model="short_description">{!! $short_description !!}</textarea>
                                                    </div>
                                                </div>
                                                    @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                                <div class="col-lg-12  mb-3">
                                                    <label class ="infoTitle my-2">Description</label>
                                                    <div class="input-form input-form2 " wire:ignore>
                                                        <textarea id="description"  placeholder="Description" wire:model="description">{!! $description !!}</textarea>
                                                    </div>
                                                </div>
                                                    @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4  mb-3">
                                                    <div class="select-itmss ">
                                                        <label class="infoTitle mt-2">Available for Exchange</label>
                                                        <select name="select" class="form-control" wire:model="for_exchange">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4  mb-3">
                                                    <div class="select-itmss ">
                                                        <label class="infoTitle mt-2">Available for Rent</label>
                                                        <select name="select" class="form-control" wire:model="for_rent">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4  mb-3">
                                                    <div class="select-itmss ">
                                                        <label class="infoTitle mt-2">Available for Sell</label>
                                                        <select name="select" class="form-control" wire:model="for_sell">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                {{--<div class="col-lg-12">
                                                    <label class="form-label infoTitle">Product Specification</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" class="form-control " placeholder="product specification">
                                                        @error('pname') <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>--}}
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3  mb-3">
                                                        <label class="form-label infoTitle ">Product Price</label>
                                                        <div class="input-group input-group--sa-slug">
                                                            <input type="text" class="form-control " placeholder="product price" wire:model="prices" />
                                                        </div>
                                                            @error('prices') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                    <div class="col-lg-3 col-md-3  mb-3">
                                                        <label class="form-label infoTitle ">Price in range</label>
                                                                    <div class="input-group input-group--sa-slug">
                                                                        <!--mt-3-->
                                                                        <select class="form-control mtr " wire:model="in_range" wire:change="ranges">
                                                                            <option value="">Select Option</option>
                                                                            <option value="0">No</option>
                                                                            <option value="1">Yes</option>
                                                                        </select>
                                                                    </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3  mb-3">
                                                            @if($in_range==1)
                                                            <label class="infoTitle mt-2">Range</label>
                                                            <div class="input-group input-group--sa-slug">
                                                                <!--mt-3-->
                                                                    <select class="form-select" wire:model="price_range">
                                                                        <option value="">Select Price Range</option>
                                                                        <option value="1">{{($prices*90/100)}} to  {{($prices*110/100)}}</option>
                                                                        <option value="2">{{($prices*85/100)}} to  {{($prices*115/100)}}</option>
                                                                        <option value="3">{{($prices*80/100)}} to  {{($prices*120/100)}}</option>
                                                                        <option value="4">{{($prices*75/100)}} to  {{($prices*125/100)}}</option>
                                                                    </select>
                                                            </div>
                                                            @endif
                                                    </div>
                                                    <div class="col-lg-3 col-md-3  mb-3">
                                                        <label class="form-label infoTitle ">Price is negotiable</label>
                                                        <div class="input-group input-group--sa-slug">
                                                            <!--mt-3-->
                                                            <select class="form-control mtr " wire:model="price_negotiable">
                                                                <option value="">select option</option>
                                                                <option value="0">No</option>
                                                                <option value="1">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--<div class="col-lg-12">
                                                    <label class="form-label infoTitle">How many year Old</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" class="form-control" placeholder="years">
                                                    </div>
                                                @error('years') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="form-label infoTitle">Condition</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" class="form-control" placeholder="condition">
                                                        @error('validity') <p class="text-danger">
                                                            {{$message}}</p>@enderror
                                                    </div>
                                                </div>--}}

                                            <div class="row">
                                                <div class="col-lg-4 col-md-4  mb-3">
                                                    <div class="select-itmss ">
                                                        <label class="infoTitle">Country</label>
                                                        <select class="form-control " wire:model="country_id" wire:change.prevent="changecountry">
                                                            <option value="">Select Country</option>
                                                            @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                        @error('country_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4  mb-3">
                                                    <div class="select-itmss ">
                                                        <label class="infoTitle">State</label>
                                                        <select  class="form-control " wire:model="state_id" wire:change.prevent="changestate" >
                                                            <option value="">Select State</option>
                                                            @foreach($states as $state)
                                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                        @error('state_id') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4  mb-3">
                                                    <div class="select-itmss ">
                                                        <label class="infoTitle">City</label>
                                                        <select  class="form-control" wire:model="city_id">
                                                            <option value="">Select City</option>
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('city_id') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                            </div>
                                            
                                           <div class="row">
                                                {{-- <div class="col-lg-12 col-md-12">
                                                    <div class="condition">
                                                        <h6 class="infoTitle my-2">Get Location cordenat using option</h6>
                                                        <input name="cureent_location" id="different-add" value="1" type="radio" wire:model="cureent_location" wire:click="currentlocation" >
                                                        <label for="html">Current Location</label><br>
                                                        <input name="cureent_location" id="different-add" class="different-add-map" value="1" type="radio" wire:model="click_location" onclick="show2();" >
                                                        <label for="css">Click on map</label><br>
                                            
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div id="map-container"  style="display:none;">
                                                                <div id="mapa" style="overflow: hidden;position: sticky !important;top: 0;"></div>
                                                                </div>

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="row roooo">
                                                    <div class="colss-3">
                                                        <label class="form-label infoTitle my-2">Lat</label>
                                                        <input type="text" name="lat" id="lat" class="long form-control" wire:model="lat" readonly>
                                                    </div>
                                                    <div class="colss-3">
                                                        <label class="form-label infoTitle my-2 seels">Long</label>
                                                        <input type="text" name="long" id="long" class="longs form-control" wire:model="long" readonly>
                                                    </div>
                                                    
                                                </div>--}}
                                                <div class="col-lg-12  mb-3">
                                                    <label class="form-label infoTitle ">Address</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" class="form-control " placeholder="address" wire:model="address">
                                                    </div>
                                                        @error('address') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12  mb-3">
                                                    <label class="form-label infoTitle">ZipCode</label>
                                                    <input type="text" placeholder="Zipcode"
                                                        class="form-control" wire:model="zipcode" />
                                            </div>
                                            @error('zipcode') <p class="text-danger">{{$message}}</p> @enderror
                                            <div class="row">
                                                <div class="col-lg-12  mb-3">
                                                    <label class="infoTitle">Thumbnail Image</label>
                                                    <div class="input-form input-form2">
                                                        <input type="file" placeholder="thumbnail image" wire:model="thumbimage">
                                                        @if($thumbimage)
                                                            <img src="{{$thumbimage->temporaryUrl()}}" width="120" />
                                                        @endif
                                                    </div>
                                                        @error('thumbimage') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-lg-12  mb-3">
                                                    <label class="infoTitle">Featured Image</label>
                                                    <div class="input-form input-form2">
                                                        <input type="file" placeholder="featured image" wire:model= "featimage">
                                                    @if($featimage)
                                                            <img src="{{$featimage->temporaryUrl()}}" width="120" />
                                                        @endif
                                                    </div>
                                                        @error('featimage') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-lg-12  mb-3">
                                                    <label class="infoTitle"> Image</label>
                                                    <div class="input-form input-form2">
                                                        <input type="file" placeholder="image" wire:model="images" multiple>
                                                        @if($images)
                                                            @foreach($images as $image)
                                                                <img src="{{$image->temporaryUrl()}}" width="120" />
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                        @error('images') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-12  mb-3">
                                                    <label class="form-label infoTitle">Meta Tag</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" class="form-control " placeholder="Meta tag" wire:model="meta_keywords" />
                                                    </div>
                                                    @error('meta_keywords') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                                <div class="col-lg-12  mb-3">
                                                    <label class="infoTitle">Meta Description</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <textarea placeholder="Meta description" class="form-control " rows="2" wire:model="meta_description"></textarea>
                                                    </div>
                                                        @error('meta_description') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4col-lg-4 col-md-4col-lg-4 col-md-4 mb-lg-0 mb-md-3">
                                                    <label class="form-label infoTitle">Owner Name</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" class="form-control " placeholder="Owner name" wire:model="owner_name" />
                                                    </div>
                                                    @error('owner_name') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4col-lg-4 col-md-4  mb-3">
                                                    <label class="form-label infoTitle">Contact number</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" class="form-control " placeholder="Contact no" wire:model="contact_number" />
                                                    </div>
                                                        @error('contact_number') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-4  mb-3">
                                                    <label class="form-label infoTitle">Email</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" class="form-control " placeholder="Email" wire:model="email_id" />
                                                    </div>
                                                    @error('email_id') <p class="text-danger">{{$message}}</p>@enderror
                                                </div>
                                                <div class="col-lg-12  mb-3">
                                                    <label class="form-label infoTitle">Exchange For</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" class="form-control " placeholder="Exchange For" wire:model="exchange_for" />
                                                    </div>
                                                    @error('exchange_for') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                             <div class="row">
                                                    <div class="col-md-4  mb-3">
                                                    <div class="mb-4">
                                                        <label class="form-label"> First City</label>
                                                        <select class="form-control" wire:model="city_id1">
                                                            <option value="0">Select City</option>
                                                            @foreach($citiys as $city)
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                        @error('city_id1') <p class="text-danger">{{$message}}</p>@enderror
                                                    </div>
                                                    <div class="col-md-4  mb-3">
                                                    <div class="mb-4">
                                                        <label class="form-label">Second City</label>
                                                        <select class="form-control" wire:model="city_id2">
                                                            <option value="0">Select City</option>
                                                            @foreach($citiys as $city)
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                            @error('city_id2') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4  mb-3">
                                                    <div class="mb-4">
                                                        <label class="form-label">Third City</label>
                                                            <select class="form-control" wire:model="city_id3">
                                                            <option value="0">Select City</option>
                                                            @foreach($citiys as $city)
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                                @error('city_id3') <p class="text-danger">{{$message}}</p>@enderror
                                                    </div>
                                                    </div>
                                                </div>
                                            
                                            
                                            <div class="col-sm-12">
                                                <div class="btn-wrapper mb-10 text-center">
                                                <button  class="btn btn-primary" wire:click.prevent="preview">Preview</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                            
                                        </form>
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<div wire:ignore.self class="modal fade" id="productPreviewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Preview Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label class="form-label">Category:</label>
      <select class="form-control" wire:model="category_id" wire:change="changeSubcategory" disabled>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
      <label class="form-label">Sub Category:</label>
      <select class="form-control" wire:model="scategory_id" wire:change="changeattribute" disabled>
            <option value="0">Select Sub Category</option>
            @foreach($scategories as $scategory)
                <option value="{{$scategory->id}}">{{$scategory->name}}</option>
            @endforeach
        </select>
        @if(isset($brands[0]))
                                                    
                    <label for="form-banner" class="form-label">Brands</label>
                    <div class="col-md-12">
                        <select class="form-control" wire:model="brand_id" disabled>
                            <option value="0">Select Brand Name</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                <label for="form-banner" class="form-label">Brands Model Number </label>
                <div class="col-md-12">
                    <select class="form-control" wire:model="modelnumber_id" disabled>
                        <option value="0">Select Brand Model</option>
                        @foreach($modelnumbers as $modelnumber)
                            <option value="{{$modelnumber->id}}">{{$modelnumber->name}}</option>
                        @endforeach
                    </select>
                </div>
        @endif
        @if(isset($attributes[0]))                                                
            <label for="form-banner" class="form-label">Attributes </label>
                <div class="col-md-12">
                    @foreach($attributes as $key1 => $attribute)
                        <label>{{$attribute->attribute}}</label>
                        <select class="form-control" wire:model="attribute_arr.{{$key1}}" disabled>
                            <option value="0">Select</option>
                            @foreach($attribute->attributeoptions as $attributeoption)
                            <option value="{{$attributeoption->id}}">{{$attributeoption->option_details}}</option>
                            @endforeach
                        </select>
                    @endforeach
                </div>
        @endif
      <label class="form-label">Title:</label>{{$this->name}}<br>
      <label class="form-label">Product Slug:</label>{{$this->slug}}<br>
      <label class="form-label">Short Description:</label>
      <div class="input-group" wire:ignore>
            <textarea class ="form-control" disabled wire:model="short_description"></textarea>
        </div>
      <label class="form-label">Description:</label>
      <div class="input-group" wire:ignore>
            <textarea class ="form-control" disabled wire:model="description"></textarea>
        </div>
      <label class="form-label">Available For Exchange:</label>@if($this->for_exchange) Yes @else No @endif<br>
      <label class="form-label">Available For Rent:</label>@if($this->for_rent) Yes @else No @endif<br>
      <label class="form-label">Avaiable For Sale:</label>@if($this->for_sell) Yes @else No @endif<br>
      <label class="form-label">Price:</label>{{$this->prices}}<br>
      <label class="form-label">Price Range:</label>@if($this->in_range) Yes @else No @endif<br>
        @if($in_range==1)
            <label class="form-label">Range</label>
            <div class="input-group input-group--sa-slug">
                <select class="form-select mt-3" wire:model="price_range" disabled>
                    <option value="">Select Price Range</option>
                    <option value="0">{{($prices*90/100)}} to  {{($prices*110/100)}}</option>
                    <option value="1">{{($prices*85/100)}} to  {{($prices*115/100)}}</option>
                    <option value="2">{{($prices*80/100)}} to  {{($prices*120/100)}}</option>
                    <option value="3">{{($prices*75/100)}} to  {{($prices*125/100)}}</option>
                </select>
            </div>
         @endif
      <label class="form-label">Country:</label>
        <select class="form-control" wire:model="country_id" disabled>
            <option value="0">Select Country</option>
            @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
      <label class="form-label">State:</label>
      <select class="form-control"  wire:model="state_id" disabled>
            <option value="0">Select State</option>
            @foreach($states as $state)
            <option value="{{$state->id}}">{{$state->name}}</option>
            @endforeach
        </select>
      <label class="form-label">City:</label>
      <select class="form-control" wire:model="city_id" disabled >
            <option value="0">Select City</option>
            @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>
      <label class="form-label">Address:</label>{{$this->address}}<br>
      <label class="form-label">Thumbnail Images:</label><br>
            @if($thumbimage)
                <img src="{{$thumbimage->temporaryUrl()}}" width="120" /><br>
            @endif
      <label class="form-label">Featured Images:</label><br>
            @if($featimage)
                <img src="{{$featimage->temporaryUrl()}}" width="120" /><br>
            @endif
      <label class="form-label">Images 4+:</label><br>
      @if($images)
            @foreach($images as $image)
                <img src="{{$image->temporaryUrl()}}" width="120" /><br>
            @endforeach
        @endif
      <label class="form-label">Meta Tag:</label>{{$this->meta_keywords}}<br>
      <label class="form-label">Meta Description:</label>{{$this->meta_description}}<br>
      <label class="form-label">Owner Name:</label>{{$this->owner_name}}<br>
      <label class="form-label">Contact No:</label>{{$this->contact_number}}<br>
      <label class="form-label">Email:</label>{{$this->email_id}}<br>
      <label class="form-label">Exchange For:</label>{{$this->exchange_for}}<br>

     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        <!-- <button type="button" class="btn btn-primary">Save</button> -->
      </div>
    </div>
  </div>
</div>
</div>

@push('scripts')

<script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('openproductPreviewModal', (event) => {
        $('#productPreviewModal').modal('show');
       });
    });
</script>
    <script>
        // function show2(){
        //     // $("#box").hide();
        //     alert("rrr")
        //     document.getElementById('mapa').style.display = 'block';
        //     }

        function show2(){
            // alert("ee")
        // $("#mapa").toggle();
        // alert("rrr")
        document.getElementById('map-container').style.display = 'block';
        }
    </script>


    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5fD8-BwH8kMsjb-HQS_4NG0f7FRcHS4&callback=initMap"></script>

    <script>
        // In the following example, markers appear when the user clicks on the map.
        // The markers are stored in an array.
        // The user can then click an option to hide, show or delete the markers.
        var map;
        var markers = [];

        function initMap() {
            var center = {lat:37.769, lng:-122.446};

            map = new google.maps.Map(document.getElementById('mapa'), {
                zoom: 12,
                center: center,
                mapTypeId: 'terrain'
            });

            // This event listener will call addMarker() when the map is clicked.
            map.addListener('click', function(event) {
                clearMarkers();
                addMarker(event.latLng);
                $('#lat').val(event.latLng.lat());
                $('#long').val(event.latLng.lng());

                @this.set('lat',event.latLng.lat());
                @this.set('long',event.latLng.lng());
               // document.getElementById("text").innerHTML = event.latLng.lat() + ',' + event.latLng.lng();


           
            });


        }

        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#short_description' ) )
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('short_description', editor.getData());
                })
            })
        .catch( error => {
            console.error( error );
        } );
                    
</script>
<script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    
@endpush