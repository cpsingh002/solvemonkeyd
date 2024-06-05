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
                                    <a href="{{route('user-account')}}" class="items "> <i class="lar la-user-circle icon"></i> My
                                        Account</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('user-packages')}}" class="items"><i class="las la-ad icon"></i> My Packages</a>
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
                                <a href="#" class="account-btn"><i class="las la-sign-out-alt icon"></i>
                                    Logout</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-7">

                        <div class="row mb-24">
                            <div class="col-sm-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{route('user-account')}}">My Account</a></li>
                                        <li class="breadcrumb-item"><a href=""> Exchange Items</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        @foreach($images as $key=>$exfor)
                        <h5>{{$exfor}}</h5>
                            <div class="myListing">
                            @if(isset($products[$key][0]))
                                @foreach($products[$key] as $product)
                                    <div class="singleFlexitem mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="listCap">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="recentImg">
                                                                <img src="{{asset('admin/product/feat')}}/{{$product->featimage}}" alt="{{$product->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="recentCaption">
                                                                <h5><a href="{{route('product.details',['slug'=>$product->slug])}}" class="featureTittle">{{$product->name}}</a>
                                                                </h5>
                                                                <p class="featureCap">{{$product->state->name}},{{$product->country->name}} · <strong class="subCap">24hrs ago</strong></p>
                                                                <span class="featurePricing">Rs {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$product->prices)}}</span>
                                                                <div class="btn-wrapper">
                                                                    @if($product->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                                                    @if($product->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                                                    @if($product->is_rent == 1)  <span class="pro-btn2">Rent</span>     @endif
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                @endforeach
                            @else
                            <p> no exchangeable items found yet</p>
                            @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

    </main>
</div>
