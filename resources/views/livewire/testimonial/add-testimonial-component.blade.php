<div>
    <div class= "container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Testimonial
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.testimonials')}}" class="btn btn-success"> All Testimonial</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="storeUser">
                            <div class="form-group">
                                <label class="col-md-4 control-label"> Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name"  />
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="Email" placeholder="Category Slug" class="form-control input-md"  wire:model="email"/>
                                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Icon" class="form-control input-md"  wire:model="phone"/>
                                    @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Position</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Icon" class="form-control input-md"  wire:model="position"/>
                                    @error('position') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type ="file" class ="input-file" wire:model="image"/>
                                    @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" />
                                    @endif
                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class ="form-control" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                    @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Star</label>
                                <div class="col-md-4">
                                    <input type="number"  class ="form-control" placeholder="5" wire:model="star">
                                    @error('star') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            

                            
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