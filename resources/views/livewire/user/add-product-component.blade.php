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
            <div class="row justify-content-center">
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
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">Category</label>
                                                        <select class="form-control" wire:model="category_id" wire:change="changeSubcategory"   >
                                                            <option value="0">Select Category</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}
                                                            </option>
                                                            @endforeach
                                                            @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">Subcategory</label>

                                                        <select  class="form-control" wire:model="scategory_id" wire:change="changeattribute">
                                                            <option value="0">Select Sub Category</option>
                                                            @foreach($scategories as $scategory)
                                                            <option value="{{$scategory->id}}">{{$scategory->name}}
                                                            </option>
                                                            @endforeach
                                                            @error('scategory_id') <p class="text-danger">{{$message}}</p> @enderror
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">Brand</label>
                                                        <select  class="form-control" wire:model="brand_id" wire:change="changebrands">
                                                            <option value="0">Select Brand Name</option>
                                                            @foreach($brands as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach
                                                            @error('brand_id') <p class="text-danger">{{$message}}</p> @enderror
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">Brand Model Number</label>
                                                        <select name="select" class="form-control" wire:model="modelnumber_id">
                                                            @foreach($modelnumbers as $modelnumber)
                                                            <option value="{{$modelnumber->id}}">
                                                                {{$modelnumber->name}}
                                                            </option>
                                                            @endforeach
                                                            @error('modelnumber_id') <p class="text-danger">{{$message}}</p> @enderror
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                    <label for="form-banner" class="form-label">Attributes </label>
                                                        <div class="col-md-12">
                                                            @foreach($attributes as $key1 => $attribute)
                                                                <label>{{$attribute->attribute}}</label>
                                                                <!-- <input type="hidden" value="{{$attribute->id}}" wire:model="dfh.{{$key1}}"> -->
                                                                <select class="form-control" wire:model="attribute_arr.{{$key1}}" wire:change="changehghg({{$attribute->id}}, {{$key1}})" >
                                                                    @foreach($attribute->attributeoptions as $attributeoption)
                                                                    <option value="{{$attributeoption->id}}">{{$attributeoption->option_details}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @endforeach
                                                        
                                                        @error('attribute_id') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Title</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="Product Title" wire:model="name" wire:keyup="generateslug">
                                                        @error('name') <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="form-category/slug" class="form-label">Product Slug</label>
                                                    <div class="input-group input-group--sa-slug">
                                                        <input type="text" placeholder="Category Slug" class="form-control"
                                                            wire:model="slug" />
                                                        @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Description</label>
                                                    <div class="input-form input-form2" wire:ignore>
                                                        <textarea  id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                                    </div>
                                                    @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for ="infoTitle">Description</label>
                                                    <div class="input-form input-form2" wire:ignore>
                                                        <textarea id="description" placeholder="Description" wire:model="description"></textarea>
                                                    </div>
                                                    @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">Available for Exchange</label>
                                                        <select name="select" class="form-control" wire:model="for_exchange">
                                                            <option value>Yes</option>
                                                            <option value>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">Available for Rent</label>
                                                        <select name="select" class="form-control" wire:model="for_rent">
                                                            <option value>Yes</option>
                                                            <option value>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">Available for Sell</label>
                                                        <select name="select" class="form-control" wire:model="for_sell">
                                                            <option value>Yes</option>
                                                            <option value>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                {{--<div class="col-lg-12">
                                                    <label class="infoTitle">Product Specification</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="product specification">
                                                        @error('pname') <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>--}}
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Product Price</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="product price" wire:model="prices" />
                                                        @error('prices') <p class="text-danger">{{$message}}
                                                        </p> @enderror
                                                    </div>
                                                </div>
                                                {{--<div class="col-lg-12">
                                                    <label class="infoTitle">How many year Old</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="years">
                                                        @error('years') <p class="text-danger">
                                                            {{$message}}</p>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Condition</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="condition">
                                                        @error('validity') <p class="text-danger">
                                                            {{$message}}</p>@enderror
                                                    </div>
                                                </div>--}}
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">Country</label>
                                                        <select class="form-control" wire:model="country_id" wire:change.prevent="changecountry">
                                                            <option value="0">Select Country</option>
                                                            @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('country_id') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">State</label>
                                                        <select  class="form-control" wire:model="state_id" wire:change.prevent="changestate" >
                                                            <option value="0">Select State</option>
                                                            @foreach($states as $state)
                                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('state_id') <p class="text-danger">{{$message}}</p>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="select-itms">
                                                        <label class="infoTitle">City</label>
                                                        <select  class="form-control" wire:model="city_id">
                                                            <option value="0">Select City</option>
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}">{{$city->city}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('city_id') <p class="text-danger">{{$message}}</p>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="condition">
                                                        <h6 class="infoTitle">Get Location cordenat using option</h6>
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
                                                <div class="col-lg-12 col-md-12">
                                                    <label class="infoTitle">ZipCode</label>
                                                    <input type="text" placeholder="Zipcode"
                                                        class="form-control" wire:model="zipcode" />
                                                    @error('zipcode') <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="infoTitle">Lat</label>
                                                        <input type="text" name="lat" id="lat" wire:model="lat" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="infoTitle">Long</label>
                                                        <input type="text" name="long" id="long" wire:model="long" readonly>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Address</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="address">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Thumbnail Image</label>
                                                    <div class="input-form input-form2">
                                                        <input type="file" placeholder="thumbnail image" wire:model="thumbimage">
                                                        @if($thumbimage)
                                                            <img src="{{$thumbimage->temporaryUrl()}}" width="120" />
                                                        @endif
                                                        @error('thumbimage') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Featured Image</label>
                                                    <div class="input-form input-form2">
                                                        <input type="file" placeholder="featured image" wire:model= "featimage">
                                                    @if($featimage)
                                                            <img src="{{$featimage->temporaryUrl()}}" width="120" />
                                                        @endif
                                                        @error('featimage') <p class="text-danger">{{$message}}</p> @enderror
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle"> Image</label>
                                                    <div class="input-form input-form2">
                                                        <input type="file" placeholder="image" wire:model="images" multiple>
                                                        @if($images)
                                                            @foreach($images as $image)
                                                                <img src="{{$image->temporaryUrl()}}" width="120" />
                                                            @endforeach
                                                        @endif
                                                        @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Meta Tag</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="meta tag" wire:model="meta_keywords" />
                                                    @error('meta_keywords') <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Meta Description</label>
                                                    <div class="input-form input-form2">
                                                        <textarea placeholder="meta description" class="form-control mt-3" rows="2" wire:model="meta_description"></textarea>
                                                        @error('meta_description') <p class="text-danger">{{$message}}
                                                        </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Owner Name</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="owner name" wire:model="owner_name" />
                                                    @error('owner_name') <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Contact No</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="contact no" wire:model="contact_number" />
                                                        @error('contact_number') <p class="text-danger">{{$message}}
                                                        </p> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Email</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="email" wire:model="email_id" />
                                                            @error('email_id') <p class="text-danger">
                                                                {{$message}}</p>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="infoTitle">Exchange For</label>
                                                    <div class="input-form input-form2">
                                                        <input type="text" placeholder="exchange For" wire:model="exchange_for" />
                                                            @error('exchange_for') <p class="text-danger">
                                                                {{$message}}</p>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="btn-wrapper mb-10">
                                                <button type="submit"
                                                            class="btn btn-primary">Submit</button>
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
</div>

@push('scripts')


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
    <script src="https://cdn.tiny.cloud/1/5949s82j52s02vlrmcq6l2c2gkzihao5gxjymat25ancman4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(function(){
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush