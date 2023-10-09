@extends('layouts/base')
@section('container')

<main>

    <div class="body-overlay-desktop"></div>
    <div id="modal-wrapper" style="display:none">
        <div class="modal-wrapper-box text-center">

            <div class="close-icon">
                <i class="las la-times"></i>
            </div>
            <h2 class="modialTittle">Post Your <span>Ad</span> ?</h2>
            <div class="btn-wrapper">
                <a href="post-ad.html" class="cmn-btn02">Yes , Post ad</a>
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

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
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-10 m-auto">
                            <div class="form-check1">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-check-label" for="remember">
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
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>


                        </div>
                    </div>

                    <div class="row mb-0">
                    <p class="sinUp"><span>Don’t have an account? </span><a  class="singApp popup-btn-register text-violet fw-bold">Sign Up</a></p>
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    <div class="sliderArea plr ">
        <div class="slider-active">
            <div class="single-slider heroPadding d-flex align-items-center">
                <div class="container-fluid ">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xxl-6 col-xl-7 col-lg-7 ">
                            <div class="heroCaption">
                                <h1 class="tittle" data-animation="fadeInUp" data-delay="0.1s"><span
                                        class="tittleBg">Buy and sell </span><span class="lineBrack">anything you
                                        want</span></h1>
                                <p class="pera" data-animation="fadeInUp" data-delay="0.3s">Countrys most loved and
                                    trusted classified ad listing website classified ad.randomised words which don't
                                    look even slightly Browse thousand of items near you.</p>
                            </div>

                            <form action="#" class="search-box">
                                <div class="select-form" data-animation="fadeInLeft" data-delay="0.4s">
                                    <div class="select-itms">
                                        <select name="select" class="niceSelect">
                                            <option value>New York, USA</option>
                                            <option value>Location PK</option>
                                            <option value>Location US</option>
                                            <option value>Location UK</option>
                                            <option value>Location UK</option>
                                            <option value>Location UK</option>
                                            <option value>Location UK</option>
                                        </select>
                                        <i class="las la-map-marker-alt  icon"></i>
                                    </div>
                                </div>

                                <div class="searchBox-wrapper">
                                    <div class="input-form" data-animation="fadeInRight" data-delay="0.4s">
                                        <input type="text" class="input keyup-input" placeholder="Search...">
                                    </div>

                                    <div class="category-searchbar search-showHide">

                                        <span class="closed-icon"><i class="las la-times"></i></span>
                                        <div class="search-suggestions" id="search_suggestions_wrap">
                                            <div class="search-inner">
                                                <div class="category-suggestion item-suggestions">
                                                    <h6 class="item-title">Category Suggestions</h6>
                                                    <ul class="category-suggestion-list">
                                                        <li class="list"> <a href="#" class="item">Fruits &amp;
                                                                Vegetables</a>
                                                        </li>
                                                        <li class="list"><a href="#" class="item">Cooking</a>
                                                        </li>
                                                        <li class="list"> <a href="#" class="item">Dairy</a> </li>
                                                    </ul>
                                                </div>
                                                <div class="product-suggestion item-suggestions">
                                                    <h6 class="item-title">
                                                        <span>
                                                            Product Suggestions
                                                        </span>
                                                        <a href="#" target="_blank" id="search_result_all"
                                                            class="showAll">Show all</a>
                                                    </h6>
                                                    <ul class="product-suggestion-list mt-4"
                                                        id="search_result_products">
                                                        <li class="list">
                                                            <a href="#" class="item">
                                                                <div class="product-image"><img
                                                                        src="assets/img/gallery/phoneCat1.jpg"
                                                                        alt="img"></div>
                                                                <div class="product-info">
                                                                    <div class="product-info-top">
                                                                        <h6 class="product-name">Fresh Fruits</h6>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        <div class="price-update-through">
                                                                            <span
                                                                                class="flash-price fw-500">$200.00</span>
                                                                            <span class="flash-old-prices">$240</span>
                                                                        </div>
                                                                        <span class="stock-out">In Stock</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="search-form" data-animation="bounceIn" data-delay="0.4s">
                                    <button class="search-Btn"><i class="las la-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-xxl-5 col-xl-5 col-lg-5">
                            <div class="hero-man d-none d-lg-block f-right">
                                <img src="assets/img/hero/hero-man.jpg" alt="images" class="tilt-effect  "
                                    data-animation="fadeInRight" data-delay="0.2s">

                                <div class=" shapeHero shapeHero1" data-animation="fadeInLeft" data-delay="0.8s">
                                    <img src="assets/img/hero/heroShape1.png" alt="images" class="bouncingAnimation">
                                </div>

                                <div class=" shapeHero shapeHero2" data-animation="fadeInDown" data-delay="0.6s">
                                    <img src="assets/img/hero/heroShape2.png" alt="images" class="routedOne">
                                </div>

                                <div class=" shapeHero shapeHero3" data-animation="fadeInRight" data-delay="0.5s">
                                    <img src="assets/img/hero/heroShape3.png" alt="images" class="bounce-animate">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="ourServices  plr">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                    <div class="section-tittle text-center">
                        <h2 class="tittle  "><span class="shape"></span>Explore Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="listing">
                        <li class="singleServices wow fadeInUp" data-wow-delay="0.1s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services1.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Electronics</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                        <li class="singleServices wow fadeInDown" data-wow-delay="0.2s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services2.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Mobile</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                        <li class="singleServices wow fadeInUp" data-wow-delay="0.1s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services3.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Vehicles</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                        <li class="singleServices wow fadeInDown" data-wow-delay="0.2s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services4.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Appliances</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                        <li class="singleServices wow fadeInUp" data-wow-delay="0.1s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services5.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Fashions</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                        <li class="singleServices wow fadeInDown" data-wow-delay="0.2s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services6.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Properties</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                        <li class="singleServices wow fadeInUp" data-wow-delay="0.1s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services7.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Pets</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                        <li class="singleServices wow fadeInDown" data-wow-delay="0.2s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services8.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Educations</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                        <li class="singleServices wow fadeInUp" data-wow-delay="0.1s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services9.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Businesses</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                        <li class="singleServices wow fadeInDown" data-wow-delay="0.2s">
                            <div class="serviceIcon">
                                <img src="assets/img/icon/services10.svg" alt="images">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="ad_Lists.html" class="title">Sports</a></h4>
                                <p class="info">12,990 items</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="featureListing section-padding plr">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                    <div class="section-tittle">
                        <h2 class="tittle "><span class="shape"></span> Buy and Sale Items Listings </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="global-slick-init slider-inner-margin sliderArrow" data-infinite="true"
                        data-arrows="true" data-dots="false" data-slidesToShow="4" data-swipeToSlide="true"
                        data-autoplay="true" data-autoplaySpeed="2500"
                        data-prevArrow="<div class=&quot;prev-icon&quot;><i class=&quot;las la-angle-left&quot;></i></div>"
                        data-nextArrow="<div class=&quot;next-icon&quot;><i class=&quot;las la-angle-right&quot;></i></div>"
                        data-responsive="[{&quot;breakpoint&quot;: 1800,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1400,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 991,&quot;settings&quot;: {&quot;slidesToShow&quot;: 2}},{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 2}},{&quot;breakpoint&quot;: 576, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}}]">

                        <div class="singleFeature pb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/featuredImg1.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Apple smartwatch 6</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>

                        <div class="singleFeature pb-24">
                            <div class="featureImg">
                                <a href="add_details.html"> <img src="assets/img/gallery/featuredImg2.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Samsung M32</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>

                        <div class="singleFeature pb-24">
                            <div class="featureImg">
                                <a href="add_details.html"> <img src="assets/img/gallery/featuredImg3.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Persian cat</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>

                        <div class="singleFeature pb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/featuredImg4.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Beats headphone</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>

                        <div class="singleFeature pb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/featuredImg5.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">4 Bed 2 storey house</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>

                        <div class="singleFeature pb-24">
                            <div class="featureImg">
                                <a href="add_details.html"> <img src="assets/img/gallery/featuredImg1.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Apple smartwatch 6</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="exploreCategories section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                    <div class="section-tittle text-center mb-50">
                        <h2 class="tittle  "><span class="shape"></span>Post and Promote Your Listings</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 ">
                <div class="col">
                    <div class="singleCategories wow fadeInLeft mb-24" data-wow-delay=".2s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore1.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle"> Electronics </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="singleCategories wow fadeInLeft mb-24" data-wow-delay=".2s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore2.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle"> Mobiles </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="singleCategories wow fadeInDown mb-24" data-wow-delay=".2s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore3.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle"> Vehicles </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="singleCategories wow fadeInRight mb-24" data-wow-delay=".2s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore4.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle"> Appliances </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="singleCategories wow fadeInRight mb-24" data-wow-delay=".2s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore5.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle"> Fashions </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="singleCategories wow fadeInRight mb-24" data-wow-delay=".3s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore6.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle"> Property </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="singleCategories wow fadeInRight mb-24" data-wow-delay=".3s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore7.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle"> Pets </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="singleCategories wow fadeInUp mb-24" data-wow-delay=".2s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore8.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle"> Businesses </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="singleCategories wow fadeInLeft mb-24" data-wow-delay=".3s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore9.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle">Services </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="singleCategories wow fadeInLeft mb-24" data-wow-delay=".3s">
                        <a href="ad_Lists.html" class="catThumb">
                            <img src="assets/img/gallery/explore10.jpg" alt="images">
                        </a>
                        <div class="catCaptions">
                            <h6> <a href="ad_Lists.html" class="tittle"> Sports </a> </h6>
                            <p class="pera">12,990 items</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="aboutArea section-padding2 plr sectionBg1">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-xxl-5 col-xl-7 col-lg-6">
                    <div class="about-caption">

                        <div class="section-tittle section-tittle2 mb-40">
                            <h2 class="tittle wow fadeInUp" data-wow-delay="0.1s">Earn cash by selling<br> or Find
                                anything you desire</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">There are many variations of passages of
                                Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                injected humo or randomised words which don't look even slightlys</p>
                        </div>
                        <div class="btn-wrapper">
                            <a href="post-ad.html" class="cmn-btn2 mr-15 mb-10 wow fadeInLeft"
                                data-wow-delay="0.3s">Post your ad</a>
                            <a href="ad_Lists.html" class="cmn-btn3 mb-10 wow fadeInRight" data-wow-delay="0.3s">Browse
                                ads</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-5 col-lg-6 col-md-11">

                    <div class="aboutImg tilt-effect wow fadeInRight" data-wow-delay="0.1s">
                        <img src="assets/img/gallery/about.png" alt="images" class="bouncingAnimation ">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="recentListing section-padding plr">
        <div class="container-fluid ">

            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                    <div class="section-tittle">
                        <h2 class="tittle "><span class="shape"></span> Exchange Items Listings </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s">
                        <div class="singleFlexitem mb-24">
                            <div class="recentImg">
                                <a href="add_details.html"><img src="assets/img/gallery/recentListings1.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="recentCaption">
                                <h5><a href="add_details.html" class="featureTittle">Luxury couple apartment</a>
                                </h5>
                                <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                <span class="featurePricing">$146,300</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.1s">
                        <div class="singleFlexitem mb-24">
                            <div class="recentImg">
                                <a href="add_details.html"><img src="assets/img/gallery/recentListings2.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="recentCaption">
                                <h5><a href="add_details.html" class="featureTittle">Galaxy M32</a></h5>
                                <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                <span class="featurePricing">$124.80</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.2s">
                        <div class="singleFlexitem mb-24">
                            <div class="recentImg">
                                <a href="add_details.html"><img src="assets/img/gallery/recentListings3.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="recentCaption">
                                <h5><a href="add_details.html" class="featureTittle">Amazon smartwatch</a></h5>
                                <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                <span class="featurePricing">$34.80</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="borderStyle style1 wow fadeInRight social" data-wow-delay="0.3s">
                        <div class="singleFlexitem mb-24">
                            <div class="recentImg">
                                <a href="add_details.html"><img src="assets/img/gallery/recentListings4.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="recentCaption">
                                <h5><a href="add_details.html" class="featureTittle">Persian cat</a></h5>
                                <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                <span class="featurePricing">$150.19</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="borderStyle style1 wow fadeInRight social" data-wow-delay="0.1s">
                        <div class="singleFlexitem mb-24">
                            <div class="recentImg">
                                <a href="add_details.html"><img src="assets/img/gallery/recentListings5.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="recentCaption">
                                <h5><a href="add_details.html" class="featureTittle">Beats headphone</a></h5>
                                <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                <span class="featurePricing">$99.99</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="borderStyle style1 wow fadeInRight social" data-wow-delay="0.0s">
                        <div class="singleFlexitem mb-24">
                            <div class="recentImg">
                                <a href="add_details.html"><img src="assets/img/gallery/recentListings6.jpg"
                                        alt="images"></a>
                            </div>
                            <div class="recentCaption">
                                <h5><a href="add_details.html" class="featureTittle">A pair of sneakers</a></h5>
                                <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                <span class="featurePricing">$380</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">Sell</span>
                                    <span class="pro-btn2">Exchange</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="featureListing section-padding plr">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                    <div class="section-tittle mb-50">
                        <h2 class="tittle "><span class="shape"></span> Today's Listing </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">

                    <div class="singleFeature mb-24">
                        <div class="featureImg">
                            <a href="add_details.html"><img src="assets/img/gallery/featured8.jpg" alt="images"></a>
                        </div>
                        <div class="featureCaption">
                            <h4><a href="add_details.html" class="featureTittle">Apple smartwatch 6</a></h4>
                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                            <span class="featurePricing">$139.40</span>
                            <div class="btn-wrapper">
                                <span class="pro-btn1">Sell</span>
                                <span class="pro-btn2">Exchange</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="singleFeature mb-24">
                        <div class="featureImg">
                            <a href="add_details.html"> <img src="assets/img/gallery/featured2.jpg" alt="images"></a>
                        </div>
                        <div class="featureCaption">
                            <h4><a href="add_details.html" class="featureTittle">Samsung M32</a></h4>
                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                            <span class="featurePricing">$139.40</span>
                            <div class="btn-wrapper">
                                <span class="pro-btn1">Sell</span>
                                <span class="pro-btn2">Exchange</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="singleFeature mb-24">
                        <div class="featureImg">
                            <a href="add_details.html"> <img src="assets/img/gallery/featured3.jpg" alt="images"></a>
                        </div>
                        <div class="featureCaption">
                            <h4><a href="add_details.html" class="featureTittle">Persian cat</a></h4>
                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                            <span class="featurePricing">$139.40</span>
                            <div class="btn-wrapper">
                                <span class="pro-btn1">Sell</span>
                                <span class="pro-btn2">Exchange</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="singleFeature mb-24">
                        <div class="featureImg">
                            <a href="add_details.html"><img src="assets/img/gallery/featured4.jpg" alt="images"></a>
                        </div>
                        <div class="featureCaption">
                            <h4><a href="add_details.html" class="featureTittle">Beats headphone</a></h4>
                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                            <span class="featurePricing">$139.40</span>
                            <div class="btn-wrapper">
                                <span class="pro-btn1">Sell</span>
                                <span class="pro-btn2">Exchange</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="singleFeature mb-24">
                        <div class="featureImg">
                            <a href="add_details.html"><img src="assets/img/gallery/featured5.jpg" alt="images"></a>
                        </div>
                        <div class="featureCaption">
                            <h4><a href="add_details.html" class="featureTittle">4 Bed 2 storey house</a></h4>
                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                            <span class="featurePricing">$139.40</span>
                            <div class="btn-wrapper">
                                <span class="pro-btn1">Sell</span>
                                <span class="pro-btn2">Exchange</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="singleFeature mb-24">
                        <div class="featureImg">
                            <a href="add_details.html"> <img src="assets/img/gallery/featured6.jpg" alt="images"></a>
                        </div>
                        <div class="featureCaption">
                            <h4><a href="add_details.html" class="featureTittle">Apple smartwatch 6</a></h4>
                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                            <span class="featurePricing">$139.40</span>
                            <div class="btn-wrapper">
                                <span class="pro-btn1">Sell</span>
                                <span class="pro-btn2">Exchange</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="singleFeature mb-24">
                        <div class="featureImg">
                            <a href="add_details.html"> <img src="assets/img/gallery/featured7.jpg" alt="images"></a>
                        </div>
                        <div class="featureCaption">
                            <h4><a href="add_details.html" class="featureTittle">Apple smartwatch 6</a></h4>
                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                            <span class="featurePricing">$139.40</span>
                            <div class="btn-wrapper">
                                <span class="pro-btn1">Sell</span>
                                <span class="pro-btn2">Exchange</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="singleFeature mb-24">
                        <div class="featureImg">
                            <a href="add_details.html"> <img src="assets/img/gallery/featured8.jpg" alt="images"></a>
                        </div>
                        <div class="featureCaption">
                            <h4><a href="add_details.html" class="featureTittle">Apple smartwatch 6</a></h4>
                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                            <span class="featurePricing">$139.40</span>
                            <div class="btn-wrapper">
                                <span class="pro-btn1">Sell</span>
                                <span class="pro-btn2">Exchange</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="testimonialArea section-padding2 plr">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                    <div class="section-tittle mb-15">
                        <h2 class="tittle "><span class="shape"></span> Testimonials</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="colo-lg-12">
                    <div class="global-slick-init slider-inner-margin sliderArrow" data-infinite="true"
                        data-arrows="true" data-dots="false" data-slidesToShow="4" data-swipeToSlide="true"
                        data-autoplay="true" data-autoplaySpeed="2500"
                        data-prevArrow="<div class=&quot;prev-icon&quot;><i class=&quot;las la-angle-left&quot;></i></div>"
                        data-nextArrow="<div class=&quot;next-icon&quot;><i class=&quot;las la-angle-right&quot;></i></div>"
                        data-responsive="[{&quot;breakpoint&quot;: 1800,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1400,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 991,&quot;settings&quot;: {&quot;slidesToShow&quot;: 2}},{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 2}},{&quot;breakpoint&quot;: 576, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}}]">

                        <div class="singleTestimonial">
                            <div class="testimonialCap">
                                <ul class="rattingList">
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                </ul>
                                <div class="testiPera">
                                    <p class="pera">Solve Monkey is a great place to sell pre-loved and new items. I
                                        sold more than $80,000 on this platform.
                                        my all buyers are extremely happy</p>
                                </div>

                                <div class="testimonialClient d-flex align-items-center">
                                    <div class="clientImg">
                                        <img src="assets/img/gallery/client1.png" alt="images">
                                    </div>
                                    <div class="clientText">
                                        <span class="clientName">Rian Saddine</span>
                                        <p class="clinetDisCrip">Solve Monkey seller</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="singleTestimonial">
                            <div class="testimonialCap">
                                <ul class="rattingList">
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                </ul>
                                <div class="testiPera">
                                    <p class="pera">Solve Monkey is a great place to sell pre-loved and new items. I
                                        sold more than $80,000 on this platform.
                                        my all buyers are extremely happy</p>
                                </div>

                                <div class="testimonialClient d-flex align-items-center">
                                    <div class="clientImg">
                                        <img src="assets/img/gallery/client2.png" alt="images">
                                    </div>
                                    <div class="clientText">
                                        <span class="clientName">Paul Anderson</span>
                                        <p class="clinetDisCrip">Solve Monkey seller</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="singleTestimonial">
                            <div class="testimonialCap">
                                <ul class="rattingList">
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                </ul>
                                <div class="testiPera">
                                    <p class="pera">Solve Monkey is a great place to sell pre-loved and new items. I
                                        sold more than $80,000 on this platform.
                                        my all buyers are extremely happy</p>
                                </div>

                                <div class="testimonialClient d-flex align-items-center">
                                    <div class="clientImg">
                                        <img src="assets/img/gallery/client3.png" alt="images">
                                    </div>
                                    <div class="clientText">
                                        <span class="clientName">Harman Preet</span>
                                        <p class="clinetDisCrip">Solve Monkey seller</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="singleTestimonial">
                            <div class="testimonialCap">
                                <ul class="rattingList">
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                </ul>
                                <div class="testiPera">
                                    <p class="pera">Solve Monkey is a great place to sell pre-loved and new items. I
                                        sold more than $80,000 on this platform.
                                        my all buyers are extremely happy</p>
                                </div>

                                <div class="testimonialClient d-flex align-items-center">
                                    <div class="clientImg">
                                        <img src="assets/img/gallery/client4.png" alt="images">
                                    </div>
                                    <div class="clientText">
                                        <span class="clientName">Rian Saddine</span>
                                        <p class="clinetDisCrip">Solve Monkey seller</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="singleTestimonial">
                            <div class="testimonialCap">
                                <ul class="rattingList">
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                    <li class="listItems"><i class="las la-star icon"></i></li>
                                </ul>
                                <div class="testiPera">
                                    <p class="pera">Solve Monkey is a great place to sell pre-loved and new items. I
                                        sold more than $80,000 on this platform.
                                        my all buyers are extremely happy</p>
                                </div>

                                <div class="testimonialClient d-flex align-items-center">
                                    <div class="clientImg">
                                        <img src="assets/img/gallery/client1.png" alt="images">
                                    </div>
                                    <div class="clientText">
                                        <span class="clientName">David Norman</span>
                                        <p class="clinetDisCrip">Solve Monkey seller</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection