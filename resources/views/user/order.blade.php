@extends('layouts/base')
@section('container')

<main>

   
    <div class="myAccout section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5">

                    <div class="accountSidebar">
                        <ul class="listing listScroll">
                            <li class="listItem">
                                <a href="{{'user-dashboard'}}" class="items active"> <i
                                        class="lar la-user-circle icon"></i> Dashboard</a>
                            </li>
                            <li class="listItem">
                                <a href="{{'user-account'}}" class="items "> <i class="lar la-user-circle icon"></i> My
                                    Account</a>
                            </li>
                            <li class="listItem">
                                <a href="{{'user-ads'}}" class="items"><i class="las la-ad icon"></i> My Product
                                    Ads</a>
                            </li>
                            <li class="listItem">
                                <a href="{{'order'}}" class="items"><i class="las la-ad icon"></i> My Orders</a>
                            </li>
                            <li class="listItem">
                                <a href="wish_list.html" class="items"> <i class="lar la-heart icon"></i> Wishlist</a>
                            </li>
                            <li class="listItem">
                                <a href="messages.html" class="items"> <i class="lar la-heart icon"></i> Chat</a>
                            </li>
                            <!-- <li class="listItem">
<a href="help.html" class="items"> <i class="lar la-question-circle icon"></i> Help</a>
</li> -->
                        </ul>
                        <div class="accessAccount">
                            <a href="#" class="account-btn"><i class="las la-sign-out-alt icon"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-7">

                    <div class="row mb-24">
                        <div class="col-sm-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#"> Wishlist</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>


                    <div class="promoteAds">
                        <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s">
                            <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                <div class="adsCap">
                                    <div class="adsImg">
                                        <img src="../assets/img/gallery/wishlist1.jpg" alt="images">
                                    </div>
                                    <div class="adsCaption">
                                        <h5><a href="../add_details.html" class="adsTittle">A pair of sneakers for
                                                sell</a></h5>
                                        <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                        <span class="adsPricing">Rs 330.80</span>
                                    </div>
                                </div>
                                <div class="btn-wrapper mb-20">
                                    <a href="wish_list.html" class="cmn-btn-outline5"><i
                                            class="las la-heart icon"></i>Completed</a>
                                </div>
                            </div>
                        </div>


                        <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s">
                            <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.2s">
                                <div class="adsCap">
                                    <div class="adsImg">
                                        <img src="../assets/img/gallery/wishlist2.jpg" alt="images">
                                    </div>
                                    <div class="adsCaption">
                                        <h5><a href="../add_details.html" class="adsTittle">Luxury couple apartment</a>
                                        </h5>
                                        <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                        <span class="adsPricing">$120.34</span>
                                    </div>
                                </div>
                                <div class="btn-wrapper mb-20">
                                    <a href="wish_list.html" class="cmn-btn-outline5"><i
                                            class="las la-heart icon"></i>Completed</a>
                                </div>
                            </div>
                        </div>

                        <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s">
                            <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                <div class="adsCap">
                                    <div class="adsImg">
                                        <img src="../assets/img/gallery/wishlist1.jpg" alt="images">
                                    </div>
                                    <div class="adsCaption">
                                        <h5><a href="../add_details.html" class="adsTittle">A pair of sneakers for
                                                sell</a></h5>
                                        <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                        <span class="adsPricing">Rs 330.80</span>
                                    </div>
                                </div>
                                <div class="btn-wrapper mb-20">
                                    <a href="wish_list.html" class="cmn-btn-outline5"><i
                                            class="las la-heart icon"></i>Pending</a>
                                </div>
                            </div>
                        </div>


                        <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s">
                            <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.2s">
                                <div class="adsCap">
                                    <div class="adsImg">
                                        <img src="../assets/img/gallery/wishlist2.jpg" alt="images">
                                    </div>
                                    <div class="adsCaption">
                                        <h5><a href="../add_details.html" class="adsTittle">Luxury couple apartment</a>
                                        </h5>
                                        <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                        <span class="adsPricing">$120.34</span>
                                    </div>
                                </div>
                                <div class="btn-wrapper mb-20">
                                    <a href="wish_list.html" class="cmn-btn-outline5"><i
                                            class="las la-heart icon"></i>Completed</a>
                                </div>
                            </div>
                        </div>

                        <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s">
                            <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                <div class="adsCap">
                                    <div class="adsImg">
                                        <img src="../assets/img/gallery/wishlist1.jpg" alt="images">
                                    </div>
                                    <div class="adsCaption">
                                        <h5><a href="../add_details.html" class="adsTittle">A pair of sneakers for
                                                sell</a></h5>
                                        <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong></p>
                                        <span class="adsPricing">$330.80</span>
                                    </div>
                                </div>
                                <div class="btn-wrapper mb-20">
                                    <a href="wish_list.html" class="cmn-btn-outline5"><i
                                            class="las la-heart icon"></i>Pending</a>
                                </div>
                            </div>
                        </div>


                        <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s">
                            <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.2s">
                                <div class="adsCap">
                                    <div class="adsImg">
                                        <img src="../assets/img/gallery/wishlist2.jpg" alt="images">
                                    </div>
                                    <div class="adsCaption">
                                        <h5><a href="../add_details.html" class="adsTittle">Luxury couple apartment</a>
                                        </h5>
                                        <p class="adsPera">Dallas, Texas ·<strong class="subCap">24hrs ago</strong></p>
                                        <span class="adsPricing">Rs 120.34</span>
                                    </div>
                                </div>
                                <div class="btn-wrapper mb-20">
                                    <a href="wish_list.html" class="cmn-btn-outline5"><i
                                            class="las la-heart icon"></i>Pending</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

</main>
@endsection