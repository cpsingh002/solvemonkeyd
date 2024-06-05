 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
     <div class="mx-xxl-3 px-4 px-sm-5">
         <div class="py-5">
             <div class="row g-4 align-items-center">
                 <div class="col">
                     <nav class="mb-2" aria-label="breadcrumb">

                     </nav>
                     <h1 class="h3 m-0">Attributes</h1>
                 </div>
                 <div class="col-auto d-flex">
                     <a href="{{route('admin.addattribute')}}" class="btn btn-primary">Add Attribute</a>
                 </div>
             </div>
         </div>
     </div>
     <div class="mx-xxl-3 px-4 px-sm-5 pb-6">
         <div class="sa-layout">
             <!-- <div class="sa-layout__backdrop" data-sa-layout-sidebar-close=""></div> -->
                    @if(Session::has('message'))
                     <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                     @endif
             <div class="sa-layout__content" wire:ignore>
                 <div class="card">
                     
                     <div class="p-4"><input type="text" placeholder="Start typing to search for customers" class="form-control form-control--search mx-auto" id="table-search"></div>
                     <div class="sa-divider"></div>
                     <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]" data-sa-search-input="#table-search" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Category</th>
                                 <th>Sub Category</th>
                                 <th>Attribute</th>
                                 <th>optipon values</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($attributes as $attribute)
                             <tr>
                                <td>{{$attribute->id}}</td>
                                 <td>{{$attribute->category->name}}</td>
                                 <td>{{$attribute->subcategory->name}}</td>
                                 <td>{{$attribute->attribute}}</td>
                                 <td>
                                    <ul class="sclist">
                                        @foreach($attribute->attributeoptions as $key => $scategory)
                                        @if($key == 4)
                                            <a href="{{route('admin.attributeoptions')}}">View more...</a>
                                            @break
                                        @endif
                                            <li>{{$scategory->option_details}}</li>
                                            
                                        @endforeach
                                    </ul>
                                </td>
                                 <td>@if($attribute->status==1) 
                                    <a href="#" wire:click.prevent='changeActive({{$attribute->id}})' onclick="confirm('Are you sure you want to de-active this attribute?') || event.stopImmediatePropagation()">Active </a>
                                    @else <a href="#" wire:click.prevent='changeDeactive({{$attribute->id}})' onclick="confirm('Are you sure you want to active this attribute?') || event.stopImmediatePropagation()">Deactive </a> @endif
                                </td>
                                 <td>
                                     <a href="{{route('admin.editattribute',['aid'=>$attribute->id])}}"><i
                                             class="fa fa-edit "></i></a>
                                     <a href="#" onclick="confirm('Are you sure, You want to delete this attribute?') || event.stopImmediatePropagation()"
                                         wire:click.prevent="deleteAttribute({{$attribute->id}})"style="margin-left:10px;"><i class="fa fa-times  text-danger ml-2"></i></a>
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