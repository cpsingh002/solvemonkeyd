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
                         <h1 class="h3 m-0">Add Category for product</h1>
                     </div>
                     <div class="col-auto d-flex">
                         <a href="{{route('admin.categories')}}" class="btn btn-primary">All Category</a>
                     </div>

                 </div>
             </div>

             <div class="row">
                 <div class="col-md-8 m-auto">
                     <div class="sa-entity-layout">
                         <div class="sa-entity-layout__body">
                             <div class="sa-entity-layout__main">
                                 <div class="card">
                                     <div class="card-body p-5">
                                         @if(Session::has('message'))
                                         <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                         @endif
                                         <form class="form-horizontal" wire:submit.prevent="storeCategory">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-category/name" class="form-label">Category Name</label>
                                                 <input type="text" placeholder="Category Name" class="form-control"
                                                     wire:model="name" wire:keyup="generateslug" />
                                                 @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-category/slug" class="form-label">Category Slug</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="text" placeholder="Category Slug" class="form-control"
                                                         wire:model="slug" />
                                                     @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>
                                             <div class="mb-4">
                                                 <div>
                                                     <label for="form-category/parent-category" class="form-label">Parent
                                                         Category</label>

                                                     <select class="form-select" wire:model="category_id">
                                                         <option value="">None</option>
                                                         @foreach($categories as $category)
                                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-product/icon" class="form-label">Category Icon</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="file" placeholder="Category Icon" class="form-control"
                                                         wire:model="icon" />
                                                         @if($icon)
                                                     <img src="{{$icon->temporaryUrl()}}" width="120" />
                                                     @endif
                                                     @error('icon') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-product/image" class="form-label">Category
                                                     Thumb</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="file" class="input-file" wire:model="categorythum" />
                                                     @if($categorythum)
                                                     <img src="{{$categorythum->temporaryUrl()}}" width="120" />
                                                     @endif
                                                     @error('categorythum') <p class="text-danger">{{$message}}</p>
                                                     @enderror
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