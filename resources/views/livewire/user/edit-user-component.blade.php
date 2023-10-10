<div>
    <div class= "container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit User
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.users')}}" class="btn btn-success"> All User</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="UpdateUser">
                            <div class="form-group">
                                <label class="col-md-4 control-label">User Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="User Name" class="form-control input-md" wire:model="name"  />
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="Email" placeholder="User Email" class="form-control input-md"  wire:model="email"/>
                                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Phone" class="form-control input-md"  wire:model="phone"/>
                                    @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>