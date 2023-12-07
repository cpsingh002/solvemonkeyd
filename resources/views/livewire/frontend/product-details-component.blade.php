<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <main>
    <div class="proDetails section-padding2">
        <div class="container">

            <div class="row mb-40">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">{{$product->category->slug }}</a></li>
                            <li class="breadcrumb-item"><a href="#">{{$product->subcategory->slug }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-7 col-lg-12">

                    <div class="product-view-wrap" id="myTabContent" wire:ignore>
                        <div class="shop-details-gallery-slider global-slick-init slider-inner-margin sliderArrow"
                            data-asNavFor=".shop-details-gallery-nav" data-infinite="true" data-arrows="false"
                            data-dots="false" data-slidesToShow="1" data-swipeToSlide="true" data-fade="true"
                            data-autoplay="true" data-autoplaySpeed="2500"
                            data-prevArrow="<div class=&quot;prev-icon&quot;><i class=&quot;las la-angle-left&quot;></i></div>"
                            data-nextArrow="<div class=&quot;next-icon&quot;><i class=&quot;las la-angle-right&quot;></i></div>"
                            data-responsive="[{&quot;breakpoint&quot;: 1800,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 1400,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 991,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}},{&quot;breakpoint&quot;: 576, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}}]">
                            <div class="single-main-image">
                                <a href="#" class="long-img">
                                    <img src="{{asset('admin/product/feat')}}/{{$product->featimage}}" class="img-fluid" alt="{{$product->name}}">
                                </a>
                            </div>
                            @php
                                $images = explode(",",$product->images);
                            @endphp
                            @foreach($images as $image)
                                @if($image)
                                    <div class="single-main-image">
                                        <a href="#" class="long-img">
                                            <img src="{{asset('admin/product/image')}}/{{$image}}" class="img-fluid" alt="{{$product->name}}">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                            {{--<div class="single-main-image">
                                <a href="#" class="long-img">
                                    <img src="assets/img/gallery/proDetails2.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="single-main-image">
                                <a href="#" class="long-img">
                                    <img src="assets/img/gallery/proDetails3.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="single-main-image">
                                <a href="#" class="long-img">
                                    <img src="assets/img/gallery/proDetails4.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="single-main-image">
                                <a href="#" class="long-img">
                                    <img src="assets/img/gallery/proDetails5.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="single-main-image">
                                <a href="#" class="long-img">
                                    <img src="assets/img/gallery/proDetails6.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="single-main-image">
                                <a href="#" class="long-img">
                                    <img src="assets/img/gallery/proDetails1.jpg" class="img-fluid" alt="image">
                                </a>
                            </div>--}}
                        </div>

                        <div class="thumb-wrap">
                            <div class="shop-details-gallery-nav global-slick-init slider-inner-margin sliderArrow"
                                data-asNavFor=".shop-details-gallery-slider" data-focusOnSelect="true"
                                data-infinite="true" data-arrows="false" data-dots="false" data-slidesToShow="6"
                                data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                                data-prevArrow="<div class=&quot;prev-icon&quot;><i class=&quot;las la-angle-left&quot;></i></div>"
                                data-nextArrow="<div class=&quot;next-icon&quot;><i class=&quot;las la-angle-right&quot;></i></div>"
                                data-responsive="[{&quot;breakpoint&quot;: 1800,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 1400,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 991,&quot;settings&quot;: {&quot;slidesToShow&quot;: 6}},{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 576, &quot;settings&quot;: {&quot;slidesToShow&quot;: 4}}]">
                                <div class="single-thumb">
                                    <a class="thumb-link" data-toggle="tab" href="#image-01">
                                        <img src="{{asset('admin/product/feat')}}/{{$product->featimage}}" alt="image">
                                    </a>
                                </div>
                                @php
                                    $images = explode(",",$product->images);
                                @endphp
                                @foreach($images as $key=>$image)
                                    @if($image)
                                        <div class="single-thumb">
                                            <a class="thumb-link" data-toggle="tab" href="#image-0{{$key+2}}">
                                                <img src="{{asset('admin/product/image')}}/{{$image}}" alt="thumb">
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                                {{--<div class="single-thumb">
                                    <a class="thumb-link" data-toggle="tab" href="#image-03">
                                        <img src="assets/img/gallery/proDetailsNav3.jpg" alt="thumb">
                                    </a>
                                </div>
                                <div class="single-thumb">
                                    <a class="thumb-link" data-toggle="tab" href="#image-04">
                                        <img src="assets/img/gallery/proDetailsNav4.jpg" alt="thumb">
                                    </a>
                                </div>
                                <div class="single-thumb">
                                    <a class="thumb-link" data-toggle="tab" href="#image-05">
                                        <img src="assets/img/gallery/proDetailsNav5.jpg" alt="thumb">
                                    </a>
                                </div>
                                <div class="single-thumb">
                                    <a class="thumb-link" data-toggle="tab" href="#image-06">
                                        <img src="assets/img/gallery/proDetailsNav6.jpg" alt="thumb">
                                    </a>
                                </div>
                                <div class="single-thumb">
                                    <a class="thumb-link" data-toggle="tab" href="#image-01">
                                        <img src="assets/img/gallery/proDetailsNav6.jpg" alt="thumb">
                                    </a>
                                </div>--}}
                            </div>
                        </div>
                    </div>

                    <div class="proDescription">

                        <div class="descriptionTop">
                            <h4><a href="#" class="detailsTittle">{{$product->name}} <i
                                        class="lar la-heart icon"></i></a></h4>
                                        @php
                                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                                        @endphp
                            @if($witems->contains($product->id))
                                    <a href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="lar la-heart  fill-heart icon"></i></a>
                                @else
                                    <a href="#" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}' ,{{$product->prices}})"><i class="lar la-heart icon"></i></a>
                                @endif
                            <p class="detailsCap">Posted on {{$product->created_at->format('d M Y')}}</p>
                            <span class="detailsPricing">Rs {{$product->prices}}</span>
                            <div class="infoSingle">
                                <ul class="listing">
                                    @foreach($pattributes as $pattribute)
                                    <li class="listItem"><i class="las la-bed icon"></i>{{$pattribute->attribute->attribute}} {{$pattribute->attributeoption->option_details}}</li>
                                    @endforeach
                                    <li class="listItem"><i class="las la-bath icon"></i>2 Bath</li>
                                    <li class="listItem"><i class="las la-map-marker-alt icon"></i>{{$product->address}}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="descriptionMid">
                            <h4 class="priceTittle">Description</h4>
                            {!! $product->description!!}
                           {{-- <ul class="listing">
                                <li class="listItem"><i class="las la-check icon"></i>All documents are ok</li>
                                <li class="listItem"><i class="las la-check icon"></i>Ready to move</li>
                                <li class="listItem"><i class="las la-check icon"></i>Riverview</li>
                                <li class="listItem"><i class="las la-check icon"></i>24/7 Water, Gas, Electricity</li>
                                <li class="listItem"><i class="las la-check icon"></i>Schools and Market in 2km</li>
                            </ul>
                            <p class="pera">Direct repair of aneurysm, pseudoaneurysm, or excision (partial or total)
                                and graft insertion, with or without patch graft; for aneurysm, pseudoaneurysm, and
                                associated occlusive disease, abdominal aorta involving iliac vessels (common,
                                hypogastric, external) 
                            </p> --}}
                        </div>

                        <div class="descriptionFooter">
                            <div class="btn-wrapper">
                                <a href="#" class="cmn-btn-outline2"><i
                                        class="lab la-font-awesome-flag icon"></i>Report</a>
                            </div>
                            <div class="socialWrap">
                                <a href="#" class="social"><i class="lab la-facebook-square"></i></a>
                                <a href="#" class="social"><i class="lab la-twitter"></i></a>
                                <a href="#" class="social"><i class="lab la-linkedin"></i></a>
                                <a href="#" class="social"><i class="lar la-bell"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12">
                    <div class="sellerMessage mb-24">
                        <div class="singleFlexitem mb-24">
                            <div class="recentImg">
                                @if(Auth::check())
                                <img src="{{asset('admin/userprofile')}}/{{Auth::user()->profile}}" alt="images">
                                @else
                                <img src="{{asset('admin/userprofile/solve.png')}}" alt="images">
                                @endif
                            </div>
                            <div class="recentCaption">
                                <h5><a href="{{'product-details'}}" class="featureTittle">{{$product->owner_name}} <img
                                            src="assets/img/icon/checkMark.svg" class="icon" alt="images"></a></h5>
                                <p class="featureCap">Member since 2019</p>
                            </div>
                        </div>
                        <div class="singleFlexitem mb-24">
                        <div id="mapproduct" class="map-item" style="padding-bottom: 50%;overflow: hidden;position: relative;width: 100%;"> </div>
                        </div>
                         <form action="#" class="contactSeller">
                            <div class="row">
                                
                                
                                    @if($haveCouponCode == 1)
                                    <div class="col-lg-8">
                                        <div class="input-form">
                                            <input type="text" value="{{$product->contact_number}}" readonly>

                                            <div class="icon"><i class="las la-phone"></i></div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(Session::has('message'))
                                         <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                <div class="col-lg-4">
                                    <div class="btn-wrapper mb-20">
                                        <a href="#" class="cmn-btn-outline3 w-100" wire:click.prevent="checkplan">Reveal Contact</a>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                        <div class="btn-wrapper">
                            <a href="#" class="cmn-btn-outline2 w-100"><i class="las la-comments icon"></i>Message
                                seller</a>
                        </div>




                        <div class="btn-wrapper">
                            <h4 class="pro-btn1 w-100 text-center font-size-16">Interested In
                                <p class="text-black">{{$product->exchange_for}}</p>
                            </h4>
                        </div>
                    </div>
                    <section class="recentListing">
                        @foreach($related_products as $rproduct)
                        <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.1s">
                            <div class="singleFlexitem mb-24">
                                <div class="recentImg">
                                    <img src="{{asset('admin/product/feat')}}/{{$rproduct->featimage}}" alt="{{$rproduct->name}}" width="200">
                                </div>
                                <div class="recentCaption">
                                    <h5><a href="{{'product-details'}}" class="featureTittle">{{$rproduct->name}}</a></h5>
                                    <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                    <span class="featurePricing">Rs {{$rproduct->proces}}</span>
                                    <div class="btn-wrapper">
                                        @if($product->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                        @if($product->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                        @if($product->is_rent == 1)  <span class="pro-btn2">Rent</span>     @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.2s">
                            <div class="singleFlexitem mb-24">
                                <div class="recentImg">
                                    <img src="assets/img/gallery/recentListings2.jpg" alt="images">
                                </div>
                                <div class="recentCaption">
                                    <h5><a href="{{'product-details'}}" class="featureTittle">Galaxy M32</a></h5>
                                    <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                    <span class="featurePricing">Rs 124.80</span>
                                    <div class="btn-wrapper">
                                        <span class="pro-btn1">Sell</span>
                                        <span class="pro-btn2">Exchange</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.3s">
                            <div class="singleFlexitem mb-24">
                                <div class="recentImg">
                                    <img src="assets/img/gallery/recentListings3.jpg" alt="images">
                                </div>
                                <div class="recentCaption">
                                    <h5><a href="{{'product-details'}}" class="featureTittle">Amazon smartwatch</a></h5>
                                    <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                    <span class="featurePricing">Rs 34.80</span>
                                    <div class="btn-wrapper">
                                        <span class="pro-btn1">Sell</span>
                                        <span class="pro-btn2">Exchange</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</main>
</div>
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5fD8-BwH8kMsjb-HQS_4NG0f7FRcHS4&callback=drawMap" async></script>
    <script type="text/javascript">
        var map;
            function drawMap() {              
                var mapOptions = {
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    fullscreenControl: false 
                }
                        
                var myLatlng = new google.maps.LatLng(<?php echo (float)$product->lat;?>, <?php echo (float)$product->lang;?>);
                mapOptions.center = new google.maps.LatLng(<?php echo $product->lat;?>, <?php echo $product->lang;?>) // London
                map = new google.maps.Map(document.getElementById("mapproduct"), mapOptions);
                var marker = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                icon: "{{asset('frontend/img/p (1).png')}}",
                                title: "<?php echo $product->name;?>",
                            });
    
                    
                }
                </script>  
 @endpush