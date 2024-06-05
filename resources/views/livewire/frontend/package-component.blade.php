<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                @if(Session::has('message'))
                     <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <div class="row">
                    @foreach($packages as $package)
                    <div class="col-lg-4 col-md-6">

                        <div class="singlePrice mb-24 wow fadeInLeft" data-wow-delay="0.0s">
                            <h4 class="priceTittle">{{$package->pname}}</h4>
                            <ul class="listing">
                                {!!$package->description !!}
                               {{-- <li class="listItem"><i class="las la-check icon"></i>
                                    <blockquote class="priceTag">Your ad will be promoted for 3 days</blockquote>
                                </li>
                                <li class="listItem"><i class="las la-check icon"></i>
                                    <blockquote class="priceTag">Get upto 10x times more responses</blockquote>
                                </li>
                                <li class="listItem"><i class="las la-check icon"></i>
                                    <blockquote class="priceTag">Your Ad will be featured for 1st day</blockquote>
                                </li>--}}
                                <li class="listItem mt-3"><i class="las la-check icon"></i>
                                    <blockquote class="priceTag">{{$package->count}} Count</blockquote>
                                </li>
                            </ul>
                            <span class="price"><i class="fa-solid fa-indian-rupee-sign"></i> {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$package->price)}} <span class="subTittle"> /{{$package->validity}} Days</span></span>
                            <div class="btn-wrapper">
                                <a href="#" wire:click.prevent="checklogin({{$package->id}})" class="cmn-btn-outline1">Get Started</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  {{--  <div class="col-lg-4 col-md-6">

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
                                <li class="listItem"><i class="las la-check icon"></i>Your ad will be promoted for 3
                                    days
                                </li>
                                <li class="listItem"><i class="las la-check icon"></i>Get upto 10x times more responses
                                </li>
                                <li class="listItem"><i class="las la-check icon"></i>Your Ad will be featured for 1st
                                    day
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
                                <li class="listItem"><i class="las la-check icon"></i>Your ad will be promoted for 3
                                    days
                                </li>
                                <li class="listItem"><i class="las la-check icon"></i>Get upto 10x times more responses
                                </li>
                                <li class="listItem"><i class="las la-check icon"></i>Your Ad will be featured for 1st
                                    day
                                </li>
                            </ul>
                            <span class="price">$99<span class="subTittle"> /For 4 days</span></span>
                            <div class="btn-wrapper">
                                <a href="add_setting.html" class="cmn-btn-outline1">Get Started</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>


    </main>
</div>