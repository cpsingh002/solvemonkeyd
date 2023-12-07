<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bytesed.com/tf/listocean/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2023 06:17:02 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords"
        content="ads, advertise, advertising, classified, classified ads, database, directory, jobs, listing, local, portal" />
    <meta name="description"
        content="Choose from 72 Premium classified ads Templates from the #1 source for classified ads Templates. Created by our Global Community of independent Web Developers." />
    <title>Solve Monkey</title>
    <link rel="icon" type="image/x-icon" sizes="20x20" href="{{asset('assets/img/icon/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/plugin.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('assets/css/main-style.css')}}"> -->

    <link rel="stylesheet" href="{{asset('assets/css/style-new.css')}}">
</head>

<body>
    <header class="header-style-01">
        <nav class="navbar navbar-area headerBg1 navbar-expand-lg  plr">
            <div class="container-fluid container-two nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
                        <a href="{{'/'}}" class="logo">
                            <img src="{{asset('assets/img/logo/solve-logo.png')}}" alt="images">
                        </a>
                    </div>

                    <a href="#0" class="click_show_icon"><i class="las la-ellipsis-v"></i> </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="NavWrapper">

                    <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                        <ul class="navbar-nav">
                            <li><a href="{{route('product-list')}}">All Ads</a></li>
                            <li><a href="{{route('about')}}">About us</a></li>
                            <li><a href="{{route('contact')}}">contact</a></li>
                        </ul>
                    </div>







                    <div class="sibeBar-Wrapper">

                        <div class="sideBar">

                            <a href="#" class="sidebarBtn">
                                <!-- <i class="las la-bars iconLeft"></i>  -->
                                <span class="allCat">All Categories</span><i class="las la-angle-down iconRight"></i>
                            </a>

                            @livewire('category-list-component')
                        </div>

                    </div>









                </div>

                <div class="nav-right-content">

                    <ul class="header-cart">
                        
                        @livewire('wishlist-count-component')



                        @if(Route::has('login'))
                        @auth
                        <li class="single chatBar">
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

                        </li>
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
                                        <a class="list-title" href="{{route('wishlist')}}"><i class="lar la-heart icon"></i>
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
                            <i class="las la-plus-square"></i><span class="text">Post your ad</span>
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


   

    {{$slot}}



    <div class="body-overlay-desktop"></div>
    <div id="modal-wrapper" style="display:none">
        <div class="modal-wrapper-box text-center">

            <div class="close-icon">
                <i class="las la-times"></i>
            </div>
            <h2 class="modialTittle">Post Your <span>Ad</span> ?</h2>
            <div class="btn-wrapper">
                <a href="{{route('post-ad')}}" class="cmn-btn02">Yes , Post ad</a>
            </div>
        </div>
    </div>

    <div id="modal-wrapper-login" style="display:none">
        <div class="modal-wrapper-box text-center">

            <div class="close-icon">
                <i class="las la-times"></i>
            </div>
            <h2 class="modialTittle">Login <span>Here</span> </h2>
            <div class="card-body">
                <form method="POST" action="#" id="frmLogin">
                    @csrf

                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-4 fw-bold col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password"
                            class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" 
                                autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
<div id="login_msg"></div>
                    <div class="row mb-3">
                        <div class="col-md-10 m-auto">
                            <div class="form-check1">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-check-label fw-bold" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                    </div>
                                    <div class="col-6">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12 m-auto">
                            <div class="btn-wrapper">
                                <button type="submit" class="pro-btn2 py-2 px-3">
                                    {{ __('Login') }}
                                </button>
                            </div>


                        </div>
                    </div>

                    <div class="row mt-2">
                        <p class="sinUp"><span>Don’t have an account? </span>
                        <a class="singApp popup-btn-register text-violet fw-bold">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div id="modal-wrapper-register" style="display:none">
        <div class="modal-wrapper-box text-center">

            <div class="close-icon">
                <i class="las la-times"></i>
            </div>
            <h2 class="modialTittle">Register <span>Here</span> </h2>
            <div class="card-body">
                <form method="POST" action="#" id="frmRegistar">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div id="name_error" class="field_error text-danger"></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div id="email_error" class="field_error text-danger"></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password"
                            class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div id="password_error" class="field_error text-danger"></div>
                    </div>
                    <div id="checkboxed_error" class="field_error text-danger"></div>
                    <div id="thank_you_msg" class="field_error text-center text-success"></div>
                    <div id="register_msg" class= "msg-show text-center text-danger"></div>
               
                    <div class="row mb-0">
                        <div class="col-md-12 text-center">
                            <div class="btn-wrapper">
                                <button type="submit" class="pro-btn2 py-2 px-3">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @livewire('footer-component')

    <div class="mouseCursor cursorOuter"></div>
    <div class="mouseCursor cursorInner"></div>

    <div class="progressParent">
        <svg class="backCircle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>

    <script src="{{asset('assets/js/plugin.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        jQuery('#frmRegistar').submit(function(e){
    
    e.preventDefault();
     jQuery('.field_error').html('');
    jQuery.ajax({
        url:'{{ route('uregisteor') }}',
        data:jQuery('#frmRegistar').serialize(),
        type:'post',
        success:function(result){
            if(result.status=="error"){
                jQuery.each(result.error,function(key,val){
                jQuery('#'+key+'_error').html(val[0]);
            });
               
            }
            if(result.status=="success"){
                // jQuery('#register_msg').html(result.msg);
                jQuery('#frmRegistar')[0].reset();
                jQuery('#thank_you_msg').html(result.msg);
            }
        }
    });
});

jQuery('#frmLogin').submit(function(e){
  jQuery('#login_msg').html("");
  e.preventDefault();
  jQuery.ajax({
    url:'{{ route('ulogin') }}',
    data:jQuery('#frmLogin').serialize(),
    type:'post',
    success:function(result){
      if(result.status=="error"){
        jQuery('#login_msg').html(result.msg);
      }
      if(result.status=="success"){
       window.location.reload();
      }
    }
  });
});
    </script>
    @livewireScripts
	@stack('scripts')
</body>

<!-- Mirrored from bytesed.com/tf/listocean/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2023 06:17:37 GMT -->

</html>