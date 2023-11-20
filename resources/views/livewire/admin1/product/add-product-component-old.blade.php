<!-- sa-app__toolbar / end -->
<!-- sa-app__body -->
<div id="top" class="sa-app__body">
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
                        <a href="{{route('admin.products')}}" class="btn btn-primary">All Products</a>
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
                                        @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                        <form class="form-horizontal">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                            </div>

                                            <div class="row">
                                                <div class="sa-example__body">
                                                    <!-- <ul class="nav nav-tabs nav-fill" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="basic-tab-3"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#basic-tab-content-3" type="button"
                                                                role="tab" aria-controls="basic-tab-content-3"
                                                                aria-selected="true">
                                                                Basic<span class="nav-link-sa-indicator"></span>
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="details-tab-3"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#details-tab-content-3" type="button"
                                                                role="tab" aria-controls="details-tab-content-3"
                                                                aria-selected="true">
                                                                Details<span class="nav-link-sa-indicator"></span>
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="location-nav-link-tab-3"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#location-tab-content-3" type="button"
                                                                role="tab"
                                                                aria-controls="location-nav-link-tab-content-3"
                                                                aria-selected="true">
                                                                Location<span class="nav-link-sa-indicator"></span>
                                                            </button>
                                                        </li>

                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="photos-tab-3"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#photo-tab-content-3" type="button"
                                                                role="tab" aria-controls="photos-tab-content-3"
                                                                aria-selected="true">
                                                                Photos/Videos<span class="nav-link-sa-indicator"></span>
                                                            </button>
                                                        </li>

                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="tag-tab-3" data-bs-toggle="tab"
                                                                data-bs-target="#tag-tab-content-3" type="button"
                                                                role="tab" aria-controls="tag-tab-content-3"
                                                                aria-selected="true">
                                                                Tags<span class="nav-link-sa-indicator"></span>
                                                            </button>
                                                        </li>

                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="contact-tab-3"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#contact-tab-content-3" type="button"
                                                                role="tab" aria-controls="contact-tab-content-3"
                                                                aria-selected="true">
                                                                Contact <span class="nav-link-sa-indicator"></span>
                                                            </button>
                                                        </li>

                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="finish-tab-3"
                                                                data-bs-toggle="tab"
                                                                data-bs-target="#finish-tab-content-3" type="button"
                                                                role="tab" aria-controls="finish-tab-content-3"
                                                                aria-selected="true">
                                                                Finish<span class="nav-link-sa-indicator"></span>
                                                            </button>
                                                        </li>
                                                    </ul> -->
                                                    <div class="tab-content mt-4">
                                                        <div class="tab-pane fade show active" id="basic-tab-content-3"
                                                            role="tabpanel" aria-labelledby="basic-tab-3">
                                                            <p class="mb-0">
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label">Category</label>
                                                                <div class="col-md-12">
                                                                    <select class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                                                        <option value="">Select Category</option>
                                                                        @foreach($categories as $category)
                                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label">Sub-Category</label>
                                                                <div class="col-md-12">
                                                                    <select class="form-control" wire:model="scategory_id" wire:change="changeattribute">
                                                                        <option value="0">Select Sub Category</option>
                                                                        @foreach($scategories as $scategory)
                                                                            <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('scategory_id') <p class="text-danger">{{$message}}</p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="form-banner" class="form-label">Brands</label>
                                                                <div class="col-md-12">
                                                                    <select class="form-control" wire:model="brand_id" wire:change="changebrands">
                                                                        <option value="0">Select Brand Name</option>
                                                                        @foreach($brands as $brand)
                                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('brand_id') <p class="text-danger">{{$message}}</p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="form-banner" class="form-label">Brands Model Number </label>
                                                                <div class="col-md-12">
                                                                    <select class="form-control" wire:model="modelnumber_id">
                                                                        <option value="0">Select Brand Name</option>
                                                                        @foreach($modelnumbers as $modelnumber)
                                                                            <option value="{{$modelnumber->id}}">{{$modelnumber->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('modelnumber_id') <p class="text-danger">{{$message}}</p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="form-banner" class="form-label">Attributes </label>
                                                                <div class="col-md-12">
                                                                        @foreach($attributes as $attribute)
                                                                            <label>{{$attribute->attribute}}</label>
                                                                            <select class="form-control" wire:model="attributeoption_id">
                                                                                @foreach($attribute->attributeoptions as $attributeoption)
                                                                                <option value="{{$attributeoption->id}}">{{$attributeoption->option_details}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        @endforeach
                                                                    
                                                                    @error('attribute_id') <p class="text-danger">{{$message}}</p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Title</label>
                                                                <input type="text" placeholder="Title"
                                                                    class="form-control" wire:model="pname" />
                                                                @error('pname') <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Description

                                                                </label>
                                                                <div class="input-group input-group--sa-slug">
                                                                <textarea placeholder="Description" class="form-control mt-3" rows="2"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <div>
                                                                    <label class="form-label">Available for
                                                                        Exchange</label>
                                                                    <div class="input-group input-group--sa-slug">
                                                                        <select class="form-select mt-3">
                                                                            <option selected="">Yes</option>
                                                                            <option>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Next</button>
                                                            </div>
                                                            </p>
                                                        </div>
                                                        <!-- </div> -->
                                                        <div class="tab-pane fade" id="details-tab-content-3"
                                                            role="tabpanel" aria-labelledby="details-tab-3">
                                                            <p class="mb-0">
                                                            <div class="mb-4">
                                                                <label class="form-label">Product Specification</label>
                                                                <input type="text" placeholder="Product Specification"
                                                                    class="form-control" wire:model="pname" />
                                                                @error('pname') <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Product Price</label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <input type="text" placeholder="Product Price"
                                                                        class="form-control" wire:model="ptype" />
                                                                    @error('ptype') <p class="text-danger">{{$message}}
                                                                    </p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <div>
                                                                    <label class="form-label">How many year old</label>
                                                                    <div class="input-group input-group--sa-slug">
                                                                        <input type="text" placeholder="Years"
                                                                            class="form-control" wire:model="price" />
                                                                        @error('price') <p class="text-danger">
                                                                            {{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-4">
                                                                <label for="form-package/validity"
                                                                    class="form-label">Condition</label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <input type="text" placeholder="Product Condition"
                                                                        class="form-control" wire:model="validity" />
                                                                    @error('validity') <p class="text-danger">
                                                                        {{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>



                                                            <div class="mb-4 text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Next</button>
                                                            </div>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="location-tab-content-3"
                                                            role="tabpanel" aria-labelledby="location-tab-3">
                                                            <p class="mb-0">
                                                            <div class="mb-4">
                                                                <label class="form-label">City</label>
                                                                <input type="text" placeholder="City"
                                                                    class="form-control" wire:model="pname" />
                                                                @error('pname') <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Area</label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <input type="text" placeholder="Area"
                                                                        class="form-control" wire:model="ptype" />
                                                                    @error('ptype') <p class="text-danger">{{$message}}
                                                                    </p> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Next</button>
                                                            </div>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="photo-tab-content-3"
                                                            role="tabpanel" aria-labelledby="photo-tab-3">
                                                            <p class="mb-0">
                                                            <div class="mb-4">
                                                            <div class="sa-example__body">
                                                                    <label for="formFile-1" class="form-label">Thumbnail Images</label>
                                                                    <input type="file" class="form-control"
                                                                        id="formFile-1">
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                            <div class="sa-example__body">
                                                                    <label for="formFile-1" class="form-label">Featured Images</label>
                                                                    <input type="file" class="form-control"
                                                                        id="formFile-1">
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <div class="sa-example__body">
                                                                    <label for="formFile-1" class="form-label">Images</label>
                                                                    <input type="file" class="form-control"
                                                                        id="formFile-1">
                                                                </div>
                                                            </div>


                                                            <div class="mb-4 text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Next</button>
                                                            </div>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="tag-tab-content-3"
                                                            role="tabpanel" aria-labelledby="tag-tab-3">
                                                            <p class="mb-0">
                                                            <div class="mb-4">
                                                                <label class="form-label">Meta Tag</label>
                                                                <input type="text" placeholder="Meta Tag"
                                                                    class="form-control" wire:model="pname" />
                                                                @error('pname') <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Meta Description</label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <textarea placeholder="Meta Description"
                                                                        class="form-control mt-3" rows="2"></textarea>
                                                                    @error('ptype') <p class="text-danger">{{$message}}
                                                                    </p> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Next</button>
                                                            </div>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="contact-tab-content-3"
                                                            role="tabpanel" aria-labelledby="contact-tab-3">
                                                            <p class="mb-0">
                                                            <div class="mb-4">
                                                                <label class="form-label">Owner Name</label>
                                                                <input type="text" placeholder="Owner Name"
                                                                    class="form-control" wire:model="pname" />
                                                                @error('pname') <p class="text-danger">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Contact No</label>
                                                                <div class="input-group input-group--sa-slug">
                                                                    <input type="number" placeholder="Contact No" class="form-control" wire:model="ptype" />
                                                                    @error('ptype') <p class="text-danger">{{$message}}
                                                                    </p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <div>
                                                                    <label class="form-label">Email</label>
                                                                    <div class="input-group input-group--sa-slug">
                                                                        <input type="email" placeholder="Email"
                                                                            class="form-control" wire:model="price" />
                                                                        @error('email') <p class="text-danger">
                                                                            {{$message}}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>





                                                            <div class="mb-4 text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Next</button>
                                                            </div>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="finish-tab-content-3"
                                                            role="tabpanel" aria-labelledby="finish-tab-3">
                                                            <p class="mb-0">
                                                            <div class="text-center p-3">
                                                                <h2>Thank You</h2>
                                                                <p>Please Check all information before submission...</p>
                                                            </div>

                                                            <div class="mb-4 text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
















                                            </div>
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


<!-- sa-app__body / end -->
<!-- sa-app__footer -->