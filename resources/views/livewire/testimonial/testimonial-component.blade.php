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
                                All Testimonial
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.adduser')}}" class="btn btn-success pull-right">Add New Testimonial</a>
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
                                    <th> Name</th>
                                    <th>Email Id</th>
                                    <th>Phone Number</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Status Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{$testimonial->id}}</td>
                                        <td>{{$testimonial->name}}/{{$testimonial->position}}</td>
                                        <td>{{$testimonial->email}}</td>
                                        <td>{{$testimonial->image}}</td>
                                        <td>{{$testimonial->description}}</td>
                                        <td>{{$testimonial->star}}</td>
                                        <td>
                                        <td>@if($testimonial->status) ACtive @else Deactive @endif</td>
                                        <td>@if($testimonial->status)
                                            <a href="#" onclick="confirm('Are you sure, You want to deactive this testimonial') || event.stopImmediatePropagation()" wire:click.prevent="DeactiveStatus({{$testimonial->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            @else
                                            <a href="#" onclick="confirm('Are you sure, You want to active this testimonial') || event.stopImmediatePropagation()" wire:click.prevent="ActiveStatus({{$testimonial->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            @endif</td>
                                        <td>
                                            <a href="{{route('admin.edituser',['uid'=>$user->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            @if($testimonial->verified)
                                            <a href="#" onclick="confirm('Are you sure, You want to deverified this testimonial') || event.stopImmediatePropagation()" wire:click.prevent="DeVerifiedstatus({{$testimonial->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            @else
                                            <a href="#" onclick="confirm('Are you sure, You want to verified this testimonial') || event.stopImmediatePropagation()" wire:click.prevent="Verifiedstatus({{$testimonial->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{$testimonials->links()}}

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>