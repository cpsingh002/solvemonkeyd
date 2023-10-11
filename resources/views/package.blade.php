@extends('layouts/base')
@section('container')

<main>


    <section class="pricingCard section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                    <div class="section-tittle text-center mb-50">
                        <h2 class="tittle  "><span class="shape"></span>Post and Promote Your Listings</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">

                    <div class="singlePrice mb-24 wow fadeInLeft" data-wow-delay="0.0s">
                        <h4 class="priceTittle">Free</h4>
                        <ul class="listing">
                            <li class="listItem"><i class="las la-check icon"></i>
                                <blockquote class="priceTag">Your ad will be promoted for 3 days</blockquote>
                            </li>
                            <li class="listItem"><i class="las la-check icon"></i>
                                <blockquote class="priceTag">Get upto 10x times more responses</blockquote>
                            </li>
                            <li class="listItem"><i class="las la-check icon"></i>
                                <blockquote class="priceTag">Your Ad will be featured for 1st day</blockquote>
                            </li>
                        </ul>
                        <span class="price">$0 <span class="subTittle"> /For Lifetime</span></span>
                        <div class="btn-wrapper">
                            <a href="add_setting.html" class="cmn-btn-outline1">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">

                    <div class="singlePrice mb-24 wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="priceTittle">Standard</h4>
                        <ul class="listing">
                            <li class="listItem"><i class="las la-check icon"></i>Your ad will be promoted for 3 days
                            </li>
                            <li class="listItem"><i class="las la-check icon"></i>Get upto 10x times more responses</li>
                            <li class="listItem"><i class="las la-check icon"></i>Your Ad will be featured for 1st day
                            </li>
                        </ul>
                        <span class="price">$49<span class="subTittle"> /For 3 Days</span></span>
                        <div class="btn-wrapper">
                            <a href="add_setting.html" class="cmn-btn-outline1">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">

                    <div class="singlePrice mb-24 wow fadeInRight" data-wow-delay="0.0s">
                        <h4 class="priceTittle">Premium</h4>
                        <ul class="listing">
                            <li class="listItem"><i class="las la-check icon"></i>Your ad will be promoted for 3 days
                            </li>
                            <li class="listItem"><i class="las la-check icon"></i>Get upto 10x times more responses</li>
                            <li class="listItem"><i class="las la-check icon"></i>Your Ad will be featured for 1st day
                            </li>
                        </ul>
                        <span class="price">$99<span class="subTittle"> /For 4 days</span></span>
                        <div class="btn-wrapper">
                            <a href="add_setting.html" class="cmn-btn-outline1">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>

@endsection