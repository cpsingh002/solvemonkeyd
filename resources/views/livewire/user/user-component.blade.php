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
                                All Users
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.adduser')}}" class="btn btn-success pull-right">Add New User</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
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
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->city}}</td>
                                        <td>{{$user->country}}</td>
                                        <td>
                                        <td>@if($user->is_active) ACtive @else Deactive @endif</td>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.edituser',['uid'=>$user->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            @if($user->is_active)
                                            <a href="#" onclick="confirm('Are you sure, You want to Deactive this User') || event.stopImmediatePropagation()" wire:click.prevent="DeactiveUser({{$user->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            @else
                                            <a href="#" onclick="confirm('Are you sure, You want to Active this User') || event.stopImmediatePropagation()" wire:click.prevent="ActiveUser({{$user->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
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
</div>