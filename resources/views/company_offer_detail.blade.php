 @extends('layouts.base1')

@section('content')
 <main>
    <!--<div class="body-overlay-desktop"></div>-->
    <!--<div class="modal-wrapper text-center">-->
    <!--    <div class="close-icon">-->
    <!--        <i class="las la-times"></i>-->
    <!--    </div>-->
    <!--    <h2 class="modialTittle">Post Your <span>Ad</span> ?</h2>-->
    <!--    <div class="btn-wrapper">-->
    <!--        <a href="add_listing_Details.html" class="cmn-btn02">Yes , Post ad</a>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="proDetails section-padding2">
        <div class="container">
            <div class="row mb-40">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('comapny.offer')}}">Company Offers</a></li>
                            <li class="breadcrumb-item"><a href="#">{{$companyoffer->heading}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <div class="product-view-wrap" id="myTabContent">
                        <div class="shop-details-gallery-slider global-slick-init slider-inner-margin sliderArrow" >
                            <div class="single-main-image">
                                <a href="#" class="long-img">
                                    <img src="{{asset('admin/company/template')}}/{{$companyoffer->offer_template}}" class="img-fluid" alt="image"  style="height:450px";/>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="proDescription">
                        <div class="descriptionTop">
                            <h4>
                                <span class="detailsTittle">{{$companyoffer->heading}} <a href="{{$companyoffer->offer_link}}"><i class="lar icon">Visit Link</i></a></span>
                            </h4>
                            <p class="detailsCap">{{$companyoffer->created_at->format('Y-m-d')}}</p>
                            <!--<span class="detailsPricing"><a href="{{$companyoffer->offer_link}}">Visit Link</a></span>-->
                            <!--<div class="infoSingle">-->
                            <!--    <ul class="listing">-->
                            <!--        <li class="listItem"><i class="las la-bed icon"></i>2 Bed</li>-->
                            <!--        <li class="listItem"><i class="las la-bath icon"></i>2 Bath</li>-->
                            <!--        <li class="listItem"><i class="las la-map-marker-alt icon"></i>8502 Preston Rd. Inglewood, Maine</li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                        </div>

                        <div class="descriptionMid">
                            <h4 class="priceTittle">Description</h4>
                            <p class="pera">
                                {!! $companyoffer->offer_details !!}
                            </p>
                        </div>

                        <!--<div class="descriptionFooter">-->
                        <!--    <div class="btn-wrapper">-->
                        <!--        <a href="#" class="cmn-btn-outline2"><i class="lab la-font-awesome-flag icon"></i>Report</a>-->
                        <!--    </div>-->
                        <!--    <div class="socialWrap">-->
                        <!--        <a href="#" class="social"><i class="lab la-facebook-square"></i></a>-->
                        <!--        <a href="#" class="social"><i class="lab la-twitter"></i></a>-->
                        <!--        <a href="#" class="social"><i class="lab la-linkedin"></i></a>-->
                        <!--        <a href="#" class="social"><i class="lar la-bell"></i></a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12">
                    <div class="sellerMessage mb-24">
                        <div class="singleFlexitem mb-24">
                            <div class="recentImg">
                                <img src="{{asset('admin/company/logo')}}/{{$companyoffer->company_logo}}" alt="images" />
                            </div>
                            <div class="recentCaption">
                                <h5>
                                    <a href="#" class="featureTittle">{{$companyoffer->company_name}} <img src="{{asset('assets/img/icon/checkMark.svg')}}" class="icon" alt="images" /></a>
                                </h5>
                                <!--<p class="featureCap">Member since 2019</p>-->
                            </div>
                        </div>
                        <!--<form action="#" class="contactSeller">-->
                        <!--    <div class="row">-->
                        <!--        <div class="col-lg-8">-->
                        <!--            <div class="input-form">-->
                        <!--                <input type="text" placeholder="(704) *** ***" />-->

                        <!--                <div class="icon"><i class="las la-phone"></i></div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="col-lg-4">-->
                        <!--            <div class="btn-wrapper mb-20">-->
                        <!--                <a href="#" class="cmn-btn-outline3 w-100">Reveal Contact</a>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</form>-->
                        <!--<div class="btn-wrapper">-->
                        <!--    <a href="#" class="cmn-btn-outline2 w-100"><i class="las la-comments icon"></i>Message seller</a>-->
                        <!--</div>-->
                    </div>
                    <section class="recentListing">
                        <div class="btn-wrapper">
                            <a href="#" class="cmn-btn-outline2 w-100"><i class="las icon"></i>Related Offer</a>
                        </div>
                        @forelse($rcompanyoffers as $rcompanyoffer)
                            <div class=" col-md-12 col-md-6 mt-4">
                                <div class="borderStyle style1 wow fadeInLeft social " data-wow-delay="0.1s">
                            <div class="singleFlexitem mb-24">
                                <div class="recentImg">
                                    <img src="{{asset('admin/company/logo')}}/{{$rcompanyoffer->compnay_logo}}" alt="logo" width="200">
                                </div>
                                <div class="recentCaption">
                                    <h5><a href="{{route('offer.details',['slug'=>$companyoffer->slug])}}" class="featureTittle">{{ucfirst($rcompanyoffer->heading)}}</a></h5>
                                    <div class="d-flex justify-content-between">
                                        <p class="featureCap w-60">{{$companyoffer->company_name}}</p>  <strong class="subCap miss">{{$companyoffer->created_at->format('Y-m-d')}}</strong>
                                    </div>
                                    
                                    <div class="btn-wrapper">
                                        <a href="{{$rcompanyoffer->offer_link}}" target="_blank">  <span class="pro-btn1">Visit</span></a>
                                       <a href="{{route('offer.details',['slug'=>$rcompanyoffer->slug])}}"> <span class="pro-btn2">Read more</span></a>  
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        @empty
                        <p> No Realted Offer </p>
                        @endforelse
                        <!--<div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.2s">-->
                        <!--    <div class="singleFlexitem mb-24">-->
                        <!--        <div class="recentImg">-->
                        <!--            <img src="assets/img/gallery/recentListings2.jpg" alt="images" />-->
                        <!--        </div>-->
                        <!--        <div class="recentCaption">-->
                        <!--            <h5><a href="add_details.html" class="featureTittle">Galaxy M32</a></h5>-->
                        <!--            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>-->
                        <!--            <span class="featurePricing">$124.80</span>-->
                        <!--            <div class="btn-wrapper">-->
                        <!--                <span class="pro-btn1">RENOVETED</span>-->
                        <!--                <span class="pro-btn2">PROMOTED</span>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.3s">-->
                        <!--    <div class="singleFlexitem mb-24">-->
                        <!--        <div class="recentImg">-->
                        <!--            <img src="assets/img/gallery/recentListings3.jpg" alt="images" />-->
                        <!--        </div>-->
                        <!--        <div class="recentCaption">-->
                        <!--            <h5><a href="add_details.html" class="featureTittle">Amazon smartwatch</a></h5>-->
                        <!--            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>-->
                        <!--            <span class="featurePricing">$34.80</span>-->
                        <!--            <div class="btn-wrapper">-->
                        <!--                <span class="pro-btn1">RENOVETED</span>-->
                        <!--                <span class="pro-btn2">PROMOTED</span>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection