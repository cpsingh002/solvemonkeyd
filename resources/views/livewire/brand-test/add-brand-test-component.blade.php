 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body --> 
 {{--
 @section('page_css')
 <link rel="stylesheet" href="{{asset('assets/multi/css/jquery.multiselect.css')}}" />
@endsection --}}
 <div id="top" class="sa-app__body">
     <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
         <div class="container">
             <div class="py-5">
                 <div class="row g-4 align-items-center">
                     <div class="col">
                         <nav class="mb-2" aria-label="breadcrumb">

                         </nav>
                         <h1 class="h3 m-0">Add Brand</h1>
                     </div>
                     <div class="col-auto d-flex">
                         <a href="{{route('admin.testbrands')}}" class="btn btn-primary">All Brand</a>
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
                                             wire:submit.prevent="addBrand">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                               {{-- <div class="md-4">
                                                    <label class="form-label">Category</label>
                                                    @foreach($categories as $key=>$category)
                                                    <input type="radio" id="vehicle"  value="{{$category->id}}" wire:model="textcategory_id.{{$key}}">
                                                    <label for="vehicle">{{$category->name}}</label><br>
                                                    @endforeach
                                                    
                                                    @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>  --}}

                                                <div class="md-4">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-control select" multiple data-mdb-placeholder="Example placeholder" wire:model="category_id" wire:change="changeSubcategory" multiple>
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            
                                                @if(isset($scategories[0]))
                                                
                                                <div class="md-4">
                                                    <label class="form-label">Sub-Category</label>
                                                    <select class="form-control"  wire:model="scategory_id" multiple> 
                                                    
                                                        <option value="">Select Sub Category</option>
                                                        @foreach($category_id as $gj)
                                                        /{{-- <span>{{$this->categoryname($gj)->name}}</span> --}}
                                                            @foreach($this->categoryname($gj)->subCategories as $scategory)
                                                                <option value="{{$scategory->id}}">{{$scategory->name}},{{$this->categoryname($gj)->name}}</option>
                                                            @endforeach 
                                                        @endforeach 
                                                     {{--   @foreach($scategories as $scategory)
                                                            <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                    @error('scategory_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                                @endif


                                             {{--   <div class="md-4">
                                                    <label class="form-label">Sub-Category</label>
                                                    <select name="langOptgroup[]" multiple id="langOptgroup" wire:model="scategory_idhj">
                                                        <optgroup label="Programming Languages">
                                                            <option value="C++ / C#">C++ / C#</option>
                                                            <option value="Java">Java</option>
                                                            <option value="Objective-C">Objective-C</option>
                                                        </optgroup>
                                                        <optgroup label="Client-side scripting Languages">
                                                            <option value="JavaScript">JavaScript</option>
                                                        </optgroup>
                                                        <optgroup label="Server-side scripting Languages">
                                                            <option value="Perl">Perl</option>
                                                            <option value="PHP">PHP</option>
                                                            <option value="Ruby on Rails">Ruby on Rails</option>
                                                        </optgroup>
                                                        <optgroup label="Mobile Platforms">
                                                            <option value="Android">Android</option>
                                                            <option value="iOS">iOS</option>
                                                        </optgroup>
                                                        <optgroup label="Document Markup Languages">
                                                            <option value="HTML">HTML</option>
                                                            <option value="XML">XML</option>
                                                        </optgroup>
                                                    </select>

                                                </div> --}}
                                            <div class="mb-4">
                                                 <label for="form-banner/name" class="form-label">Title</label>
                                                 <input type="text" placeholder="Title" class="form-control"
                                                     wire:model="title" wire:keyup="generateslug" />
                                                 @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-banner/name" class="form-label">Slug</label>
                                                 <input type="text" placeholder="Slug" class="form-control"
                                                     wire:model="slug" />
                                                 @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                            

                                             <div class="mb-4">
                                                 <label for="form-banner/image" class="form-label">Image</label>
                                                 <div class="input-group input-group--sa-slug">

                                                     <input type="file" class="input-file" wire:model="image" />
                                                    @if($image)
                                                     <img src="{{$image->temporaryUrl()}}" width="120" />
                                                     @endif
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-banner/image" class="form-label">Status</label>
                                                 <div class="input-group input-group--sa-slug">

                                                     <select class="form-select" wire:model="status">
                                                         <option value="0">Inactive</option>
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
 {{--
 @push('scripts')
 <script src="{{asset('assets/multi/js/jquery.min.js')}}"></script>
 <script src="{{asset('assets/multi/js/jquery.multiselect.js')}}"></script>
 <script>
    $(function() {
        $('#langOpt3').multiselect({
            columns: 1,
            texts: {
                placeholder: 'Select Languages',
		        search     : 'Search Languages'
            },
            search: true,
            selectAll: true
        })
        .on('dp.change', function(ev) {
            var data = $('#langOpt3').val();
            @this.set('scategory_id', data);
        });
    });
 </script>
 @endpush --}}
 <!-- sa-app__body / end -->
 <!-- sa-app__footer -->