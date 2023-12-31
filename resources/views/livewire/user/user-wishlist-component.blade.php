<div>
    {{-- The Master doesn't talk, he acts. --}}
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
                                    <a href="{{route('user-ads')}}" class="items"><i class="las la-ad icon"></i> My Product Ads</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('user-order')}}" class="items"><i class="las la-ad icon"></i> My Orders</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('wishlist')}}" class="items active"> <i class="lar la-heart icon"></i> Wishlist</a>
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
                                        <li class="breadcrumb-item"><a href="{{'wishlist'}}"> Wishlist</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        @if(Cart::instance('wishlist')->count() > 0)
                            <div class="promoteAds">
                                @foreach(Cart::instance('wishlist')->content() as $item)
                                    <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s">
                                        <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                            <div class="adsCap">
                                                <div class="adsImg">
                                                    <img src="{{asset('admin/product/feat')}}/{{$item->model->featimage}}" alt="{{$item->model->name}}" width="200px">
                                                </div>
                                                <div class="adsCaption">
                                                    <h5><a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="adsTittle">{{$item->model->name}}</a></h5>
                                                    <p class="adsPera">{{$item->model->state->name}},{{$item->model->country->name}} · <strong class="subCap">24hrs ago</strong>
                                                    </p>
                                                    <span class="adsPricing">${{$item->model->prices}}</span>
                                                </div>
                                            </div>
                                            <div class="btn-wrapper mb-20">
                                            <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart">ji</i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No item in wishlist</p>
                        @endif
                    </div>
                </div>
            </div>

    </main>
</div>
