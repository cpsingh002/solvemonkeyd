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
                         <h1 class="h3 m-0">Add User</h1>
                     </div>
                     <div class="col-auto d-flex">
                         <a href="{{route('admin.users')}}" class="btn btn-primary">All Users</a>
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
                                         <form class="form-horizontal" wire:submit.prevent="storeUser">
                                             <div class="mb-5">
                                                 <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                             </div>
                                             <div class="mb-4">
                                                 <label class="form-label">User Name</label>
                                                 <input type="text" placeholder="User Name" class="form-control"
                                                     wire:model="name" />
                                                 @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                             </div>
                                             <div class="mb-4">
                                                 <label class="form-label">Email</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input type="Email" placeholder="User Email" class="form-control" wire:model="email" />
                                                     @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                                 </div>
                                             </div>
                                             <div class="mb-4">
                                                 <div>
                                                     <label class="form-label">Phone</label>
                                                     <div class="input-group input-group--sa-slug">
                                                         <input type="text" placeholder="User Phone No" class="form-control" wire:model="phone" />
                                                         @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="mb-4">
                                                 <label for="form-user/password" class="form-label">Password</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input id="password" type="password"
                                                         class="form-control @error('password') is-invalid @enderror"
                                                         wire:model="password" required autocomplete="new-password">
                                                     @error('password')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                     @enderror
                                                 </div>
                                             </div>


                                             <div class="mb-4">
                                                 <label for="form-user/confirm-password" class="form-label">Confirm Password</label>
                                                 <div class="input-group input-group--sa-slug">
                                                     <input id="password-confirm" type="password" class="form-control" wire:model="password_confirmation" required autocomplete="new-password">
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

