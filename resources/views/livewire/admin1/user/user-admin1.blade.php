 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
     <div class="mx-xxl-3 px-4 px-sm-5">
         <div class="py-5">
             <div class="row g-4 align-items-center">
                 <div class="col">
                     <nav class="mb-2">

                     </nav>
                     <h1 class="h3 m-0">Users</h1>
                 </div>
                 <div class="col-auto d-flex">
                     <a href="{{route('admin.adduser')}}" class="btn btn-primary">Add New User</a>
                 </div>
             </div>
         </div>
     </div>
     <div class="mx-xxl-3 px-4 px-sm-5 pb-6">
         <div class="sa-layout">
             <!-- <div class="sa-layout__backdrop" data-sa-layout-sidebar-close=""></div> -->

             <div class="sa-layout__content">
                 <div class="card">
                     @if(Session::has('message'))
                     <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                     @endif
                     <div class="p-4"><input type="text" placeholder="Start typing to search for customers" class="form-control form-control--search mx-auto" id="table-search"></div>
                     <!-- <div class="sa-divider"></div> -->
                     <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]" data-sa-search-input="#table-search" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>User Name</th>
                                 <th>Email Id</th>
                                 <th>Phone Number</th>
                                 <th>City</th>
                                 <th>Address</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($users as $user)
                             <tr>
                                 <td>{{$user->id}}</td>
                                 <td>{{$user->name}}</td>
                                 <td>{{$user->email}}</td>
                                 <td>{{$user->city}}</td>
                                 <td>{{$user->country}}</td>
                                 <td>@if($user->is_active) Active @else Deactive @endif</td>
                                 <td>
                                     <a href="{{route('admin.edituser',['uid'=>$user->id])}}"><i
                                             class="fa fa-edit "></i></a>
                                     @if($user->is_active)
                                     <a href="#"
                                         onclick="confirm('Are you sure, You want to Deactive this User') || event.stopImmediatePropagation()"
                                         wire:click.prevent="DeactiveUser({{$user->id}})"><i
                                             class="fa fa-times text-danger"></i></a>
                                     @else
                                     <a href="#"
                                         onclick="confirm('Are you sure, You want to Active this User') || event.stopImmediatePropagation()"
                                         wire:click.prevent="ActiveUser({{$user->id}})"><i
                                             class="fa fa-times text-danger"></i></a>
                                     @endif

                                     
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                     {{$users->links()}}
                 </div>
             </div>
         </div>
     </div>
 </div>