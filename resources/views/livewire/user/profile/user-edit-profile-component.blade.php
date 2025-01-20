<div>

    <main>
        <div class="myAccout section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5">
        
                        <div class="accountSidebar">
                            <ul class="listing listScroll">
                                <li class="listItem">
                                    <a href="{{route('user-dashboard')}}" class="items" > <i
                                            class="lar la-user-circle icon"></i> Dashboard</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('user-account')}}" class="items active"> <i class="lar la-user-circle icon"></i> My
                                        Account</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('user-ads')}}" class="items"><i class="las la-ad icon"></i> My Product Ads</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('user-order')}}" class="items"><i class="las la-ad icon"></i> My Orders</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('wishlist')}}" class="items"> <i class="lar la-heart icon"></i> Wishlist</a>
                                </li>
                                
                            </ul>
                            <div class="accessAccount">
                                <a href="#" class="account-btn"><i class="las la-sign-out-alt icon"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-7">
        
                        <div class="row mb-24">
                            <div class="col-sm-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">My Account</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
        
                        <div class="accountWrapper mb-24">
                        
                            <form class="form-horizontal"  enctype="multipart/form-data" wire:submit.prevent="updateProfile">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="infoTitle">Name</label>
                                        <div class="input-form input-form2">
                                            <input type="text" placeholder="enter name here" class="form-control" wire:model="name">
                                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label class="infoTitle">Phone</label>
                                        <div class="input-form input-form2">
                                            <input type="text" placeholder="enter mobile number here" class="form-control" wire:model="phone">
                                        </div>
                                        @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                        
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label class="infoTitle mt-2">Email</label>
                                        <div class="input-form input-form2">
                                            <input type="text"  class="form-control" value="{{$this->email}}" readonly>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="my-2">
                                            <label class="form-label infoTitle">Country</label>
                                            <select class="form-control" wire:model="country_id" wire:change.prevent="changecountry">
                                                <option value="0">Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="my-2">
                                            <label class="form-label infoTitle">State</label>
                                            <select class="form-control" wire:model="state_id" wire:change.prevent="changestate" >
                                                <option value="0">Select State</option>
                                                @foreach($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                            
                                            @error('state_id') <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="my-2">
                                            <label class="form-label infoTitle">City</label>
                                            <select class="form-control" wire:model="city_id">
                                                    <option value="0">Select City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            
                                            @error('city_id') <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <label class="infoTitle">Address</label>
                                        <div class="input-form input-form2">
                                            <input type="text" placeholder="Enter address here" class="form-control" wire:model="address">
                                        </div>
                                        @error('address') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="infoTitle">Zipcode</label>
                                        <div class="input-form input-form2">
                                            <input type="text" placeholder="enter zipcode here" class="form-control" wire:model="zipcode">
                                        </div>
                                        @error('zipcode') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
        
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label infoTitle my-2">Profile</label>
                                    <div class="col-md-4">
                                        <input type ="file" class ="input-file" class="form-control" wire:model="newimage"/>
                                        @if($newimage)
                                            <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                        @else
                                            <img src="{{asset('admin/userprofile')}}/{{$profile}}" width="120" />
                                        @endif
                                        @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
        
                                <div class="col-sm-12">
                                    <div class="btn-wrapper mb-10 text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
        
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
