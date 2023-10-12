@extends('layouts/base')
@section('container')

<main>

    <div class="section-padding2 plr">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xxl-3  col-xl-3 col-lg-4 col-md-5">
                    <div class="cateSidebar">
                        <h5 class="catTittle2">All Categories</h5>


                        <ul class="listing listScroll">
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon1.svg" class="icon" alt="images">
                                    <span>Electronics <span class="itemNumber">(1,200)</span></span>
                                </a></li>
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon2.svg" class="icon" alt="images"> <span> Mobile
                                        <span class="itemNumber">(1,299)</span></span>
                                </a></li>
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon3.svg" class="icon" alt="images"> <span>
                                        Vehicles <span class="itemNumber">(1,200)</span></span>
                                </a></li>
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon4.svg" class="icon" alt="images"> <span>
                                        Appliances <span class="itemNumber">(1,203)</span></span>
                                </a></li>
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon5.svg" class="icon" alt="images"> <span>
                                        Fashions <span class="itemNumber">(1,110)</span></span>
                                </a></li>
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon6.svg" class="icon" alt="images"> <span>
                                        Properties <span class="itemNumber">(1,200)</span></span>
                                </a></li>
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon7.svg" class="icon" alt="images"> <span> Pets
                                        <span class="itemNumber">(1,012)</span></span>
                                </a></li>
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon8.svg" class="icon" alt="images"> <span>
                                        Educations <span class="itemNumber">(1,301)</span></span>
                                </a></li>
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon9.svg" class="icon" alt="images"> <span>
                                        Businesses <span class="itemNumber">(902)</span></span>
                                </a></li>
                            <li class="listItem"><a href="{{'/product-list'}}" class="items">
                                    <img src="assets/img/icon/caticon10.svg" class="icon" alt="images"> <span>
                                        Sports <span class="itemNumber">(507)</span></span>
                                </a></li>
                        </ul>

                        <div class="price mb-10">
                            <h5 class="catTittle">Price</h5>

                            <form action="#" class="picPrice">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="Min">

                                            <div class="icon"><i class="las la-dollar-sign"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-form">
                                            <input type="text" placeholder="Max">

                                            <div class="icon"><i class="las la-dollar-sign"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="dateTime mb-30">
                            <h5 class="catTittle">Date Posted</h5>

                            <div class="datePicker">
                                <input id="datepicker1" placeholder="10/04/2022" />
                            </div>
                        </div>
                        <div class="btn-wrapper">
                            <a href="#" class="cmn-btn4 w-100"> Reset Filter</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-9  col-lg-8 col-md-7">
                    <div class="viewItems">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="select-itms">
                                    <select name="select" class="niceSelect">
                                        <option value>New York, USA</option>
                                        <option value>Location PK</option>
                                        <option value>Location US</option>
                                        <option value>Location UK</option>
                                    </select>
                                    <i class="las la-map-marker-alt  icon"></i>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="SearchWrapper">
                                    <div class="searchBox-wrapper">

                                        <form action="#" class="search-box">
                                            <div class="input-form">
                                                <input type="text" class=" keyup-input" placeholder="Search">

                                                <div class="icon">
                                                    <i class="las la-search"></i>
                                                </div>
                                            </div>
                                        </form>

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
                                                            <li class="list"> <a href="#" class="item">Dairy</a>
                                                            </li>
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
                                                                            src="assets/img/gallery/wishlist1.jpg"
                                                                            alt="img"></div>
                                                                    <div class="product-info">
                                                                        <div class="product-info-top">
                                                                            <h6 class="product-name">Fresh Fruits
                                                                            </h6>
                                                                        </div>
                                                                        <div class="product-price">
                                                                            <div class="price-update-through">
                                                                                <span class="flash-price fw-500">Rs
                                                                                    200.00</span>
                                                                                <span class="flash-old-prices">Rs
                                                                                    240</span>
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

                                    <div class="view">
                                        <button class="customTab active" data-toggle-target=".customTab-content-1"><i
                                                class="las la-th-large"></i></button>
                                        <button class="customTab" data-toggle-target=".customTab-content-2"><i
                                                class="las la-bars"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gridView customTab-content customTab-content-1 active">
                        <div class="row ">
                            <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                <div class="singleFeature mb-24">
                                    <div class="featureImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems8.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="featureCaption">
                                        <h4><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch 6</a>
                                        </h4>
                                        <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs139.40</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                <div class="singleFeature mb-24">
                                    <div class="featureImg">
                                        <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems2.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="featureCaption">
                                        <h4><a href="{{'/product-detail'}}" class="featureTittle">Samsung M32</a></h4>
                                        <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs139.40</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                <div class="singleFeature mb-24">
                                    <div class="featureImg">
                                        <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems3.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="featureCaption">
                                        <h4><a href="{{'/product-detail'}}" class="featureTittle">Persian cat</a></h4>
                                        <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs139.40</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                <div class="singleFeature mb-24">
                                    <div class="featureImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems4.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="featureCaption">
                                        <h4><a href="{{'/product-detail'}}" class="featureTittle">Beats headphone</a>
                                        </h4>
                                        <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs139.40</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                <div class="singleFeature mb-24">
                                    <div class="featureImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems5.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="featureCaption">
                                        <h4><a href="{{'/product-detail'}}" class="featureTittle">4 Bed 2 storey
                                                house</a></h4>
                                        <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs139.40</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                <div class="singleFeature mb-24">
                                    <div class="featureImg">
                                        <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems6.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="featureCaption">
                                        <h4><a href="{{'/product-details'}}" class="featureTittle">Apple smartwatch
                                                6</a>
                                        </h4>
                                        <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs139.40</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6  col-md-12  col-sm-6">
                                <div class="singleFeature mb-24">
                                    <div class="featureImg">
                                        <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems7.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="featureCaption">
                                        <h4><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch 6</a>
                                        </h4>
                                        <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs139.40</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6  col-md-12  col-sm-6">
                                <div class="singleFeature mb-24">
                                    <div class="featureImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems8.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="featureCaption">
                                        <h4><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch 6</a>
                                        </h4>
                                        <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs139.40</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6  col-md-12  col-sm-6">
                                <div class="singleFeature mb-24">
                                    <div class="featureImg">
                                        <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems9.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="featureCaption">
                                        <h4><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch 6</a>
                                        </h4>
                                        <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs139.40</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="listingView customTab-content customTab-content-2">
                        <div class="row ">
                            <div class="col-xl-6 col-lg-12">
                                <div class="singleFlexitem mb-24">
                                    <div class="recentImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems8.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <h5><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch 6</a>
                                        </h5>
                                        <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs146,300</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="singleFlexitem mb-24">
                                    <div class="recentImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems2.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <h5><a href="{{'/product-detail'}}" class="featureTittle">Samsung M32</a></h5>
                                        <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs124.80</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="singleFlexitem mb-24">
                                    <div class="recentImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems3.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <h5><a href="{{'/product-detail'}}" class="featureTittle">Persian cat</a></h5>
                                        <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs34.80</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="singleFlexitem mb-24">
                                    <div class="recentImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems4.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <h5><a href="{{'/product-detail'}}" class="featureTittle">Beats headphone</a>
                                        </h5>
                                        <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs150.19</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="singleFlexitem mb-24">
                                    <div class="recentImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems5.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <h5><a href="{{'/product-detail'}}" class="featureTittle">4 Bed 2 storey
                                                house</a></h5>
                                        <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs99.99</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="singleFlexitem mb-24">
                                    <div class="recentImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems6.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <h5><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch 6</a>
                                        </h5>
                                        <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs380</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="singleFlexitem mb-24">
                                    <div class="recentImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems7.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <h5><a href="{{'/product-detail'}}" class="featureTittle">4 Bed 2 storey
                                                house</a></h5>
                                        <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs99.99</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="singleFlexitem mb-24">
                                    <div class="recentImg">
                                        <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems8.jpg"
                                                alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <h5><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch 6</a>
                                        </h5>
                                        <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                ago</strong></p>
                                        <span class="featurePricing">Rs380</span>
                                        <div class="btn-wrapper">
                                            <span class="pro-btn1">Sell</span>
                                            <span class="pro-btn2">Exchange</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="pagination mt-60">
                                <ul class="pagination-list">
                                    <li class=" wow fadeInRight" data-wow-delay="0.0s"><a href="#"
                                            class="page-number"><i class="las la-angle-left"></i></a></li>
                                    <li><span class="page-number current">1</span></li>
                                    <li><a href="#" class="page-number">2</a></li>
                                    <li><a href="#" class="page-number">3</a></li>
                                    <li><a href="#" class="page-number">4</a></li>
                                    <li><a href="#" class="page-number">5</a></li>
                                    <li class=" wow fadeInLeft" data-wow-delay="0.0s"><a href="#" class="page-number"><i
                                                class="las la-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection