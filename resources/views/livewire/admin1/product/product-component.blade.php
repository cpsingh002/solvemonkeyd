 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
     <div class="mx-xxl-3 px-4 px-sm-5">
         <div class="py-5">
             <div class="row g-4 align-items-center">
                 <div class="col">
                     <nav class="mb-2" aria-label="breadcrumb">

                     </nav>
                     <h1 class="h3 m-0">Products</h1>
                 </div>
                 <div class="col-auto d-flex">
                     <a href="{{route('admin.addproduct')}}" class="btn btn-primary">Add New Product</a>
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
                                 <th>Title</th>
                                 <th>Slug</th>
                                 <th>Price</th>
                                 <th>Image</th>
                                 <th>Address</th>
                                 <th>Exchange For</th>
                                 <th>Verified</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($products as $product)
                             <tr>

                                 <td>{{$product->id}}</td>
                                 <td>{{$product->name}}</td>
                                 <td>{{$product->slug}}</td>
                                 <td>{{$product->prices}}</td>
                                 <td><img src="{{asset('admin/product/feat')}}/{{$product->featimage}}" width="60" /></td>
                                 <td>{{$product->address}}</td>
                                 <td>{{$product->exchange_for}}</td>
                                 <td>@if($product->user_verified == 1) 
                                    <a href="#" wire:click.prevent='adminverified({{$product->id}})' onclick="confirm('Are you sure you want to Verified this product?') || event.stopImmediatePropagation()">Verified </a>
                                    @else <a href="#" wire:click.prevent='admindeverifed({{$product->id}})' onclick="confirm('Are you sure you want to de-verified this product?') || event.stopImmediatePropagation()">De-verified </a> @endif
                                </td>
                                 <td>@if($product->status==1) 
                                        <a href="#" wire:click.prevent='changeActive({{$product->id}})' onclick="confirm('Are you sure you want to de-active this product?') || event.stopImmediatePropagation()">Active </a>
                                    @else <a href="#" wire:click.prevent='changeDeactive({{$product->id}})' onclick="confirm('Are you sure you want to active this product?') || event.stopImmediatePropagation()">Deactive </a> @endif
                                </td>
                                 <td>
                                     <a href="{{route('admin.editproduct',['pid'=>$product->id])}}"><i class="fa fa-edit "></i></a>
                                     <a href="#" onclick="confirm('Are you sure you want to delete this product?') || event.stopImmediatePropagation()"
                                         wire:click.prevent="deleteProduct({{$product->id}})" style="margin-left:10px;"><i class="fa fa-times  text-danger ml-2"></i></a>
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