<div>
    <div class= "container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Product
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-success"> All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateProduct">
                        <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="pname" />
                                    <!-- @error('pname') <p class="text-danger">{{$message}}</p> @enderror -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Type" class="form-control input-md"  wire:model="ptype"/>
                                    <!-- @error('ptype') <p class="text-danger">{{$message}}</p> @enderror -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sub Category</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Price" class="form-control input-md"  wire:model="price"/>
                                    <!-- @error('price') <p class="text-danger">{{$message}}</p> @enderror -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Package Validity" class="form-control input-md"  wire:model="validity"/>
                                    @error('validity') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="text" id="sale-date" placeholder="YYYY/MM/DD hh:mm:ss" class="form-control input-md" wire:model="up_to">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Gallery Image</label>
                                <div class="col-md-4">
                                    <input type="text" id="sale-date" placeholder="YYYY/MM/DD hh:mm:ss" class="form-control input-md" wire:model="up_to">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Description</label>
                                <div class="col-md-4">
                                    <input type="text" id="sale-date" placeholder="YYYY/MM/DD hh:mm:ss" class="form-control input-md" wire:model="up_to">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

