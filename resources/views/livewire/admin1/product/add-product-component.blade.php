<div>
    <div class= "container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success"> All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md" />
                                    <!-- @error('pname') <p class="text-danger">{{$message}}</p> @enderror -->
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="form-product/category" class="form-label">Category</label>
                                <select  class="form-select">
                                    <option>Electronics</option>
                                    <option selected="">Fashion</option>
                                    <option>Real State</option>
                                    <option>Mobile Phones</option>
                                    
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="form-product/sub-category" class="form-label">Sub Category</label>
                                <select  class="form-select">
                                    <option>Electronics</option>
                                    <option selected="">Fashion</option>
                                    <option>Real State</option>
                                    <option>Mobile Phones</option>
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Price" class="form-control input-md"  />
                                    <!-- @error('validity') <p class="text-danger">{{$message}}</p> @enderror -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Thumbnail Image</label>
                                <div class="col-md-4">
                                    <input type="file"  class="form-control input-md" wire:model="up_to">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Gallery Image</label>
                                <div class="col-md-4">
                                    <input type="text" id="sale-date" placeholder="YYYY/MM/DD hh:mm:ss" class="form-control input-md" wire:model="up_to">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="form-product/description" class="form-label">Description</label>
                                <textarea class="form-control"  rows="4">Product Description</textarea></div>


                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

