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
                         <h1 class="h3 m-0">Add Package</h1>
                     </div>
                     <div class="col-auto d-flex">
                         <a href="{{route('admin.packages')}}" class="btn btn-primary">All Packages</a>
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
                                         <form class="form-horizontal" wire:submit.prevent="storePackage">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                             <div class="mb-4">
                                                 <label class="form-label">Package Name</label>
                                                 <input type="text" placeholder="Package Name" class="form-control" wire:model="pname" />
                                                 @error('pname') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <label class="form-label">Package Type</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="text" placeholder="Package Type" class="form-control" wire:model="ptype" />
                                                     @error('ptype') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>
                                             <div class="mb-4">
                                                 <div>
                                                     <label class="form-label">Package Price</label>
                                                     <div class="input-group input-group--sa-slug">
                                                         <input type="text" placeholder="Package Price" class="form-control" wire:model="price" />
                                                         @error('price') <p class="text-danger">{{$message}}</p>
                                                         @enderror
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-package/validity" class="form-label">Package Validity</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="text" placeholder="Package Validity" class="form-control" wire:model="validity" />
                                                     @error('validity') <p class="text-danger">{{$message}}</p>
                                                     @enderror
                                                 </div>
                                             </div>
                                             <div class="mb-4">
                                                <label class="control-label">Description</label>
                                                <div class="input-group" wire:ignore>
                                                    <textarea class ="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                                                    @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>

                                             <div class="mb-4">
                                                 <label for="form-package/upto" class="form-label">Package Upto</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="date" id="sale-date" placeholder="YYYY/MM/DD hh:mm:ss"
                                                         class="form-control" wire:model="up_to" />
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


 @push('scripts')
 <script src="https://cdn.tiny.cloud/1/5949s82j52s02vlrmcq6l2c2gkzihao5gxjymat25ancman4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(function(){
            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
 @endpush
 <!-- sa-app__body / end -->
 <!-- sa-app__footer -->