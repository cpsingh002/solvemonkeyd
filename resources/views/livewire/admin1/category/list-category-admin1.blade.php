 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
     <div class="mx-xxl-3 px-4 px-sm-5">
         <div class="py-5">
             <div class="row g-4 align-items-center">
                 <div class="col">
                     <nav class="mb-2" aria-label="breadcrumb">

                     </nav>
                     <h1 class="h3 m-0">Categories</h1>
                 </div>
                 <div class="col-auto d-flex">
                     <a href="{{route('admin.addcategory')}}" class="btn btn-primary">Add Category</a>
                 </div>
             </div>
         </div>
     </div>
     <div class="mx-xxl-3 px-4 px-sm-5 pb-6">
         <div class="sa-layout">
             <div class="sa-layout__backdrop" data-sa-layout-sidebar-close=""></div>

             <div class="sa-layout__content">
                 <div class="card">
                     @if(Session::has('message'))
                     <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                     @endif
                     <div class="sa-divider"></div>
                     <table class="sa-datatables-init" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Category Name</th>
                                 <th>Slug</th>
                                 <th>SubCategory</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($categories as $category)
                             <tr>
                                 <td>{{$category->id}}</td>
                                 <td>{{$category->name}}</td>
                                 <td>
                                     <div class="badge badge-sa-success">{{$category->slug}}</div>
                                 </td>
                                 <td>
                                     <ul class="sclist">
                                         @foreach($category->subCategories as $scategory)
                                         <li><i class="fa fa-caret-right"></i>{{$scategory->name}}
                                             <a href="{{route('admin.editcategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}"
                                                 class="slink"><i class="fa fa-edit"></i></a>
                                             <a href="#"
                                                 onclick="confirm('Are you sure, You want to delet this sub-category') || event.stopImmediatePropagation()"
                                                 wire:click.prevent="deleteSubCategory({{$scategory->id}})"
                                                 class="slink"><i class="fa fa-times text-danger"></i></a>
                                         </li>
                                         @endforeach
                                     </ul>
                                 </td>
                                 <td>
                                     <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"><i
                                             class="fa fa-edit fa-2x"></i></a>
                                     <a href="#"
                                         onclick="confirm('Are you sure, You want to delet this category') || event.stopImmediatePropagation()"
                                         wire:click.prevent="deleteCategory({{$category->id}})"
                                         style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
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