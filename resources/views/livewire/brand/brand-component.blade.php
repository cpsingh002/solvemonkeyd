 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
     <div class="mx-xxl-3 px-4 px-sm-5">
         <div class="py-5">
             <div class="row g-4 align-items-center">
                 <div class="col">
                     <nav class="mb-2" aria-label="breadcrumb">

                     </nav>
                     <h1 class="h3 m-0">All Brands</h1>
                 </div>
                 <div class="col-auto d-flex">
                     <a href="{{route('admin.addbrand')}}" class="btn btn-primary">Add Brand</a>
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
                     <!-- <div class="sa-divider"></div> -->
                     <table class="sa-datatables-init">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Image</th>
                                 <th>Title</th>
                                 <th>Slug</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             {{-- @foreach($brands as $brand)
                             <tr>
                                 <td>{{$brand->id}}</td>
                                 <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="60" /></td>
                                 <td>{{$brand->title}}</td>
                                 <td>{{$brand->slug}}</td>
                                 
                                 <td>
                                     <a href="{{route('admin.editbanner',['bid'=> $slider->id])}}"><i
                                             class="fa fa-edit fa-2x"></i></a>
                                     <a href="#"
                                         onclick="confirm('Are you sure, You want to delet this slider') || event.stopImmediatePropagation()"
                                         wire:click.prevent="deleteSlider({{$slider->id}})" style="margin-left:10px;"><i
                                             class="fa fa-times fa-2x text-danger"></i></a>
                                 </td>
                             </tr>
                             @endforeach --}}
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>