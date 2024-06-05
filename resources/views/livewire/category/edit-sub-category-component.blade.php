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
                         <h1 class="h3 m-0">Edit Sub-Category</h1>
                     </div>
                     <div class="col-auto d-flex">
                         <a href="{{route('admin.subcategories')}}" class="btn btn-primary">All Sub-Categories</a>
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

                                         <form class="form-horizontal" wire:submit.prevent="updateCategory">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-category/name" class="form-label">Sub-Category Name<span class="text-danger"> *</span></label>
                                                 <input type="text" placeholder="Sub-category Name" class="form-control"
                                                 wire:model="name" wire:keyup="generateslug" />
                                                     @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-category/slug" class="form-label">Sub-Category Slug<span class="text-danger"> *</span></label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input class="form-control input-md" type="text" placeholder="Sub-category Slug" class="form-control"
                                                         wire:model="slug" />
                                                 </div>
                                                         @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <div>
                                                     <label for="form-category/parent-category" class="form-label">Parent
                                                         Category<span class="text-danger"> *</span></label>

                                                     <select class="form-control input-md" wire:model="category_id">
                                                         <option value="">None</option>
                                                         @foreach($categories as $category)
                                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                                     @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="form-group mb-4">
                                <label class=" control-label form-label">Sub-Category Icon (JPEG,JPG,PNG)<span class="text-danger"> *</span></label>
                                <div class="col-md-4">
                                    <input type="file" placeholder="Category Icon" class="  input-file mb-4"  wire:model="newicon"/>
                                    @if($newicon)
                                         <img src="{{$newicon->temporaryUrl()}}" width="120" /> 
                                    @else
                                        <img src="{{asset('admin/category/icon')}}/{{$icon}}" width="120" />
                                    @endif
                                </div>
                                    @error('newicon') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class=" control-label form-label">Sub-Category Thumbnail Image (JPEG,JPG,PNG)<span class="text-danger"> *</span></label>
                                <div class="col-md-4">
                                    <input type ="file" class ="input-file mb-4" wire:model="newimage"/>
                                    @if($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                    @else
                                        <img src="{{asset('admin/category')}}/{{$categorythum}}" width="120" />
                                    @endif
                                </div>
                                    @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                                          <div class="mb-4">
                                                 <div>
                                                     <label for="form-category/parent-category" class="form-label">For Showing in Footer
                                                         </label>

                                                     <select class="form-select" wire:model="is_home">
                                                         <option value="">Select</option>
                                                         <option value="1">Yes</option>
                                                         <option value="0">No</option>
                                                     </select>
                                                     @error('is_home') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>

                                             <div class="mb-4 text-center">
                                                 <button type="submit" class="btn btn-primary">Update</button>
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