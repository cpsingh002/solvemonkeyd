<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <main>
    <div class="myAccout section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5">

                    <div class="accountSidebar">
                        <ul class="listing listScroll">
                            <li class="listItem">
                                <a href="{{route('user-dashboard')}}" class="items active" > <i
                                        class="lar la-user-circle icon"></i> Dashboard</a>
                            </li>
                            <li class="listItem">
                                <a href="{{route('user-account')}}" class="items "> <i class="lar la-user-circle icon"></i> My
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
                            <li class="listItem">
                                <a href="{{route('message')}}" class="items"> <i class="lar la-heart icon"></i> Chat</a>
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


                    <div class="accountWrapper mb-24">

                        <div class="userProfile mb-24">
                            <div class="recentImg">
                                <img src="../assets/img/gallery/myAccout.png" alt="images">
                            </div>
                            <div class="recentCaption">
                                <div class="cap">
                                    <h5><a href="#" class="featureTittle">{{Auth::user()->name}}</a></h5>
                                    <p class="featureCap">Member since {{Auth::user()->created_at->format('Y')}}</p>
                                </div>
                                <div class="btn-wrapper">
                                    <a href="{{route('user.editprofile')}}" class="cmn-btn-outline2">Edit Profile</a>
                                </div>
                            </div>
                        </div>

                        <div class="infoSingle">
                            <ul class="listing">
                                <li class="listItem"><i class="las la-map-marker-alt icon"></i>@if(Auth::user()->city !=''){{Auth::user()->city}},{{Auth::user()->state}},{{Auth::user()->country}} @else <span>Not provided yet</span> @endif</li>
                                <li class="listItem"><i class="lar la-envelope-open icon"></i>{{Auth::user()->email}}</a>
                                </li>
                                <li class="listItem"><i class="las la-phone icon"></i>@if(Auth::user()->phone !='') {{Auth::user()->phone}} @else <span>Not provided yet</span> @endif</li>
                            </ul>
                        </div>
                    </div>

                    <div class="myListing">
                        @if(isset($products[0]))
                            @foreach($products as $product)
                                <div class="singleFlexitem mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                    <div class="listCap">
                                        <div class="recentImg">
                                            <img src="{{asset('admin/product/feat')}}/{{$product->featimage}}" alt="{{$product->name}}" width="200px" hight="300px">
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{route('product.details',['slug'=>$product->slug])}}" class="featureTittle">{{$product->name}}</a>
                                            </h5>
                                            <p class="featureCap">{{$product->state->name}},{{$product->country->name}} · <strong class="subCap">24hrs ago</strong></p>
                                            <span class="featurePricing">${{$product->prices}}</span>
                                            <div class="btn-wrapper">
                                                @if($product->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                                @if($product->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                                @if($product->is_rent == 1)  <span class="pro-btn2">Rent</span>     @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="#" class="cmn-btn-outline4 mr-10"><i class="lar la-eye icon"></i>44k</a>
                                        <a href="{{route('edit-ad',['pid'=>$product->id])}}" class="cmn-btn4">Edit Ad</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <p> no item add yet</p>
                        @endif
                        <a class="list-title" href="{{'/post-ad'}}">
                            <p> Add more product for sell,rent and exchange</p>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
</div>
