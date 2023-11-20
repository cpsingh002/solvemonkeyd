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
                         <h1 class="h3 m-0">Edit Attribute</h1>
                     </div>
                     <div class="col-auto d-flex">
                         <a href="{{route('admin.attributes')}}" class="btn btn-primary">All Attributes</a>
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
                                         <form class="form-horizontal" enctype="multipart/form-data"
                                             wire:submit.prevent="updateAttribute">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                             <div class="mb-4">
                                                 <div>
                                                     <label for="form-category/category" class="form-label">
                                                         Category</label>

                                                     <select class="form-select" wire:model="category_id">
                                                         <option value="">None</option>
                                                         {{--@foreach($categories as $category)
                                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                                         @endforeach--}}
                                                     </select>
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <div>
                                                     <label for="form-category/sub-category" class="form-label">Sub
                                                         Category</label>

                                                     <select class="form-select" wire:model="sub_category_id">
                                                         <option value="">None</option>
                                                         {{--@foreach($categories as $category)
                                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                                         @endforeach--}}
                                                     </select>
                                                 </div>
                                             </div>
                                            

                                             <div class="mb-4">
                                                 <label for="form-banner/image" class="form-label">Attribute</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="text" placeholder="Attribute" class="form-control" wire:model="aname" />
                                                     @error('aname') <p class="text-danger">{{$message}}</p> @enderror
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