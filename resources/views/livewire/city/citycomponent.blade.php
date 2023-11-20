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
                                All Cities
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
                                    <th>City Name</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{$city->id}}</td>
                                        <td>{{$city->city}}</td>
                                        <td>{{$city->state->name}}</td>
                                        <td>
                                           {{$city->state->country->name}}
                                        </td>
                                        <td>
                                            @if($city->status==1)
                                            <a href="#" onclick="confirm('Are you sure, You want to Deactive this City') || event.stopImmediatePropagation()" wire:click.prevent="deactiveCity({{$city->id}})" style="margin-left:10px;"><i class="fa fa-edit fa-2x"></i></a>
                                            @else
                                            <a href="#" onclick="confirm('Are you sure, You want to Active this City') || event.stopImmediatePropagation()" wire:click.prevent="deleteCity({{$city->id}})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{$cities->links()}}

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>