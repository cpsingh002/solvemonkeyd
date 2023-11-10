 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
     <div class="mx-xxl-3 px-4 px-sm-5">
         <div class="py-5">
             <div class="row g-4 align-items-center">
                 <div class="col">
                     <nav class="mb-2" aria-label="breadcrumb">

                     </nav>
                     <h1 class="h3 m-0">Attribute's Options</h1>
                 </div>
                 <div class="col-auto d-flex">
                     <a href="{{route('admin.addattributeoption')}}" class="btn btn-primary">Add Attribute's Option</a>
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
                     <div class="sa-divider"></div>
                     <table class="sa-datatables-init">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Category</th>
                                 <th>Sub Category</th>
                                 <th>Attribute</th>
                                 <th>Attribute's Option</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($attributeoptions as $attributeoption)
                             <tr>
                                <td>{{$attributeoption->id}}</td>
                                 <td>{{$attributeoption->category->name}}</td>
                                 <td>{{$attributeoption->subcategory->name}}</td>
                                 <td>{{$attributeoption->attribute->attribute}}</td>
                                 <td>{{$attributeoption->option_details}}</td>
                                 
                                 <td>
                                     <a href="{{route('admin.editattributeoption',['oid'=>$attributeoption->id])}}"><i
                                             class="fa fa-edit "></i></a>
                                     <a href="#" onclick="confirm('Are you sure, You want to delete this attribute') || event.stopImmediatePropagation()"
                                         wire:click.prevent="deleteOption({{$attributeoption->id}})"><i class="fa fa-times  text-danger ml-2"></i></a>
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>