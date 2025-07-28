<div id="top" class="sa-app__body">
    {{-- <style>
        #mapa{
            position: sticky !important;
            margin-top:2%;
            border-radius:10px;
            height:450px;
        }
    </style> --}}

    <style>
        :root {
            --main-color-one: #F76631;
            --secondary-color: #FBA260;
            --paragraph-color: #4a4a4a;
            --paragraph-color-three: #cfcfcf;
            --paragraph-color-four: #6c757d;
            --bg-light-one: #f9f9f9;
            --bg-light-two: #f0f0f0;
            --white-color: #ffffff;
            --heading-color: #333333;
            --body-font: 'Poppins', sans-serif;
            --heading-font: 'Poppins', sans-serif;
        }

   

        /* Global Layout */
        body,
        html {
            font-family: var(--body-font);
            color: var(--paragraph-color);
            background-color: var(--bg-light-one);
        }

        #mapa {
            position: sticky !important;
            margin-top: 2%;
            border-radius: 10px;
            height: 450px;
            border: 2px solid var(--main-color-one);
        }

        .breadcrumb a {
            color: var(--main-color-one);
        }

        /* Card Style */
        .card-body {
            background-color: var(--white-color);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        /* Labels */
        label {
            color: var(--paragraph-color-four);
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Form Inputs */
        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea,
        .form-control,
        .form-select {
            border-radius: 16px;
            border: 1px solid var(--paragraph-color-three);
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: var(--white-color);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            padding: 0.75rem 1rem;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: var(--main-color-one);
            box-shadow: 0 0 0 3px rgba(247, 102, 49, 0.2);
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--main-color-one), var(--secondary-color));
            border: none;
            padding: 0.75rem 2.5rem;
            border-radius: 50px;
            color: #fff;
            font-weight: 600;
            font-family: var(--heading-font);
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(247, 102, 49, 0.25);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--main-color-one));
            box-shadow: 0 8px 30px rgba(247, 102, 49, 0.3);
        }

        /* Select Dropdown Arrows */
        select.form-control,
        select.form-select {
            appearance: none;
            background-color: var(--white-color);
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 140 140' width='6' height='6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon fill='%23F76631' points='70,105 10,35 130,35'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1.2rem center;
            background-size: 10px 10px;
            padding-right: 2rem;
        }

        select option:checked {
            background-color: var(--main-color-one);
            color: #fff;
        }

        /* File Input */
        input[type="file"] {
            display: none !important;
        }

        .custom-file-upload {
            display: flex;
            align-items: center;
            padding: 1rem;
            border: 1px solid var(--paragraph-color-three);
            border-radius: 16px;
            background-color: var(--white-color);
            color: #6c757d;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            justify-content: center;
        }

        .custom-file-upload:hover {
            background-color: var(--bg-light-two);
            border-color: var(--secondary-color);
            color: var(--secondary-color);
        }

        /* CKEditor */
        .ck-editor__editable_inline {
            min-height: 200px;
            border-radius: 16px !important;
            border: 1px solid var(--paragraph-color-three) !important;
            padding: 1.5rem !important;
            font-family: var(--body-font);
            background-color: var(--white-color);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        .ck-editor__editable_inline:focus {
            border-color: var(--main-color-one) !important;
            box-shadow: 0 0 0 3px rgba(247, 102, 49, 0.15);
        }

        .ck.ck-toolbar {
            background-color: var(--white-color) !important;
            border: 1px solid var(--paragraph-color-three) !important;
            border-radius: 16px 16px 0 0 !important;
            padding: 0.75rem !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .ck.ck-toolbar .ck-button {
            color: var(--heading-color) !important;
            border-radius: 8px !important;
            transition: background-color 0.3s ease;
            padding: 0.4rem 0.6rem;
        }

        .ck.ck-toolbar .ck-button:hover {
            background-color: var(--main-color-one) !important;
            color: var(--white-color) !important;
        }

        .ck.ck-toolbar .ck-button.ck-on {
            background-color: var(--secondary-color) !important;
            color: var(--white-color) !important;
        }

        /* Modal */
        .modal-header {
            background: linear-gradient(135deg, var(--secondary-color), var(--main-color-one)) !important;
            color: white;
            /* border-radius: 12px 12px 0 0; */
        }

        /* Preview Image */
        .preview-image {
            width: 120px;
            border-radius: 12px;
            margin: 5px;
            border: 1px solid var(--paragraph-color-three);
        }
    </style>
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">

                        </nav>
                        <h1 class="h3 m-0">Add Product</h1>
                    </div>
                    <div class="col-auto d-flex">
                        <a href="{{ route('admin.products') }}" class="btn btn-primary">All Products</a>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="sa-entity-layout">
                        <div class="sa-entity-layout__body">
                            <div class="sa-entity-layout__main">
                                <div class="card">
                                    <div class="card-body p-5">
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('message') }}</div>
                                        @endif
                                        <form class="form-horizontal" enctype="multipart/form-data"
                                            wire:submit.prevent="addProduct">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                            </div>

                                            <div class="row">
                                                <div class="sa-example__body py-0">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label class="form-label">Category<span
                                                                        class="text-danger"> *</span></label>
                                                                <div class="col-md-12">
                                                                    <select class="form-control color"
                                                                        wire:model="category_id"
                                                                        wire:change="changeSubcategory">
                                                                        <option value="">Select Category</option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('category_id')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group  mb-4">
                                                                <label class="form-label">Sub-Category<span class="text-danger"> *</span></label>
                                                                <div class="col-md-12">
                                                                    <select class="form-control color"
                                                                        wire:model="scategory_id"
                                                                        wire:change="changeattribute">
                                                                        <option value="0">Select Sub Category
                                                                        </option>
                                                                        @foreach ($scategories as $scategory)
                                                                            <option value="{{ $scategory->id }}">
                                                                                {{ $scategory->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('scategory_id')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (isset($brands[0]))
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class=" inputed">
                                                                    <label for="form-banner"
                                                                        class="form-label">Brands<span class="text-danger">*</span></label>
                                                                    <div class="col-md-12">
                                                                        <select class="form-control"
                                                                            wire:model="brand_id"
                                                                            wire:change="changebrands">
                                                                            <option value="0">Select Brand Name
                                                                            </option>
                                                                            @foreach ($brands as $brand)
                                                                                <option value="{{ $brand->id }}">
                                                                                    {{ $brand->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    @error('brand_id')
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class=" inputed">
                                                                    <label for="form-banner" class="form-label">Brands
                                                                        Model Number <span class="text-danger">*</span></label>
                                                                    <div class="col-md-12">
                                                                        <select class="form-control"
                                                                            wire:model="modelnumber_id">
                                                                            <option value="0">Select Brand Model
                                                                            </option>
                                                                            @foreach ($modelnumbers as $modelnumber)
                                                                                <option value="{{ $modelnumber->id }}">
                                                                                    {{ $modelnumber->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    @error('modelnumber_id')
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if (isset($attributes[0]))
                                                        <div class="mb-4">
                                                            <label for="form-banner" class="form-label">Attributes
                                                            </label>
                                                            <div class="col-md-12  ">
                                                                @foreach ($attributes as $key1 => $attribute)
                                                                    <label>{{ $attribute->attribute }}<span class="text-danger"> *</span></label>
                                                                    <!-- <input type="hidden" value="{{ $attribute->id }}" wire:model="dfh.{{ $key1 }}"> -->
                                                                    <select class="form-control inputed"
                                                                        wire:model="attribute_arr.{{ $key1 }}"
                                                                        wire:change="changehghg({{ $attribute->id }}, {{ $key1 }})"
                                                                        required>
                                                                        <option value="0">Select</option>
                                                                        @foreach ($attribute->attributeoptions as $attributeoption)
                                                                            <option value="{{ $attributeoption->id }}">
                                                                                {{ $attributeoption->option_details }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                @endforeach

                                                            </div>
                                                            @error('attribute_arr')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    @endif
                                                    <div class="mb-4">
                                                        <label class="form-label">Title<span class="text-danger">
                                                                *</span></label>
                                                        <input type="text" placeholder="Title" class="form-control"
                                                            wire:model="name" wire:keyup="generateslug" />
                                                    </div>
                                                    @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <div class="mb-4">
                                                        <label for="form-category/slug" class="form-label">Product
                                                            Slug<span class="text-danger"> *</span></label>
                                                        <div class="input-group input-group--sa-slug">
                                                            <input type="text" placeholder="Product Slug"
                                                                class="form-control" wire:model="slug" />
                                                        </div>
                                                        @error('slug')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="control-label">Short Description<span
                                                                class="text-danger"> *</span></label>
                                                        <div wire:ignore>
                                                            <textarea class ="form-control" id="short_description" placeholder="Short Description"
                                                                wire:model="short_description">{!! $short_description !!}</textarea>
                                                        </div>
                                                        @error('short_description')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="control-label">Description<span
                                                                class="text-danger"> *</span></label>
                                                        <div wire:ignore>
                                                            <textarea class ="form-control" id="description" placeholder="Description" wire:model="description">{!! $description !!}</textarea>
                                                        </div>
                                                        @error('description')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">Available for
                                                                    Exchange<span class="text-danger"> *</span></label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <select class="form-select mt-3"
                                                                        wire:model="for_exchange">
                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">Available for
                                                                    Rent<span class="text-danger"> *</span></label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <select class="form-select mt-3"
                                                                        wire:model="for_rent">
                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">Available for
                                                                    Sell<span class="text-danger"> *</span></label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <select class="form-select mt-3"
                                                                        wire:model="for_sell">
                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="mb-4">
                                                            <label class="form-label">Product Specification</label>
                                                            <input type="text" placeholder="Product Specification"
                                                                class="form-control" wire:model="pname" />
                                                            @error('pname') <p class="text-danger">{{$message}}</p>
                                                            @enderror
                                                    </div> --}}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-4 ">
                                                                <label class="form-label">Price<span
                                                                        class="text-danger"> *</span></label>
                                                                <div class="input-group input-group--sa-slug inputed">
                                                                    <input type="text" placeholder="Product Price"
                                                                        class="form-control" wire:model="prices" />
                                                                </div>
                                                                @error('prices')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-4 ">
                                                                <label class="form-label">Price in range<span
                                                                        class="text-danger"> *</span></label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <select class="form-select" wire:model="in_range"
                                                                        wire:change="ranges">
                                                                        <option value="0">No</option>
                                                                        <option value="1">Yes</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($in_range == 1)
                                                        <div class="col-md-6">
                                                            <div class="mb-4 ">
                                                                    <label class="form-label">Range<span class="text-danger">*</span></label>
                                                                    <div class="input-group input-group--sa-slug">
                                                                        <select class="form-select "
                                                                            wire:model="price_range">
                                                                            <option value="">Select Price Range
                                                                            </option>
                                                                            <option value="1">
                                                                                {{ ($prices * 90) / 100 }} to
                                                                                {{ ($prices * 110) / 100 }}</option>
                                                                            <option value="2">
                                                                                {{ ($prices * 85) / 100 }} to
                                                                                {{ ($prices * 115) / 100 }}</option>
                                                                            <option value="3">
                                                                                {{ ($prices * 80) / 100 }} to
                                                                                {{ ($prices * 120) / 100 }}</option>
                                                                            <option value="4">
                                                                                {{ ($prices * 75) / 100 }} to
                                                                                {{ ($prices * 125) / 100 }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        <div class="col-md-6">
                                                            <div class="mb-4">
                                                                <label class="form-label">Price is negotiable<span class="text-danger">*</span> </label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <select class="form-select "
                                                                        wire:model="price_negotiable">
                                                                        <option value="">Select Option</option>
                                                                        <option value="0">No</option>
                                                                        <option value="1">Yes</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">Country<span
                                                                        class="text-danger"> *</span></label>
                                                                <select class="form-control color"
                                                                    wire:model="country_id"
                                                                    wire:change.prevent="changecountry">
                                                                    <option value="0">Select Country</option>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ $country->id }}">
                                                                            {{ $country->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('country_id')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">State<span
                                                                        class="text-danger"> *</span></label>
                                                                <select class="form-control color"
                                                                    wire:model="state_id"
                                                                    wire:change.prevent="changestate">
                                                                    <option value="0">Select State</option>
                                                                    @foreach ($states as $state)
                                                                        <option value="{{ $state->id }}">
                                                                            {{ $state->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('state_id')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">City<span
                                                                        class="text-danger"> *</span></label>
                                                                <select class="form-control color"
                                                                    wire:model="city_id">
                                                                    <option value="0">Select City</option>
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city->id }}">
                                                                            {{ $city->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('city_id')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- <div class='inputed'>
                                                        <p>Get Location cordenat using option</p>
                                                                        
                                                        <input name="cureent_location" id="different-add" value="1" type="radio" wire:model="cureent_location" wire:click="currentlocation" >
                                                        <label for="html">Current Location</label><br>
                                                        <input name="cureent_location " id="different-add" class="different-add-map" value="1" type="radio" wire:model="click_location" onclick="show2();" >
                                                        <label for="css">Click on map</label><br>
                                                    </div> --}}
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="map-container" style="display:none;">
                                                                <div id="mapa"
                                                                    style="overflow: hidden;position: sticky !important;top: 0;">
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>


                                                    {{-- <input type="text" name="lat" id="lat" wire:model="lat" readonly>
                                                    <input type="text" name="long" id="long" wire:model="long" readonly> --}}

                                                    <div class="mb-4">
                                                        <label class="form-label">Address<span class="text-danger">
                                                                *</span></label>
                                                        <div class="input-group input-group--sa-slug">
                                                            <input type="text" placeholder="Address"
                                                                class="form-control" wire:model="address" />
                                                        </div>
                                                        @error('address')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-4">
                                                        <label class="form-label">ZipCode<span class="text-danger">
                                                                *</span></label>
                                                        <input type="text" placeholder="Zipcode"
                                                            class="form-control" wire:model="zipcode" />
                                                    </div>
                                                    @error('zipcode')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    {{-- <div class="mb-4">
                                                        <label for="formFile-1" class="form-label">Thumbnail Images (JPEG, JPG, PNG)<span class="text-danger"> *</span></label>
                                                        <input type="file" class="form-control"  id="formFile-1" wire:model="thumbimage">
                                                            @if ($thumbimage)
                                                                <img src="{{$thumbimage->temporaryUrl()}}" width="120" />
                                                            @endif
                                                    </div> --}}
                                                    <div class="mb-4">
                                                        <label for="formFile-1" class="form-label">
                                                            Thumbnail Image (JPEG, JPG, PNG)<span class="text-danger">
                                                                *</span>
                                                        </label>

                                                        <!-- Styled Upload Button -->
                                                        <label for="formFile-1" class="custom-file-upload">
                                                            📁 Click to Upload Thumbnail
                                                        </label>

                                                        <!-- Hidden File Input -->
                                                        <input type="file" id="formFile-1"
                                                            wire:model="thumbimage" />

                                                        <!-- Preview -->
                                                        @if ($thumbimage)
                                                            <img src="{{ $thumbimage->temporaryUrl() }}"
                                                                class="preview-image" />
                                                        @endif
                                                    </div>

                                                    @error('thumbimage')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    {{-- <div class="mb-4">
                                                        <label for="formFile-1" class="form-label">Featured Images (JPEG, JPG, PNG)<span class="text-danger"> *</span></label>
                                                        <input type="file" class="form-control" id="formFile-2" wire:model= "featimage">
                                                        @if ($featimage)
                                                                <img src="{{$featimage->temporaryUrl()}}" width="120" />
                                                            @endif
                                                    </div> --}}
                                                    <div class="mb-4">
                                                        <label for="formFile-2" class="form-label">
                                                            Featured Images (JPEG, JPG, PNG)<span class="text-danger">
                                                                *</span>
                                                        </label>

                                                        <!-- Styled Upload Button -->
                                                        <label for="formFile-2" class="custom-file-upload">
                                                            📁 Click to Upload Featured Image
                                                        </label>

                                                        <!-- Hidden File Input -->
                                                        <input type="file" id="formFile-2"
                                                            wire:model="featimage" />

                                                        <!-- Image Preview -->
                                                        @if ($featimage)
                                                            <img src="{{ $featimage->temporaryUrl() }}"
                                                                class="preview-image" />
                                                        @endif
                                                    </div>

                                                    @error('featimage')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    {{-- <div class="mb-4">
                                                            <label for="formFile-1" class="form-label">Images 4+ (JPEG, JPG, PNG)<span class="text-danger"> *</span></label>
                                                            <input type="file" class="form-control" id="formFile-3" wire:model="images" multiple>
                                                            @if ($images)
                                                                @foreach ($images as $image)
                                                                    <img src="{{$image->temporaryUrl()}}" width="120" />
                                                                @endforeach
                                                            @endif
                                                    </div> --}}
                                                    <div class="mb-4">
                                                        <label for="formFile-3" class="form-label">
                                                            Images 4+ (JPEG, JPG, PNG)<span class="text-danger">
                                                                *</span>
                                                        </label>

                                                        <!-- Styled Upload Button -->
                                                        <label for="formFile-3" class="custom-file-upload">
                                                            📁 Click to Upload Multiple Images
                                                        </label>

                                                        <!-- Hidden File Input -->
                                                        <input type="file" id="formFile-3" wire:model="images"
                                                            multiple />

                                                        <!-- Preview for Each Image -->
                                                        @if ($images)
                                                            <div class="d-flex flex-wrap gap-2 mt-2">
                                                                @foreach ($images as $image)
                                                                    <img src="{{ $image->temporaryUrl() }}"
                                                                        class="preview-image" />
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>

                                                    @error('image')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <div class="mb-4">
                                                        <label class="form-label">Meta Tag<span class="text-danger">
                                                                *</span></label>
                                                        <input type="text" placeholder="Meta Tag"
                                                            class="form-control" wire:model="meta_keywords" />
                                                    </div>
                                                    @error('meta_keywords')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <div class="mb-4">
                                                        <label class="form-label">Meta Description<span
                                                                class="text-danger"> *</span></label>
                                                        <div class="input-group input-group--sa-slug">
                                                            <textarea placeholder="Meta Description" class="form-control " rows="2" wire:model="meta_description"></textarea>
                                                        </div>
                                                        @error('meta_description')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">Owner Name<span
                                                                        class="text-danger"> *</span></label>
                                                                <input type="text" placeholder="Owner Name"
                                                                    class="form-control" wire:model="owner_name" />
                                                            </div>
                                                            @error('owner_name')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">Contact No<span
                                                                        class="text-danger"> *</span></label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <input type="number" placeholder="Contact No"
                                                                        class="form-control"
                                                                        wire:model="contact_number" />
                                                                </div>
                                                                @error('contact_number')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">Email<span
                                                                        class="text-danger"> *</span></label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <input type="email" placeholder="email_id"
                                                                        class="form-control" wire:model="email_id" />
                                                                </div>
                                                                @error('email_id')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label"> First City</label>
                                                                <select class="form-control" wire:model="city_id1">
                                                                    <option value="0">Select City</option>
                                                                    @foreach ($citiys as $city)
                                                                        <option value="{{ $city->id }}">
                                                                            {{ $city->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('city_id1')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">Second City</label>
                                                                <select class="form-control" wire:model="city_id2">
                                                                    <option value="0">Select City</option>
                                                                    @foreach ($citiys as $city)
                                                                        <option value="{{ $city->id }}">
                                                                            {{ $city->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('city_id2')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4">
                                                                <label class="form-label">Third City</label>
                                                                <select class="form-control" wire:model="city_id3">
                                                                    <option value="0">Select City</option>
                                                                    @foreach ($citiys as $city)
                                                                        <option value="{{ $city->id }}">
                                                                            {{ $city->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('city_id3')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label class="form-label">Exchange For<span
                                                                class="text-danger"> *</span></label>
                                                        <div class="input-group input-group--sa-slug">
                                                            <input type="test" placeholder="" class="form-control"
                                                                wire:model="exchange_for" />
                                                        </div>
                                                        @error('exchange_for')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-4 text-center">
                                                        <button class="btn btn-primary"
                                                            wire:click.prevent="preview">Preview</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>



                                                </div>
                                        </form>
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ Session::get('message') }}</div>
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
    <!-- // modal for product preview -->

    {{-- <div wire:ignore.self class="modal fade" id="productPreviewModal" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label">Sub Category:</label>
                    <select class="form-control" wire:model="scategory_id" wire:change="changeattribute" disabled>
                        <option value="0">Select Sub Category</option>
                        @foreach ($scategories as $scategory)
                            <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                        @endforeach
                    </select>
                    @if (isset($brands[0]))

                        <label for="form-banner" class="form-label">Brands</label>
                        <div class="col-md-12">
                            <select class="form-control" wire:model="brand_id" disabled>
                                <option value="0">Select Brand Name</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="form-banner" class="form-label">Brands Model Number </label>
                        <div class="col-md-12">
                            <select class="form-control" wire:model="modelnumber_id" disabled>
                                <option value="0">Select Brand Model</option>
                                @foreach ($modelnumbers as $modelnumber)
                                    <option value="{{ $modelnumber->id }}">{{ $modelnumber->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if (isset($attributes[0]))
                        <label for="form-banner" class="form-label">Attributes </label>
                        <div class="col-md-12">
                            @foreach ($attributes as $key1 => $attribute)
                                <label>{{ $attribute->attribute }}</label>
                                <select class="form-control" wire:model="attribute_arr.{{ $key1 }}" disabled>
                                    <option value="0">Select</option>
                                    @foreach ($attribute->attributeoptions as $attributeoption)
                                        <option value="{{ $attributeoption->id }}">
                                            {{ $attributeoption->option_details }}</option>
                                    @endforeach
                                </select>
                            @endforeach
                        </div>
                    @endif
                    <label class="form-label">Title:</label>{{ $this->name }}<br>
                    <label class="form-label">Product Slug:</label>{{ $this->slug }}<br>
                    <label class="form-label">Short Description:</label>
                    <div class="input-group" wire:ignore>
                        <textarea class ="form-control" disabled>{{ $this->short_description }}</textarea>
                    </div>
                    <label class="form-label">Description:</label>
                    <div class="input-group" wire:ignore>
                        <textarea class ="form-control" disabled>{{ $this->description }}</textarea>
                    </div>
                    <label class="form-label">Available For Exchange:</label>
                    @if ($this->for_exchange)
                        Yes
                    @else
                        No
                    @endif
                    <br>
                    <label class="form-label">Available For Rent:</label>
                    @if ($this->for_rent)
                        Yes
                    @else
                        No
                    @endif
                    <br>
                    <label class="form-label">Avaiable For Sale:</label>
                    @if ($this->for_sell)
                        Yes
                    @else
                        No
                    @endif
                    <br>
                    <label class="form-label">Price:</label>{{ $this->prices }}<br>
                    <label class="form-label">Price Range:</label>
                    @if ($this->in_range)
                        Yes
                    @else
                        No
                    @endif
                    <br>
                    @if ($in_range == 1)
                        <label class="form-label">Range</label>
                        <div class="input-group input-group--sa-slug">
                            <select class="form-select mt-3" wire:model="price_range" disabled>
                                <option value="">Select Price Range</option>
                                <option value="0">{{ ($prices * 90) / 100 }} to {{ ($prices * 110) / 100 }}</option>
                                <option value="1">{{ ($prices * 85) / 100 }} to {{ ($prices * 115) / 100 }}</option>
                                <option value="2">{{ ($prices * 80) / 100 }} to {{ ($prices * 120) / 100 }}</option>
                                <option value="3">{{ ($prices * 75) / 100 }} to {{ ($prices * 125) / 100 }}</option>
                            </select>
                        </div>
                    @endif
                    <label class="form-label">Country:</label>
                    <select class="form-control" wire:model="country_id" disabled>
                        <option value="0">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label">State:</label>
                    <select class="form-control" wire:model="state_id" disabled>
                        <option value="0">Select State</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label">City:</label>
                    <select class="form-control" wire:model="city_id" disabled>
                        <option value="0">Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label">Address:</label>{{ $this->address }}<br>
                    <label class="form-label">Thumbnail Images:</label><br>
                    @if ($thumbimage)
                        <img src="{{ $thumbimage->temporaryUrl() }}" width="120" /><br>
                    @endif
                    <label class="form-label">Featured Images:</label><br>
                    @if ($featimage)
                        <img src="{{ $featimage->temporaryUrl() }}" width="120" /><br>
                    @endif
                    <label class="form-label">Images 4+:</label><br>
                    @if ($images)
                        @foreach ($images as $image)
                            <img src="{{ $image->temporaryUrl() }}" width="120" /><br>
                        @endforeach
                    @endif
                    <label class="form-label">Meta Tag:</label>{{ $this->meta_keywords }}<br>
                    <label class="form-label">Meta Description:</label>{{ $this->meta_description }}<br>
                    <label class="form-label">Owner Name:</label>{{ $this->owner_name }}<br>
                    <label class="form-label">Contact No:</label>{{ $this->contact_number }}<br>
                    <label class="form-label">Email:</label>{{ $this->email_id }}<br>
                    <label class="form-label">Exchange For:</label>{{ $this->exchange_for }}<br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    <!-- <button type="button" class="btn btn-primary">Save</button> -->
                </div>
            </div>
        </div>
    </div> --}} 
      <div wire:ignore.self class="modal fade" id="productPreviewModal" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content shadow-lg">
                <div class="modal-header  text-white">
                    <h5 class="modal-title text-white" id="staticBackdropLabel">Preview Product</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Basic Info -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label ">Category<span class="text-danger">*</span></label>
                            <select class="form-control" wire:model="category_id" disabled>
                                <option>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sub Category<span class="text-danger">*</span></label>
                            <select class="form-control" wire:model="scategory_id" disabled>
                                <option>Select Sub Category</option>
                                @foreach ($scategories as $scategory)
                                    <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if (isset($brands[0]))
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Brand<span class="text-danger">*</span></label>
                                <select class="form-control" wire:model="brand_id" disabled>
                                    <option>Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Brand Model<span class="text-danger">*</span></label>
                                <select class="form-control" wire:model="modelnumber_id" disabled>
                                    <option>Select Model</option>
                                    @foreach ($modelnumbers as $modelnumber)
                                        <option value="{{ $modelnumber->id }}">{{ $modelnumber->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    <!-- Attributes -->
                    @if (isset($attributes[0]))
                        <div class="mb-4">
                            <label class="form-label ">Attributes </label>
                            <div class="row">
                                @foreach ($attributes as $key1 => $attribute)
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">{{ $attribute->attribute }}<span class="text-danger">*</span></label>
                                        <select class="form-control" wire:model="attribute_arr.{{ $key1 }}"
                                            disabled>
                                            <option value="0">Select</option>
                                            @foreach ($attribute->attributeoptions as $attributeoption)
                                                <option value="{{ $attributeoption->id }}">
                                                    {{ $attributeoption->option_details }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Product Info -->
                    <div class="mb-3">
                        <p> Title:  {{ $this->name }}</p>
                        <p>Slug:  {{ $this->slug }}</p>
                        <p>Short Description: </p>
                        <textarea class="form-control mb-2" disabled>{{ $this->short_description }}</textarea>
                        <p> Description: </p>
                        <textarea class="form-control" rows="3" disabled>{{ $this->description }}</textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 my-3"> Exchange:  {{ $this->for_exchange ? 'Yes' : 'No' }}
                        </div>
                        <div class="col-md-4 my-3"> Rent:  {{ $this->for_rent ? 'Yes' : 'No' }}</div>
                        <div class="col-md-4 my-3"> Sell:  {{ $this->for_sell ? 'Yes' : 'No' }}</div>
                    </div>

                    <div class="mb-3">
                        <p> Price:  ₹{{ $this->prices }}</p>
                        <p> In Price Range:  {{ $this->in_range ? 'Yes' : 'No' }}</p>
                        @if ($in_range)
                            <label class="form-label">Select Price Range:</label>
                            <select class="form-control mt-2" wire:model="price_range" disabled>
                                <option value="">Select Price Range</option>
                                <option value="0">{{ ($prices * 90) / 100 }} to {{ ($prices * 110) / 100 }}
                                </option>
                                <option value="1">{{ ($prices * 85) / 100 }} to {{ ($prices * 115) / 100 }}
                                </option>
                                <option value="2">{{ ($prices * 80) / 100 }} to {{ ($prices * 120) / 100 }}
                                </option>
                                <option value="3">{{ ($prices * 75) / 100 }} to {{ ($prices * 125) / 100 }}
                                </option>
                            </select>
                        @endif
                    </div>

                    <!-- Location Info -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label ">Country</label>
                            <select class="form-control" wire:model="country_id" disabled>
                                <option>Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label ">State</label>
                            <select class="form-control" wire:model="state_id" disabled>
                                <option>Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label ">City</label>
                            <select class="form-control" wire:model="city_id" disabled>
                                <option>Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <p> Address:  {{ $this->address }}</p>

                    <!-- Images -->
                    <div class="mb-3">
                        <label class="form-label ">Images</label><br>
                        @if ($thumbimage)
                            <p>Thumbnail:</p>
                            <img src="{{ $thumbimage->temporaryUrl() }}" width="120" class="me-2 mb-2" />
                        @endif
                        @if ($featimage)
                            <p>Featured:</p>
                            <img src="{{ $featimage->temporaryUrl() }}" width="120" class="me-2 mb-2" />
                        @endif
                        @if ($images)
                            <p>Gallery:</p>
                            @foreach ($images as $image)
                                <img src="{{ $image->temporaryUrl() }}" width="120" class="me-2 mb-2" />
                            @endforeach
                        @endif
                    </div>

                    <!-- Meta & Contact -->
                    <div class="mb-3">
                        <p> Meta Tag:  {{ $this->meta_keywords }}</p>
                        <p> Meta Description:  {{ $this->meta_description }}</p>
                        <p> Owner Name:  {{ $this->owner_name }}</p>
                        <p> Contact No:  {{ $this->contact_number }}</p>
                        <p> Email:  {{ $this->email_id }}</p>
                        <p> Exchange For:  {{ $this->exchange_for }}</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- sa-app__body / end -->
<!-- sa-app__footer -->

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

        function show2() {
            // alert("ee")
            // $("#mapa").toggle();
            // alert("rrr")
            document.getElementById('map-container').style.display = 'block';
        }
    </script>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5fD8-BwH8kMsjb-HQS_4NG0f7FRcHS4&callback=initMap"></script>

    <script>
        // In the following example, markers appear when the user clicks on the map.
        // The markers are stored in an array.
        // The user can then click an option to hide, show or delete the markers.
        var map;
        var markers = [];

        function initMap() {
            var center = {
                lat: 37.769,
                lng: -122.446
            };

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

                @this.set('lat', event.latLng.lat());
                @this.set('long', event.latLng.lng());
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
        ClassicEditor.create(document.querySelector('#short_description'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('short_description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
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
