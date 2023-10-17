{{- <div>
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
                                    <input type="text" placeholder="user Name" class="form-control input-md" wire:model="name"  />
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
</div> --}}




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
                         <h1 class="h3 m-0">Add New Testimonial</h1>
                     </div>
                     <div class="col-auto d-flex">
                        <a href="{{route('admin.testimonials')}}" class="btn btn-success"> All Testimonial</a>
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
                                         <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="storeUser">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-category/name" class="form-label">User Name</label>
                                                 <input type="text" placeholder="Category Name" class="form-control"   wire:model="name" />
                                                 @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-category/slug" class="form-label">User Email</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="email" placeholder="User Email" class="form-control"
                                                     wire:model="email" />
                                                     @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>
                                             <div class="mb-4">
                                             <div class="mb-4">
                                                 <label for="form-product/icon" class="form-label">User Phone</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="text" placeholder="Phone" class="form-control"
                                                     wire:model="phone" />
                                                     @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-product/icon" class="form-label">Position</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="text" placeholder="position" class="form-control"
                                                     wire:model="position" />
                                                     @error('position') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-product/image" class="form-label">User Image</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="file" class="input-file" wire:model="image" />
                                                     @if($image)
                                                     <img src="{{$image->temporaryUrl()}}" width="120" />
                                                     @endif
                                                     @error('image') <p class="text-danger">{{$message}}</p>
                                                     @enderror
                                                 </div>
                                             </div>
                                             <div class="mb-4">
                                                <label class="col-md-4 control-label">Short Description</label>
                                                    <div class="col-md-4" wire:ignore>
                                                        <textarea class ="form-control" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                                        @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                             </div>
                                             <div class="mb-4">
                                                <label class="col-md-4 control-label">Star</label>
                                                <div class="col-md-4">
                                                    <input type="number"  class ="form-control" placeholder="5" wire:model="star">
                                                    @error('star') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>

                                             <div class="mb-4 text-center">
                                                 <button type="submit" class="btn btn-primary">Submit</button>
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