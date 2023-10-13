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
                         <h1 class="h3 m-0">Edit User</h1>
                     </div>
                     <div class="col-auto d-flex">
                         <a href="{{route('admin.users')}}" class="btn btn-primary">All User</a>
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
                                         <form class="form-horizontal" wire:submit.prevent="UpdateUser">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-user/name" class="form-label">User Name</label>
                                                 <input type="text" placeholder="User Name" class="form-control"
                                                     wire:model="name" />
                                                 @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <label for="form-user/email" class="form-label">Email</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input class="form-control input-md" type="Email"
                                                         placeholder="User Email" wire:model="email" />
                                                     @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-user/phone" class="form-label">Phone</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input class="form-control input-md" type="text"
                                                         placeholder="User Phone No" wire:model="phone" />
                                                     @error('phone') <p class="text-danger">{{$message}}</p> @enderror
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