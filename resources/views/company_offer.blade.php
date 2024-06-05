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

        <div class="featureListing section-padding2">
            <div class="container">
                <div class="row mb-40">
                    <div class="col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Company Offers</a></li>
                                <!--<li class="breadcrumb-item"><a href="#">Mobile Phones</a></li>-->
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    @forelse($companyoffers as $companyoffer)
                        
                        
                        <div class="col-xl-3  col-lg-4  col-md-6 col-sm-6">
                            <div class="singleFeature mb-24">
                                <div class="featureImg">
                                    <a href="{{route('offer.details',['slug'=>$companyoffer->slug])}}"><img src="{{asset('admin/company/logo')}}/{{$companyoffer->company_logo}}"    alt="images"></a>
                                </div>
                                <div class="featureCaption fets">
                                    <h4><a href="{{route('offer.details',['slug'=>$companyoffer->slug])}}" class="featureTittle feets">{{$companyoffer->heading}}</a>
                                    </h4>
                                    <div class="d-flex justify-content-between">
                                    <p class="featureCap w-60">{{$companyoffer->company_name}}  </p> <strong class="subCap miss">{{$companyoffer->created_at->format('Y-m-d')}}</strong>
                                    </div>
                                    <!--<span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i> $139.40</span>-->
                                    <br>
                                    <div class="btn-wrapper">
                                      <a href="{{$companyoffer->offer_link}}" target="_blank">  <span class="pro-btn1">Visit</span></a>
                                       <a href="{{route('offer.details',['slug'=>$companyoffer->slug])}}"> <span class="pro-btn2">Read more</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <p> No Company Offer Persent</p>
                    @endforelse
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat2.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Samsung M32</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat3.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Nokia 105 Dual Sim</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat4.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Redmi 10</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat5.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Realme 5</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat6.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Oppo phone for sale</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat7.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Itel 5081</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat8.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Itel 5630</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat9.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">NOKIA 1100 Mobile</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat10.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Spark 2022 Go</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat11.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Apple smartwatch 6</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="singleFeature mb-24">
                            <div class="featureImg">
                                <a href="add_details.html"><img src="assets/img/gallery/phoneCat12.jpg" alt="images" /></a>
                            </div>
                            <div class="featureCaption">
                                <h4><a href="add_details.html" class="featureTittle">Iqoo 9 Pro 5G</a></h4>
                                <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs ago</strong></p>
                                <span class="featurePricing">$139.40</span>
                                <div class="btn-wrapper">
                                    <span class="pro-btn1">NEW</span>
                                    <span class="pro-btn2">PROMTED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-40">
                    <div class="col-lg-12">
                        <div class="pagination">
                            <ul class="pagination-list">
                                <li class="wow fadeInRight" data-wow-delay="0.0s">
                                    <a href="#" class="page-number"><i class="las la-angle-left"></i></a>
                                </li>
                                <li><span class="page-number current">1</span></li>
                                <li><a href="#" class="page-number">2</a></li>
                                <li><a href="#" class="page-number">3</a></li>
                                <li><a href="#" class="page-number">4</a></li>
                                <li><a href="#" class="page-number">5</a></li>
                                <li class="wow fadeInLeft" data-wow-delay="0.0s">
                                    <a href="#" class="page-number"><i class="las la-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection