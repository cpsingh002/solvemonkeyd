<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    
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
                                        <form class=""  enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="select-itms">
                                                            <label class="infoTitle">Category</label>
                                                            <select name="select" class="niceSelect" wire:model="category_id" wire:change="changeSubcategory"   >
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

                                                            <select name="select" class="niceSelect" wire:model="scategory_id" wire:change="changeattribute">
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
                                                            <select name="select" class="niceSelect">
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
                                                            <select name="select" class="niceSelect">
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
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Title</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="Product Title">
                                                            @error('name') <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Description</label>
                                                        <div class="input-form input-form2">
                                                            <textarea placeholder="Description"></textarea>
                                                        </div>
                                                        @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="select-itms">
                                                            <label class="infoTitle">Available for Exchange</label>
                                                            <select name="select" class="niceSelect">
                                                                <option value>Yes</option>
                                                                <option value>No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="select-itms">
                                                            <label class="infoTitle">Available for Rent</label>
                                                            <select name="select" class="niceSelect">
                                                                <option value>Yes</option>
                                                                <option value>No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="select-itms">
                                                            <label class="infoTitle">Available for Sell</label>
                                                            <select name="select" class="niceSelect">
                                                                <option value>Yes</option>
                                                                <option value>No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                                <!-- </div> -->

                                                <!-- <div  class="tab"> -->
                                                <!-- <div id="details" class="tab-content customTab-content customTab-content-2"> -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Product Specification</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="product specification">
                                                            @error('pname') <p class="text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Product Price</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="product price">
                                                            @error('prices') <p class="text-danger">{{$message}}
                                                            </p> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
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
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="select-itms">
                                                            <label class="infoTitle">Country</label>
                                                            <select name="select" class="niceSelect">
                                                                <option value>Yes</option>
                                                                <option value>No</option>
                                                            </select>
                                                            @error('country_id') <p class="text-danger">{{$message}}</p> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="select-itms">
                                                            <label class="infoTitle">State</label>
                                                            <select name="select" class="niceSelect">
                                                                <option value>Yes</option>
                                                                <option value>No</option>
                                                            </select>
                                                            @error('state_id') <p class="text-danger">{{$message}}</p>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="select-itms">
                                                            <label class="infoTitle">City</label>
                                                            <select name="select" class="niceSelect">
                                                                <option value>Yes</option>
                                                                <option value>No</option>
                                                            </select>
                                                            @error('city_id') <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                                <!-- </div> -->
                                                <!-- </div> -->

                                                <!-- <div  class="tab"> -->

                                                <!-- <div id="location" class="tab-content customTab-content customTab-content-3"> -->
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="condition">
                                                            <h6 class="infoTitle">Get Location cordenat using option
                                                            </h6>
                                                            <div class="cs_radio_btn">
                                                                <div class="radio">
                                                                    <input id="radio-1" name="radio" type="radio"
                                                                        tabindex="0">
                                                                    <label for="radio-1" class="radio-label"> Current
                                                                        Location</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <input id="radio-2" name="radio" type="radio"
                                                                        tabindex="0">
                                                                    <label for="radio-2" class="radio-label">Click on
                                                                        Map</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Address</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                                <!-- </div> -->
                                                <!-- </div> -->

                                                <!-- <div  class="tab"> -->

                                                <!-- <div id="photos" class="tab-content customTab-content customTab-content-4"> -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Thumbnail Image</label>
                                                        <div class="input-form input-form2">
                                                            <input type="file" placeholder="thumbnail image">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Featured Image</label>
                                                        <div class="input-form input-form2">
                                                            <input type="file" placeholder="featured image">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle"> Image</label>
                                                        <div class="input-form input-form2">
                                                            <input type="file" placeholder="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                                <!-- </div> -->

                                                <!-- <div  class="tab"> -->

                                                <!-- <div id="tag" class="tab-content customTab-content customTab-content-5"> -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Meta Tag</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="meta tag">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Meta Description</label>
                                                        <div class="input-form input-form2">
                                                            <textarea placeholder="meta description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Owner Name</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="owner name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Contact No</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="contact no">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Email</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label class="infoTitle">Exchange For</label>
                                                        <div class="input-form input-form2">
                                                            <input type="text" placeholder="exchange For">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                                <!-- </div> -->
                                                <div class="col-sm-12">
                                                    <div class="btn-wrapper mb-10">
                                                        <a href="#" class="cmn-btn4 w-100">Continue</a>
                                                    </div>
                                                </div>

                                                <!-- </div> -->
                                            </form>
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