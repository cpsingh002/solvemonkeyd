

<style>

@media(max-width:830px){
     .sliderArea .shapeHero.shapeHero3 {
    right: 30px;
    top: 27% !important;
    z-index: 1;
}

.footerWrapper .footer-area .footer-tittle .listing .listItem .singleLinks {
    font-size: 11px !important;
  } 
  
  .footerWrapper .footer-area .footer-form .newsletter-footer .input {
    margin-left: -64px;
    width:100%;
}
 .recentListing .singleFlexitem .recentCaption .featureTittle {
    font-size: 15px;
    height: 25px;
    overflow: hidden;
}
}
@media(max-width:768px){
     .sliderArea .shapeHero.shapeHero3 {
    right: 30px;
    top: 27% !important;
    z-index: 1;
}

.footerWrapper .footer-area .footer-tittle .listing .listItem .singleLinks {
    font-size: 11px !important;
  } 
  
  .footerWrapper .footer-area .footer-form .newsletter-footer .input {
    margin-left: -64px;
    width:100%;
}
 .recentListing .singleFlexitem .recentCaption .featureTittle{
    font-size: 15px;
    height: 25px;
    overflow: hidden;
}
}


    .current{
        overflow: hidden;
    width: 83%;
    display: block;
    margin-left:4px;
    }
   
</style>



   <div> 
   @if(request()->has('verified'))
    <div class="alert alert-success">
        Your email has been successfully verified!
    </div>
