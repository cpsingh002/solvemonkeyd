<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

  @media(max-width:768px){
    .footerWrapper .footer-area .footer-tittle .listing .listItem .singleLinks {
    font-size: 11px !important;
  } 
  
  .footerWrapper .footer-area .footer-form .newsletter-footer .input {
    margin-left: -64px;
     width:100%;
}

    .sidebar {
	 flex: 1 0 300px;
	 /*background: #333;*/
	 height: 100%;
	 transition: all 0.3s ease-out;
	 display:none;}
      
      .content.is-full-width {
	 margin-left: 0px!important;
}
      
    .sidebar.is-collapsed {
	 transform: translateX(0%)!important;
}  
.accessAccount {
    position: absolute;
    bottom: 0px;
    left: -15px;
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

    .sidebar {
	 flex: 1 0 300px;
	 /*background: #333;*/
	 height: 100%;
	 transition: all 0.3s ease-out;
	 display:none;}
      
      .content.is-full-width {
	 margin-left: 0px!important;
}
      
    .sidebar.is-collapsed {
	 transform: translateX(0%)!important;
}  
.accessAccount {
    position: absolute;
    bottom: 0px;
    left: -15px;
  }
     
 } 


    .add-product-link p{
        background: #98298a;
        padding: 10px;
        text-align: center;
        font-weight: 700;
        border-radius: 10px;
        color: white;
        font-size: 18px;
    }
    
 .contained {
	 display: flex;
	 width: 100%;
	 height: 100%;
}
 .sidebar {
	 flex: 1 0 300px;
	 /*background: #333;*/
	 height: 100%;
	 transition: all 0.3s ease-out;
}
 .sidebar.is-collapsed {
	 transform: translateX(-100%);
}
 .content {
	 width: 100%;
	 height: 100%;
	 padding: 1rem;
	 /*background: #999;*/
	 transition: all 0.3s ease-out;
}
 .content.is-full-width {
	 margin-left: -300px;
}

.solid{
    font-size:30px;
    /*margin-bottom:-45px;*/
}

    
   
</style>
    <main>
    <div class="myAccout section-padding2 ">
        <div class="container">
           <div class="contained">
            <aside class="sidebar">
                <div >
                    <a href="javascript:void(0)" class="closebtn d-lg-none d-md-block d-col-block f-right fs-1" >&times;</a>
                    <div class="accountSidebar sidebar" id="mySidebar">
                        <ul class="listing listScroll">
                            <li class="listItem ">
                                <a href="{{route('user-dashboard')}}" class="items itemss item itmed" ><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                            </li>
                            <li class="listItem">
                                <a href="{{route('user-account')}}" class="items active"> <i class="lar la-user-circle icon"></i> My
                                    Account</a>
                            </li>
                            <li class="listItem ">
                                <a href="{{route('user-packages')}}" class="items"><i class="las la-ad icon"></i> My Packages</a>
                            </li>
                            <li class="listItem ">
                                <a href="{{route('user-ads')}}" class="items itemss item itmed"><i class="fas fa-ad"></i> My Product Ads</a>
                            </li>
                            <li class="listItem ">
                                <a href="{{route('user-order')}}" class="items itemss item"><i class="fa-solid fa-cart-shopping"></i> My Orders</a>
                            </li>
                            <li class="listItem">
                                <a href="{{route('wishlist')}}" class="items"> <i class="lar la-heart icon"></i> Wishlist</a>
                            </li>
                            <li class="listItem">
                                <a href="{{route('message')}}" class="items itemss item"> <i class="fa-solid fa-message"></i> Chat</a>
                            </li>
                           
                        </ul>
                        <div class="accessAccount">
                            <a href="#" class="account-btn"><i class="las la-sign-out-alt icon"></i> Logout</a>
                        </div>
                    </div>
                      
                </div>
                <!--class="col-xxl-3 col-xl-3 col-lg-4 col-md-5 "-->
                </aside>
                 <section class="content">
                     <div class="row"> 
                       <div class="col-lg-1 col-md-2 col-2">
                            <button class="btn solid"><i class="fa-solid fa-bars"></i></button>
                        </div>
                        <div class="col-xxl-9 col-xl-11 col-lg-11 col-md-7 col-10  ">
 
                    <div class=" mt-3 ">
                        <div class="col-sm-12 ">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb ">
                                    <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">My Account</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                    </div>
                
                 <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 ">
           
                    <div class="accountWrapper mb-24">

                        <div class="userProfile mb-24">
                            <div class="recentImg">
                                <img src="../assets/img/gallery/myAccout.png" alt="images">
                            </div>
                            <div class="recentCaption">
                                <div class="cap">
                                    <h5><a href="#" class="featureTittle">{{Auth::user()->name}}</a></h5>
                                    <p class="featureCap">Member since {{Auth::user()->created_at->format('Y')}}</p>
                                </div>
                                <div class="btn-wrapper">
                                    <a href="{{route('user.editprofile')}}" class="cmn-btn-outline2">Edit Profile</a>
                                </div>
                            </div>
                        </div>

                        <div class="infoSingle">
                            <ul class="listing">
                                <li class="listItem"><i class="las la-map-marker-alt icon"></i>@if(Auth::user()->city !=''){{Auth::user()->citys->city}},  {{Auth::user()->states->name}},  {{Auth::user()->countrys->name}} @else <span>Not provided yet</span> @endif</li>
                                <li class="listItem"><i class="lar la-envelope-open icon"></i>{{Auth::user()->email}}</a>
                                </li>
                                <li class="listItem"><i class="las la-phone icon"></i>@if(Auth::user()->phone !='') {{Auth::user()->phone}} @else <span>Not provided yet</span> @endif</li>
                            </ul>
                        </div>
                    </div>

                    <div class="myListing">
                        @if(isset($products[0]))
                            @foreach($products as $product)
                                <div class="singleFlexitem mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                    <div class="row">
                                        <div class="col-md-8 col-7">
                                            <div class="listCap">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="recentImg">
                                                            <img src="{{asset('admin/product/feat')}}/{{$product->featimage}}" alt="{{$product->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="recentCaption">
                                                            <h5><a href="{{route('product.details',['slug'=>$product->slug])}}" class="featureTittle">{{ucfirst($product->name)}}</a>
                                                            </h5>
                                                            <div class="d-flex justify-content-between">
                                                            <p class="featureCap w-60">{{$product->state->name}},  {{$product->country->name}} </p> <strong class="subCap miss">24hrs ago</strong> </div>
                                                            <span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i> {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$product->prices)}}</span>
                                                            <div class="btn-wrapper">
                                                                @if($product->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                                                @if($product->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                                                @if($product->is_rent == 1)  <span class="pro-btn2">Rent</span>     @endif
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-5">
                                            <div class="btn-wrapper mb-lg-20 ml-lg-60 mb-20 text-center">
                                                <a href="#" class="cmn-btn-outline4 mr-10 mb-md-2"><i class="lar la-eye icon"></i>@if($product->productCount) {{$product->productCount->visit_count}} @endif</a>
                                                <a href="{{route('edit-ad',['pid'=>$product->id])}}" class="cmn-btn4 mb-md-2">Edit Ad</a>
                                            </div>
                                            @if($product->is_exchange==1)
                                            <div class="btn-wrapper ml-md-30 ml-0 mb-md-2  mb-0">
                                                <!--w-100-->
                                                <h4 class="cmn-btn-outline2 " wire:click.prevent="exchangeable('{{$product->exchange_for}}','{{$product->prices}}','{{$product->price_range}}')">See Exchangeable Products
                                                </h4>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <p> no item add yet</p>
                        @endif
                        <a class="list-title add-product-link " href="{{'/post-ad'}}">
                            <p class="adds"> Add more product for sell,rent and exchange</p>
                        </a>
                        
                    </div>
                    </div>
                </div>
                 <!--class="col-xxl-9 col-xl-9 col-lg-8 col-md-7 "-->
                 
                 </section>
            </div>
        </div>
    </div>

</main>
</div>


@push('scripts')
<script>

$(function() {
  $('.btn').on('click', function() {
    $('.sidebar').toggleClass('is-collapsed');
    $('.content').toggleClass('is-full-width');
  });
});
if(  window.innerWidth <= 800 ){
$(document).ready(function(){
    $(".btn").click(function(){
        $(".sidebar").toggle();
            $(".content").css("display", "none");
           $(".sidebar").css("display", "block");
       
    });
});
 }

</script>

<script>
if(  window.innerWidth <= 800 ){
$(document).ready(function(){
    $(".closebtn").click(function(){
        $(".sidebar").toggle();
            $(".sidebar").css("display", "none");
           $(".content").css("display", "block");
    });
});
}
</script>
@endpush

