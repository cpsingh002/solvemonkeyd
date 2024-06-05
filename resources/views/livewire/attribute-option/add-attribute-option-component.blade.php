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
                         <h1 class="h3 m-0">Add Attribute's Option</h1>
                     </div>
                     <div class="col-auto d-flex">
                         <a href="{{route('admin.attributeoptions')}}" class="btn btn-primary">All Attribute's Options</a>
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
                                         <form class="form-horizontal" enctype="multipart/form-data"
                                             wire:submit.prevent="addAttributeOption">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                             <div class="mb-4">
                                                 <div>
                                                     <label for="form-category/category" class="form-label">
                                                         Category<span class="text-danger"> *</span></label>

                                                     <select class="form-select" wire:model="category_id" wire:change="changeSubcategory">
                                                         <option value="">None</option>
                                                         @foreach($categories as $category)
                                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                                         @endforeach
                                                     </select>
                                                     @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <div>
                                                     <label for="form-category/sub-category" class="form-label">Sub-Category<span class="text-danger"> *</span></label>

                                                     <select class="form-select" wire:model="scategory_id" wire:change="changeattribute"/>
                                                         <option value="">None</option>
                                                         @foreach($scategories as $scategory)
                                                         <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                                         @endforeach
                                                     </select>
                                                     @error('scategory_id') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>
                                            

                                             <div class="mb-4">
                                                 <label for="form-banner/image" class="form-label">Attribute<span class="text-danger"> *</span></label>
                                                 <div class="input-group input-group--sa-slug">
                                                    <select class="form-select" wire:model="attribute_id">
                                                         <option value="">None</option>
                                                         @foreach($attributes as $attribute)
                                                         <option value="{{$attribute->id}}">{{$attribute->attribute}}</option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                                     @error('attribute_id') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-banner/image" class="form-label">Option Details<span class="text-danger"> *</span></label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="text" placeholder="Attribute" class="form-control" wire:model="option_details" />
                                                 </div>
                                                     @error('option_details') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-banner/image" class="form-label">Status</label>
                                                 <div class="input-group input-group--sa-slug">

                                                     <select class="form-select" wire:model="status">
                                                         <option value="0">Deactive</option>
                                                         <option value="1">Active</option>
                                                     </select>
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