@endif
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="sliderArea  ">
    
    <img src="assets/img/hero/SOLVE MONKEY BANNER 1.jpg" alt="images" class="col-lg-12 mb-5" style="height:350px;">
    
   {{-- <div class="slider-active">
        <div class="single-slider heroPadding d-flex align-items-center">
            
            <div class="container-fluid  ">
                
                <div class="row justify-content-between align-items-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7   ">
                        <div class="heroCaption">
                            <h1 class="tittle" data-animation="fadeInUp" data-delay="0.1s"><span
                                    class="tittleBg">One-Stop Destination to</span><span class="lineBrack">Exchange, Sell and Buy!</span></h1>
                            <p class="pera" data-animation="fadeInUp" data-delay="0.3s">Exchange anything, from cars to your plots to mobile, services, and even pets! No matter where you live, Solve Monkey allows you to exchange, sell, and buy. However, our USP is connecting 
                                                people with other individuals for exchange. Create your account, list your products, and wait for the right connection!</p>
                        </div>

                        <form action="{{route('searchs')}}" class="search-box" method="get" id="seacrhform" name="myform">
                            <div class="select-form" data-animation="fadeInLeft" data-delay="0.4s">
                                <div class="select-itms">
                                    <select name="s" class="niceSelect" required>
                                        <option value>Select State</option>
                                            @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <i class="las la-map-marker-alt  icon"></i>
                            <span id="slocation" class="text-danger"></span>
                            </div>

                            <div class="searchBox-wrapper">
                                <div class="input-form" data-animation="fadeInRight" data-delay="0.4s">
                                    <input type="text" name ="text" class="input keyup-input" placeholder="Search..." autocomplete="off" required>
                                    <span id="textlocation" class="text-danger"></span>
                                </div>

                               

                            </div>
                            <div class="search-form" data-animation="bounceIn" data-delay="0.4s">
                                <button class="search-Btn"onClick="placeOrder()"><i class="las la-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 ">
                        <div class="hero-man  f-right">
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
    </div> --}}
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
                    @foreach($categories as $category)
                        <li class="singleServices wow fadeInUp" data-wow-delay="0.1s">
                            <div class="serviceIcon">
                                <img src="{{asset('admin/category/icon')}}/{{$category->icon}}" alt="{{$category->name}}">
                            </div>
                            <div class="serviceCap">
                                <h4><a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="title">{{$category->name}}</a></h4>
                                <p class="info">{{$category->productcount->count()}} items</p>
                            </div>
                        </li>
                    @endforeach
                 
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="featureListing section-padding plr">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-10">
                <div class="section-tittle text-center">
                    <h2 class="tittl "><span class="shape "></span> Buy and Sale Items Listings </h2>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12" wire:ignore>
                <div class="global-slick-init slider-inner-margin sliderArrow" data-infinite="true"
                    data-arrows="true" data-dots="false" data-slidesToShow="4" data-swipeToSlide="true"
                    data-autoplay="false" data-autoplaySpeed="2500"
                    data-prevArrow="<div class=&quot;prev-icon&quot;><i class=&quot;las la-angle-left&quot;></i></div>"
                    data-nextArrow="<div class=&quot;next-icon&quot;><i class=&quot;las la-angle-right&quot;></i></div>"
                    data-responsive="[{&quot;breakpoint&quot;: 1800,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1400,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 991,&quot;settings&quot;: {&quot;slidesToShow&quot;: 3}},{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 3}},{&quot;breakpoint&quot;: 576, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}}]">

                    @foreach($sellproducts  as $seproduct)
                        <div class="singleFeature pb-24 pb1 proos mb-20 ">
                            <div class="featureImg">
                                <a href="{{route('product.details',['slug'=>$seproduct->slug])}}"><img src="{{asset('admin/product/feat')}}/{{$seproduct->featimage}}"
                                        alt="{{$seproduct->name}}"></a>
                            </div>
                            <div class="featureCaption ">
                                <h4><a href="{{route('product.details',['slug'=>$seproduct->slug])}}" class="featureTittle">{{ucfirst($seproduct->name)}}</a></h4>
                                <div class="d-flex justify-content-between">
                                <p class="featureCap w-60">{{@$seproduct->state->name}},   {{@$seproduct->country->name}} </p> <strong class="subCap miss">@php 
                                                        $to = now(); 
                                                        $from = $seproduct->created_at;
                                                        $res= $to->diffInDays($from); 
                                                        //dd($res);
                                                    @endphp 
                                                    @if($seproduct->created_at->isToday())
                                                        Today
                                                    @elseif(($res > 1 ) && ($res <  7))  
                                                        {{$seproduct->created_at->format('D')}} 
                                                    @else 
                                                        {{$seproduct->created_at->format('M Y')}} 
                                                    @endif</strong>
                                                    </div>
                                <span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i> {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$seproduct->prices)}}</span>
                                <div class="btn-wrapper">
                                    @if($seproduct->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                    @if($seproduct->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                    @if($seproduct->is_rent == 1)  <span class="pro-btn3">Rent</span>     @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                  
                </div>
            </div>
        </div>
    </div>
</section>



<section class="exploreCategories section-padding pls ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-7 col-md-10 col-sm-10">
                <div class="section-tittle text-center">
                    <h2 class="tittl  "><span class="shape"></span>Post and Promote Your Listings</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 ">
            @foreach($categories as $category)
            <div class="col">
                <div class="singleCategories wow fadeInLeft mb-24 " data-wow-delay=".2s">
                    <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="catThumb">
                        <img src="{{asset('admin/category')}}/{{$category->categorythum}}" alt="{{$category->slug}}">
                    </a>
                    <div class="catCaptions">
                        <h6> <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="tittle"> {{$category->name}} </a> </h6>
                        <p class="pera">{{$category->productcount->count()}} items</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


<section class="aboutArea section-padding2 plr plrs sectionBg1">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center ">
            <div class="col-xxl-5 col-xl-7  col-lg-7 col-md-7 col-12 mt-md-0 mt-4">
                <div class="about-caption">

                    <div class="section-tittle section-tittle2 mb-10 ">
                        <!-- <h2 class="tittl wow fadeInUp faded " data-wow-delay="0.1s">Earn cash by selling<br> or Find
                            anything you desire</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Solve Monkey connects you with individuals across India willing to sell, buy, and exchange products. Our platform is filled with unique and endless items. We are a community of people 
                                helping each other find the best products or services! s</p> -->
                                <h2 class="tittl wow fadeInUp faded " data-wow-delay="0.1s" style="margin-bottom:10px;padding-left:0; font-weight:600;">One-Stop Destination to Exchange, <br>Sell, and Buy!</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">Exchange anything, from cars to your plots to mobile, services, and even pets! No matter where you live, Solve Monkey allows you to exchange, sell, and buy. However, our USP is connecting people with other individuals for exchange. Create your account, list your products, and wait for the right connection!</p>
                    </div>
                     @if(Session::has('message'))
                     <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                    <div class="mb-3">
                        <p class="usp-tittle"><b>Our USP:</b>Exchanging items is simple! We let you exchange a plot or car with a person in a different city! It is applicable for all items and services listed here!</p>
                    </div>
                    <div class="btn-wrapper ">
                        <a href="#" class="cmn-btn2 mr-15 mb-10 wow fadeInLeft @auth popup-modal @else popup-btn-login @endauth"
                            data-wow-delay="0.3s">Post Your Ad</a>
                        <a href="{{route('product-list')}}"  class="cmn-btn3 mb-10 wow fadeInRight" data-wow-delay="0.3s">Browse
                            Ads</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-5   col-lg-5 col-md-5 col-12">

                <div class="aboutImg tilt-effect wow fadeInRight" data-wow-delay="0.1s">
                    <img src="{{asset('assets/img/gallery/about.png')}}" alt="images" class="bouncingAnimation  wa1 ">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="recentListing section-padding plr">
    <div class="container-fluid ">

        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-10 col-12">
                <div class="section-tittle text-center ">
                    <h2 class="tittl  "><span class="shape"></span> Exchange Item Listings </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($exchnageproducts as $exproduct)
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s">
                        <div class="singleFlexitem mb-24">
                            <div class="recentImg">
                                <a href="{{route('product.details',['slug'=>$exproduct->slug])}}"><img src="{{asset('admin/product/feat')}}/{{$exproduct->featimage}}"
                                        alt="{{$exproduct->name}}"></a>
                            </div>
                            <div class="recentCaption">
                                <h5><a href="{{route('product.details',['slug'=>$exproduct->slug])}}" class="featureTittle">{{ ucfirst($exproduct->name)}}</a>
                                </h5>
                                <div class="d-flex  justify-content-between">
                                <p class="featureCap w-60">{{@$exproduct->state->name}},   {{@$exproduct->country->name}} </p> <strong class="subCap miss">@php 
                                                        $to = now(); 
                                                        $from = $exproduct->created_at;
                                                        $res= $to->diffInDays($from); 
                                                        //dd($res);
                                                    @endphp 
                                                    @if($exproduct->created_at->isToday())
                                                        Today
                                                    @elseif(($res > 1 ) && ($res <  7))  
                                                        {{$exproduct->created_at->format('D')}} 
                                                    @else 
                                                        {{$exproduct->created_at->format('M Y')}} 
                                                    @endif</strong> 
                                                      </div>                
                                <span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i> {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$exproduct->prices)}}</span>
                                <div class="btn-wrapper">
                                    @if($exproduct->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                    @if($exproduct->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                    @if($exproduct->is_rent == 1)  <span class="pro-btn3">Rent</span>     @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
          
        </div>
        
        <div class="row">
            <div class="text-center">
                <div class="btn-wrapper">
                    <a href="{{route('product-list')}}" class="cmn-btn2 mr-15 mb-10 wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">View More</a>
                </div>
            </div>
        </div>
    </div>
</section>





<section class="featureListing section-padding plr ">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-10">
                <div class="section-tittle text-center ">
                    <h2 class="tittl "><span class="shape "></span> Today's Listing </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="singleFeature mb-24">
                        <div class="featureImg">
                            <a href="{{route('product.details',['slug'=>$product->slug])}}"><img src="{{asset('admin/product/feat')}}/{{$product->featimage}}" alt="{{$product->name}}"></a>
                        </div>
                        <div class="featureCaption">
                            <h4><a href="{{route('product.details',['slug'=>$product->slug])}}" class="featureTittle">{{ucfirst($product->name)}}</a></h4>
                            <div class="d-flex  justify-content-between">
                            <p class="featureCap w-60">{{$product->state->name}},  {{$product->country->name}} </p><strong class="subCap ms-3 miss">
                                @php 
                                    $to = now(); 
                                    $from = $product->created_at;
                                    $res= $to->diffInDays($from); 
                                    //dd($res);
                                @endphp 
                                @if($product->created_at->isToday())
                                    Today
                                @elseif(($res > 1 ) && ($res <  7))  
                                    {{$product->created_at->format('D')}} 
                                @else 
                                    {{$product->created_at->format('M Y')}} 
                                @endif </strong></div>
                            <span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i> {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$product->prices)}}</span>
                            <div class="btn-wrapper">
                                @if($product->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                @if($product->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                @if($product->is_rent == 1)  <span class="pro-btn3">Rent</span>     @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <p style="text-align: center; margin-bottom: 25px;">No Listing added Today Yet</p>
            @endforelse
        </div>
    </div>
</section>




{{-- <div class="testimonialArea section-padding2 plr plrss">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-10">
                <div class="section-tittle  mb-15 mt-45 text-center">
                    <h2 class="tittl  "><span class="shape"></span> Testimonials</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="colo-lg-12">
                <div class="global-slick-init slider-inner-margin sliderArrow" data-infinite="true"
                    data-arrows="true" data-dots="false" data-slidesToShow="4" data-swipeToSlide="true"
                    data-autoplay="false" data-autoplaySpeed="2500"
                    data-prevArrow="<div class=&quot;prev-icon&quot;><i class=&quot;las la-angle-left&quot;></i></div>"
                    data-nextArrow="<div class=&quot;next-icon&quot;><i class=&quot;las la-angle-right&quot;></i></div>"
                    data-responsive="[{&quot;breakpoint&quot;: 1800,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1400,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 991,&quot;settings&quot;: {&quot;slidesToShow&quot;: 3}},{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 2}},{&quot;breakpoint&quot;: 576, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1}}]">

                    @foreach($testimonials as $testimonial)
                   

                        <div class="singleTestimonial capss">
                            <div class="testimonialCap">
                                <ul class="rattingList">
                                    @for ($i = 0; $i < $testimonial->star; $i++)
                                        <li class="listItems"><i class="las la-star icon"></i></li>
                                    @endfor
                                    @for($i=0; $i< 5-$testimonial->star; $i++)
                                        <i class="fa fa-star star-gray"></i>
                                    @endfor
                                    
                                </ul>
                                <div class="testiPera">
                                    <p class="pera">{{$testimonial->description}}</p>
                                </div>

                                <div class="testimonialClient d-flex align-items-center">
                                    <div class="clientImg">
                                        
            
                                        <img src="{{asset('admin/testimonial')}}/{{$testimonial->image}}" alt="images">
                                    </div>
                                    <div class="clientText">
                                        <span class="clientName">{{$testimonial->name}}</span>
                                        <p class="clinetDisCrip">{{$testimonial->position}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div> --}}


</div>
@push('scripts')
<script>
        
            // $('#namegh').on('change',function(ev){
            //     //alert('gfhfgh');
            //     var data = $('#namegh').val();
            //     alert(data);
            //     @this.set('state_id',data);
            // });
            function placeOrder(){
                var fgh =  validateform();
               // alert(fgh);
                if(fgh){
                    seacrhform.submit();
                    }
                    return;
                }
        
        
    </script>
    <script>
        
                    
            window.addEventListener('modal-wrapper-login', event => {
                $('#modal-wrapper-login').modal('show');
            });
    </script>
     <script>  
        function validateform(){  
        var name=document.myform.s.value;  
        var text = document.myform.text.value; 
        
        var status=false;  
        if(name==""){  
            document.getElementById("slocation").innerHTML="State is required.";  
            status=false;
            return status;
        }else{  
            document.getElementById("slocation").innerHTML="";  
            status=true;
        } 
    
        if(text==""){  
            document.getElementById("textlocation").innerHTML= "please enter search text..";  
            status=false; 
            return status;
        }else{  
            document.getElementById("textlocation").innerHTML=""; 
            status=true;
        }  
    
        return status;  
          
        
        }  
</script>
@endpush