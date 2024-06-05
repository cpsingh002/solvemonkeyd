<div>
  
      <style>
    
     @media(max-width:768px){
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
    /* font-weight: 600; */
    overflow: hidden;
}

     
 }   
 
  @media(max-width:830px){
       
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
    /* font-weight: 600; */
    overflow: hidden;
}

     
 } 

 
 
    </style>  

    <div class="proDetails section-padding2">
        <div class="container">

            <div class="row mb-40">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('product.category',['category_slug'=>$product->category->slug])}}">{{$product->category->slug }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('product.category',['category_slug'=>$product->category->slug,'scategory_slug'=>$product->subcategory->slug])}}">{{$product->subcategory->slug }}</a></li>
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
                            
                        </div>

                        <div class="thumb-wrap">
                            <div class="shop-details-gallery-nav global-slick-init slider-inner-margin sliderArrow thumbs"
                                data-asNavFor=".shop-details-gallery-slider" data-focusOnSelect="true"
                                data-infinite="true" data-arrows="false" data-dots="false" data-slidesToShow="4"
                                data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                                data-prevArrow="<div class=&quot;prev-icon&quot;><i class=&quot;las la-angle-left&quot;></i></div>"
                                data-nextArrow="<div class=&quot;next-icon&quot;><i class=&quot;las la-angle-right&quot;></i></div>"
                                data-responsive="[{&quot;breakpoint&quot;: 1800,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1600,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1400,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 991,&quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 4}},{&quot;breakpoint&quot;: 576, &quot;settings&quot;: {&quot;slidesToShow&quot;: 4}}]">
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
                                
                            </div>
                        </div>
                    </div>

                    <div class="proDescription">

                        <div class="descriptionTop">
                            
                            <div class="d-flex justify-content-between">
                                <span>
                                    <p class="detailsTittle">{{$product->name}} </p>
                                </span>
                                 @if(Auth::check())
                                <div class="detailsTittle">
                                    @php
                                        $witems = Cart::instance('wishlist')->content()->pluck('id');
                                    @endphp
                                    @if($witems->contains($product->id))
                                    
                                   
                                        <a href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                    @else
                                        <a href="#" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}' ,{{$product->prices}})"><i class="lar la-heart icon"></i></a>
                                    @endif
                                </div>
                                @endif
                            </div>
                            
                            
                            <p class="detailsCap">Posted on {{$product->created_at->format('d M Y')}}</p>
                            <div class="row">
                                <div class="col-3">
                                    <span class="detailsPricing">Price : <i class="fa-solid fa-indian-rupee-sign"></i> {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$product->prices)}}</span>
                                </div>
                                <div class="col-3">
                                    
                                    <span><span> Price negotiable :</span> @if($product->price_negotiable) Yes @else NO @endif</span>
                                </div>
                                <div class="col-6">
                                    @if($product->price_range)
                                        <span><span> Price Range : </span> {{$dis1}} to {{$dis2}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="infoSingle">
                                <ul class="listing">
                                    @foreach($pattributes as $pattribute)
                                    <li class="listItem"></i>{{$pattribute->attribute->attribute}} : {{$pattribute->attributeoption->option_details}}</li>
                                    @endforeach 
                                   {{-- <li class="listItem"><i class="las la-bath icon"></i>2 Bath</li> --}}
                                    <li class="listItem"><i class="las la-map-marker-alt icon"></i>{{$product->address}}</li>
                                </ul>
                            </div>
                        </div>
                        @if($product->city_id1 || $product->city_id2 || $product->city_id3)
                        <div class="btn-wrapper">
                            <h4 class="pro-btn3 w-100 text-center font-size-16">Interested Citys
                                <p class="text-black text-white">@if($product->city1) {{$product->city1->city}}, @endif @if($product->city3) {{$product->city3->city}}, @endif @if($product->city2) {{$product->city2->city}} @endif</p>
                            </h4>
                        </div>
                        @endif

                        <div class="descriptionMid">
                            <h4 class="priceTittle">Description</h4>
                           <p> {!! $product->description!!}</p>
                          
                        </div>

                        <div class="descriptionFooter">
                            <div class="btn-wrapper">
                                <a href="#"  @auth wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}' ,{{$product->prices}})"  class="cmn-btn-outline2" @else  class="cmn-btn-outline2 popup-btn-login" @endauth ><i
                                        class="lab la-font-awesome-flag icon"></i>Yes, I Am Interested</a>
                            </div>
                             @if(Session::has('info'))
                                         <div class="alert alert-success" role="alert">{{Session::get('info')}}
                                         </div>
                                    @endif
                            <!--<div class="socialWrap">-->
                            <!--    <a href="#" class="social"><i class="lab la-facebook-square"></i></a>-->
                            <!--    <a href="#" class="social"><i class="lab la-twitter"></i></a>-->
                            <!--    <a href="#" class="social"><i class="lab la-linkedin"></i></a>-->
                            <!--    <a href="#" class="social"><i class="lar la-bell"></i></a>-->
                            <!--</div>-->
                        </div> 
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12">
                    <div class="sellerMessage mb-24">
                        <div class="singleFlexitem mb-24 d-flex justify-content-between">
                            <div class="recentImg w-50">
                                @if($product->users->profile)
                                <img src="{{asset('admin/userprofile')}}/{{$product->users->profile}}" alt="images">
                                @else
                                <img class="" src="{{asset('admin/userprofile/solve.png')}}" alt="images">
                                @endif
                            </div>
                            <div class="recentCaption  ">
                                <h5><a href="#" class="featureTittle">{{$product->owner_name}} <img
                                            src="{{asset('assets/img/icon/checkMark.svg')}}" class="icon" alt="images"></a></h5>
                                <p class="featureCap">Member since {{ $product->users->created_at->format('Y') }}</p>
                            </div>
                        </div>
                       {{-- <div class="singleFlexitem mb-24" wire:ignore >
                            <div id="mapproduct" class="map-item" style="padding-bottom: 50%;overflow: hidden;position: relative;width: 100%;"> </div>
                        </div> --}}
                         
                            <div class="row">
                                
                                
                            @if($haveCouponCode == 1)
                                <div class="col-lg-8">
                                    <div class="input-form">
                                        <input type="text" value="{{$product->contact_number}}" readonly >

                                        <div class="icon"><i class="las la-phone"></i></div>
                                    </div>
                                </div>
                                @if($product->in_range)
                                    <div class="col-lg-8">
                                            <div class="input-form">
                                                <input type="text" value="{{$dis1}} to {{$dis2}}" readonly>
    
                                                <div class="icon"><i class="las la-rupee-sign"></i></div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-12">
                                                <div class="btn-wrapper mb-20 text-center">
                                                    <a href="#" class="cmn-btn-outline3 w-100" wire:click.prevent="hideContact">Hide Contact</a>
                                                </div>
                                            </div>
                                    @endif
                                    @if(Session::has('message'))
                                         <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                         </div>
                                    @endif
                                @if($haveCouponCode != 1)
                                    <div class="col-lg-12">
                                        <div class="btn-wrapper mb-20 text-center">
                                            <a href="#"  wire:click.prevent="checkplan" class="cmn-btn-outline3 w-100" >Reveal Contact</a>
                                        </div>
                                    </div>
                                @endif
                                
                            </div>
                        
                        <div class="btn-wrapper">
                            <a href="#" class="cmn-btn-outline2 w-100"><i class="las la-comments icon"></i>Message
                                seller</a>
                        </div>
                        
                        @if($product->city_id1 || $product->city_id2 || $product->city_id3)
                            <div class="btn-wrapper">
                                <h4 class="pro-btn3 w-100 text-center font-size-16">Interested Citys
                                    <p class="text-black text-white">@if($product->city1) {{$product->city1->city}}, @endif @if($product->city3) {{$product->city3->city}}, @endif @if($product->city2) {{$product->city2->city}} @endif</p>
                                </h4>
                            </div>
                        @endif


                        <div class="btn-wrapper">
                            <h4 class="pro-btn1 w-100 text-center font-size-16">Interested In
                                <p class="text-black text-white">{{$product->exchange_for}}</p>
                            </h4>
                        </div>
                    </div>
                    <section class="recentListing  " wire:ignore>
                        <h4 class=" btn-wrapper w-100 text-center"> Related Product</h4>
                        @foreach($related_products as $rproduct)
                        <div class=" col-md-12 col-md-6">
                        <div class="borderStyle style1 wow fadeInLeft social " data-wow-delay="0.1s">
                            <div class="singleFlexitem mb-24">
                                <div class="recentImg">
                                    <img src="{{asset('admin/product/feat')}}/{{$rproduct->featimage}}" alt="{{$rproduct->name}}" width="200">
                                </div>
                                <div class="recentCaption">
                                    <h5><a href="{{route('product.details',['slug'=>$rproduct->slug])}}" class="featureTittle">{{ucfirst($rproduct->name)}}</a></h5>
                                    <div class="d-flex justify-content-between">
                                    <p class="featureCap w-60">{{$rproduct->state->name}},  {{$rproduct->country->name}} </p>  <strong class="subCap miss">
                                        @php 
                                                        $to = now(); 
                                                        $from = $rproduct->created_at;
                                                        $res= $to->diffInDays($from); 
                                                        //dd($res);
                                                    @endphp 
                                                    @if($res <  1) 
                                                        Today
                                                    @elseif(($res > 1 ) && ($res <  7))  
                                                        {{$rproduct->created_at->format('D')}} 
                                                    @else 
                                                        {{$rproduct->created_at->format('M Y')}} 
                                                    @endif</strong>
                                                    </div>
                                    <span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i> {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$rproduct->prices)}}</span>
                                    <div class="btn-wrapper">
                                        @if($rproduct->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                        @if($rproduct->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                        @if($rproduct->is_rent == 1)  <span class="pro-btn2">Rent</span>     @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                        
                    </section>
                    
            </div>
        </div>
    </div>


</div>
@push('scripts')

    <script>
            window.addEventListener('show-edit-post-modal', event => {
                $('#modal-wrapper-login').modal('show');
                
            });
    </script>
 @endpush