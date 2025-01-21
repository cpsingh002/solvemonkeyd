<header class="header-style-01">
        <nav class="navbar navbar-area headerBg1 navbar-expand-lg  plr">
            <div class="container-fluid container-two nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
                        <a href="{{'/'}}" class="logo">
                           <img src="{{asset('assets/img/logo/solve-logo.png')}}" alt="images"> 
                        {{--    <img src="{{asset('assets/img/solvemonkeygooglemap2.png')}}" alt="images"> --}}
                        </a>
                    </div>

                    <!--<a href="#0" class="click_show_icon"><i class="las la-ellipsis-v"></i> </a>-->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="NavWrapper ml-lg-50">

                    <div class="collapse navbar-collapse " id="bizcoxx_main_menu">
                        <ul class="navbar-nav d-flex gap-lg-4">
                            <li><a href="{{route('product-list')}}">All Ads</a></li>
                            <li><a href="{{route('about')}}">About us</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                            <li><a href="{{route('comapny.offer')}}">Compnay Offer</a></li>
                            <li>
                               <div class="sibeBar-Wrapper d-lg-none d-md-block ">

                        <div class="sideBar ">

                            <a href="#" class="sidebarBtn ms-3">
                                 <!--<i class="las la-bars iconLeft"></i>  -->
                                <span class="allCat" id="drop_view">All Categories</span><i class="las la-angle-down iconRight"></i>
                            </a>

                            @livewire('category-list-component')
                        </div>

                    </div> 
                            </li>
                            
                         
                            <li><div class="d-md-block d-lg-none noned">
                                
                        <ul class="header-cart flex-column ml-lg-60 ">
                        
                             <div class="" >
                        @auth
                            @livewire('wishlist-count-component')
                        @endauth


                        @if(Route::has('login'))
                        @auth
                       
                       
                        <li class="single userAccount d-flex gap-3 ">
                            <button class="user"><img src="{{asset('assets/img/gallery/user.png')}}" alt="images"></button><span
                                    class="text">User Account</span>
                            <div class="userAccount-wrapper ">
                                <h6 class="ac-title">User Account</h6>
                                <ul class="ac-list">
                                    <li class="list">
                                        <a class="list-title" href="{{route('user-account')}}"> <i
                                                class="lar la-user-circle icon"></i> My Account </a>
                                    </li>
                                    <li class="list">
                                        <a class="list-title" href="{{route('wishlist')}}"><i class="fa fa-heart icon"></i>
                                            Wishlist </a>
                                    </li>

                                    <li class="list">
                                        <a class="list-title" href="{{route('user-ads')}}"><i
                                                class="las la-address-card icon"></i> Product ADs </a>
                                    </li>


                                    <li class="list">
                                        <a class="list-title" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                class="las la-sign-out-alt icon"></i>Logout</a>
                                    </li>
                                    <form id="logout-form" method="POST" action="{{route('logout')}}">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </div>

                </li>
                       </div>
                <li class="single">
                    <div class="btn-wrapper">
                        <a href="#" class="cmn-btn1 popup-modal">
                            <i class="las la-plus-square"></i><span class="text">Post your Ad</span>
                        </a>
                    </div>
                </li>
                @else
                <li class="single" wire:ignore>
                    <!-- <a title="Register or Login" href="{{route('login')}}">Login</a> -->


                    <div class="btn-wrapper">
                        <a href="#" class="cmn-btn1 popup-btn-login">
                            <i class="las la-plus-square"></i><span class="text">Login</span>
                        </a>
                    </div>
                </li>

                @endif
                @endif
                </ul>
                    </div></li>
                        </ul>
                    </div>



                   <div class="sibeBar-Wrapper d-md-none d-lg-block d-none d-sm-block">

                        <div class="sideBar ">

                            <a href="#" class="sidebarBtn ms-3">
                                 <!--<i class="las la-bars iconLeft"></i>  -->
                                <span class="allCat"  >All Categories</span><i class="las la-angle-down iconRight"></i>
                            </a>

                            @livewire('category-list-component')
                        </div>

                    </div>
                    
                    
                   
                    
                   

                </div>

                <div class="nav-right-content">

                    <ul class="header-cart">

                    <li class="single d-flex gap-3" >
                        <a href="{{route('message')}}" class="heart "> <i class="lar la-envelope"></i> </a>
                                    </li>

                        @auth
                            @livewire('wishlist-count-component')
                        @endauth


                        @if(Route::has('login'))
                        @auth
                       {{-- <li class="single chatBar">
                            <button class="chat"><i class="lab la-rocketchat icon"></i><span
                                    class="text">Chat</span></button>

                            <div class="chatList-wrapper">
                                <h6 class="chat-title">All Messages </h6>
                                <ul class="chat-list">
                                    <li class="list">
                                        <div class="chat-list-flex">
                                            <div class="item-icon">
                                                <img src="{{asset('assets/img/gallery/user.png')}}" alt="img">
                                            </div>
                                            <div class="chat-contents">
                                                <a class="list-title" href="{{'/message'}}"> Rupak </a>
                                                <span class="list-sub"> 4 hours ago </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list">
                                        <div class="chat-list-flex">
                                            <div class="item-icon">
                                                <img src="{{asset('assets/img/gallery/user.png')}}" alt="img">
                                            </div>
                                            <div class="chat-contents">
                                                <a class="list-title" href="{{'/message'}}">Md. Shahin </a>
                                                <span class="list-sub"> 8 hours ago </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list">
                                        <div class="chat-list-flex">
                                            <div class="item-icon">
                                                <img src="{{asset('assets/img/gallery/user.png')}}" alt="img">
                                            </div>
                                            <div class="chat-contents">
                                                <a class="list-title" href="{{'/message'}}"> Shariful Rahman </a>
                                                <span class="list-sub"> 1 day ago </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list">
                                        <div class="chat-list-flex">
                                            <div class="item-icon">
                                                <img src="{{asset('assets/img/gallery/user.png')}}" alt="img">
                                            </div>
                                            <div class="chat-contents">
                                                <a class="list-title" href="{{'/message'}}"> Suzon islam </a>
                                                <span class="list-sub"> 3 day ago </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list">
                                        <div class="chat-list-flex">
                                            <div class="item-icon">
                                                <img src="{{asset('assets/img/gallery/user.png')}}" alt="img">
                                            </div>
                                            <div class="chat-contents">
                                                <a class="list-title" href="{{'/message'}}"> Md Zahid </a>
                                                <span class="list-sub"> 7 day ago </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <a href="{{'/message'}}" class="all-chat"> See All Messages </a>
                            </div>

                        </li> --}}
                        <li class="single userAccount">
                            <button class="user"><img src="{{asset('assets/img/gallery/user.png')}}" alt="images"></button>
                            <div class="userAccount-wrapper">
                                <h6 class="ac-title">User Account</h6>
                                <ul class="ac-list">
                                    <li class="list">
                                        <a class="list-title" href="{{route('user-account')}}"> <i
                                                class="lar la-user-circle icon"></i> My Account </a>
                                    </li>
                                    <li class="list">
                                        <a class="list-title" href="{{route('wishlist')}}"><i class="fa fa-heart icon"></i>
                                            Wishlist </a>
                                    </li>

                                    <li class="list">
                                        <a class="list-title" href="{{route('user-ads')}}"><i
                                                class="las la-address-card icon"></i> Product ADs </a>
                                    </li>


                                    <li class="list">
                                        <a class="list-title" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                class="las la-sign-out-alt icon"></i>Logout</a>
                                    </li>
                                    <form id="logout-form" method="POST" action="{{route('logout')}}">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </div>

                </li>
                <li class="single">
                    <div class="btn-wrapper">
                        <a href="#" class="cmn-btn1 popup-modal">
                            <i class="las la-plus-square"></i><span class="text">Post your Ad</span>
                        </a>
                    </div>
                </li>
                @else
                <li class="single">
                    <!-- <a title="Register or Login" href="{{route('login')}}">Login</a> -->


                    <div class="btn-wrapper">
                        <a href="#" class="cmn-btn1 popup-btn-login">
                            <i class="las la-plus-square"></i><span class="text">Login</span>
                        </a>
                    </div>
                </li>

                @endif
                @endif
                </ul>
            </div>
            </div>
        </nav>
    </header>
