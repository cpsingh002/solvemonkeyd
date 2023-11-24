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
                     <div class="sa-divider"></div>
                     <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]" data-sa-search-input="#table-search" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Title</th>
                                 <th>SLug</th>
                                 <th>Price</th>
                                 <th>Image</th>
                                 <th>Address</th>
                                 <th>Tag</th>
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
                                 <td>
                                     <a href="{{route('admin.editpackage',['pid'=>$product->id])}}"><i
                                             class="fa fa-edit "></i></a>
                                     <a href="#" onclick="confirm('Are you sure, You want to delet this product') || event.stopImmediatePropagation()"
                                         wire:click.prevent="deleteCategory({{$product->id}})"><i class="fa fa-times  text-danger ml-2"></i></a>
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