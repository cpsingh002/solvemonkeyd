<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        .sclist{
            list-style:none;
        }
        .sclist li{
            line-height:33px;
            border-bottom: 1px solid #ccc;
        }
        .slink i{
            font-size:16px;
            margin-left:12px;
        }
    </style>
    <div class="container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Package
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addpackage')}}" class="btn btn-success pull-right">Add New Package</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif

                        <div class="p-4"><input type="text" placeholder="Start typing to search ..." class="form-control form-control--search mx-auto" id="table-search" /></div>


                        <table class="table table-striped"  data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Package Name</th>
                                    <th>Package Type</th>
                                    <th>Price</th>
                                    <th>Validadity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($packages as $package)
                                    <tr>
                                        <td>{{$package->id}}</td>
                                        <td>{{$package->pname}}</td>
                                        <td>{{$package->ptype}}</td>
                                        <td>
                                          {{$package->price}}
                                        </td>
                                        <td>{{$package->validity}}</td>
                                        <td>
                                            <a href="{{route('admin.editpackage',['pid'=>$package->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delet this package') || event.stopImmediatePropagation()" wire:click.prevent="deletePackage({{$package->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{$packages->links()}}

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>