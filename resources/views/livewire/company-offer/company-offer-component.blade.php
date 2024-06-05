 <!-- sa-app__toolbar / end -->
 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
     <div class="mx-xxl-3 px-4 px-sm-5">
         <div class="py-5">
             <div class="row g-4 align-items-center">
                 <div class="col">
                     <nav class="mb-2" aria-label="breadcrumb">

                     </nav>
                     <h1 class="h3 m-0">Company Offers  </h1>
                 </div>
                 <div class="col-auto d-flex">
                     <a href="{{route('admin.company-offeradd')}}" class="btn btn-primary">Add Company Offer</a>
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

                      <div class="p-4"><input type="text" placeholder="Start typing to search for customers" class="form-control form-control--search mx-auto" id="table-search"></div>
                     <!-- <div class="sa-divider"></div> -->
                     <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]" data-sa-search-input="#table-search" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Company Name</th>
                                 <th>Company Logo</th>
                                 <th>Offer Link</th>
                                 <th>Offer Template</th>
                                 <th>Heading</th>
                                 <th>Offer Details</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($companyoffers as $companyoffer)
                             <tr>
                                 <td>{{$companyoffer->id}}</td>
                                 <td>{{$companyoffer->compnay_name}}</td>
                                 <td><img src="{{asset('admin/company/logo')}}/{{$companyoffer->company_logo}}" width="60"></td>
                                 <td>
                                    <div class="badge badge-sa-success">{{$companyoffer->offer_link}}</div>
                                 </td>
                                 <td><img src="{{asset('admin/company/template')}}/{{$companyoffer->offer_template}}" width="60"></td>

                                 <td>{!! $companyoffer->offer_details !!}</td>
                                 <td>{{$companyoffer->heading}} </td>
                                 <td>@if($companyoffer->status == 1)<a href="#" onclick="confirm('Are you sure, You want to Deactive this offer') || event.stopImmediatePropagation()" wire:click.prevent='DeactiveOffer({{$companyoffer->id}})'> Active </a> 
                                @else <a href="#" onclick="confirm('Are you sure, You want to Active this offer') || event.stopImmediatePropagation()" wire:click.prevent='ActiveOffer({{$companyoffer->id}})'>Deactive </a>
                                @endif</td>
                                 <td>
                                     <a href="{{route('admin.company-offeredit',['eid'=>$companyoffer->id])}}"><i class="fa fa-edit"></i></a>
                                     <a href="#" onclick="confirm('Are you sure, You want to delete this offer') || event.stopImmediatePropagation()"
                                         wire:click.prevent="deleteOffer({{$companyoffer->id}})"><i class="fa fa-times ml-1 text-danger"></i></a>
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
<!-- @push('scripts')-->
    
<!--    <script>-->
<!--           new DataTable('#DataTables_Table_0', {-->
<!--                layout: {-->
<!--                    topStart: {-->
<!--                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']-->
<!--                    }-->
<!--                }-->
<!--            });-->
<!--    </script>-->
<!--@endpush-->