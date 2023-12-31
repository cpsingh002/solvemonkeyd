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
                         <h1 class="h3 m-0">Edit Packge</h1>
                     </div>
                     <div class="col-auto d-flex">
                         <a href="{{route('admin.packages')}}" class="btn btn-primary">All Package</a>
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
                                         <form class="form-horizontal" wire:submit.prevent="updatePacakge">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-package/name" class="form-label">Package Name</label>
                                                 <input type="text" placeholder="Package Name" class="form-control"
                                                     wire:model="pname" />
                                                 @error('pname') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-package/type" class="form-label">Package Type</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input class="form-control input-md" type="text"
                                                         placeholder="Package Type" wire:model="ptype" />
                                                     @error('ptype') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-package/price" class="form-label">Package Price</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input class="form-control input-md" type="text"
                                                         placeholder="Package Price" wire:model="price" />
                                                     @error('price') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-package/validity" class="form-label">Package Validity</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input class="form-control input-md" type="text"
                                                         placeholder="Package Validity" wire:model="validity" />
                                                     @error('validity') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-package/upto" class="form-label">Package Upto</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input class="form-control input-md" type="text" id="sale-date"
                                                         placeholder="YYYY/MM/DD hh:mm:ss" wire:model="up_to" />
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

 @push('scripts')
 <script>
$(function() {
    $('#sale-date').datetimepicker({
            format: 'Y-MM-DD hh:mm:ss',
        })
        .on('dp.change', function(ev) {
            var data = $('#sale-date').val();
            @this.set('sale_date', data);
        });
});
 </script>
 @endpush