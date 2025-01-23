<div>
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
        	display:none;
            
        }
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
    	    display:none;
            
        }
          
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
        }

    </style>
    <main>
        <div class="myAccout section-padding2 ">
            <div class="container">
                <div class="contained">
                    <aside class="sidebar">
                        <div >
                            <a href="javascript:void(0)" class="closebtn d-lg-none d-md-block d-col-block f-right fs-1" >&times;</a>
                            <div class="accountSidebar sidebar" >
                                <ul class="listing listScroll">
                                    <li class="listItem">
                                        <a href="{{route('user-dashboard')}}" class="items itemss item itmed" > <i class="fa-solid fa-chart-line"></i> Dashboard</a>
                                    </li>
                                    <li class="listItem">
                                        <a href="{{route('user-account')}}" class="items  "> <i class="lar la-user-circle icon"></i> My Account</a>
                                    </li>
                                    <li class="listItem">
                                        <a href="{{route('user-packages')}}" class="items active "><i class="las la-ad icon"></i> My Packages</a>
                                    </li>
                                    <li class="listItem">
                                        <a href="{{route('user-ads')}}" class="items itemss item itmed"><i class="fas fa-ad"></i> My Product Ads</a>
                                    </li>
                                    <li class="listItem">
                                        <a href="{{route('user-order')}}" class="items itemss item"><i class="fa-solid fa-cart-shopping"></i> My Orders</a>
                                    </li>
                                    <li class="listItem">
                                        <a href="{{route('wishlist')}}" class="items "> <i class="lar la-heart icon"></i> Wishlist</a>
                                    </li>
                                    <li class="listItem">
                                        <a href="{{route('message')}}" class="items itemss item"> <i class="fa-solid fa-message"></i> Chat</a>
                                    </li>
                                    
                                </ul>
                                <div class="accessAccount">
                                    <a href="#" class="account-btn"><i class="las la-sign-out-alt icon"></i>
                                        Logout</a>
                                </div>
                            </div>
                            
                        </div>
                    
                    </aside>
                    <section class="content">
                        <div class="row"> 
                                <div class="col-lg-1 col-md-2 col-2">
                                    <button class="btn solid"><i class="fa-solid fa-bars"></i></button>
                                </div>
                            <div class="col-xxl-9 col-xl-11 col-lg-11 col-md-10 col-10">
        
                                <div class="row">
                                    <div class="col-sm-6 mt-3" >
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb crumbed">
                                                <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                                <li class="breadcrumb-item"><a href="#">My Packages</a></li>
                                            </ol>
                                        </nav>
                                    </div>
        
                                    <div class="col-sm-6" >
                                        <div class="btn-wrapper float-end ">
                                            <a href="{{'packages'}}" class="cmn-btn4 float-end ">Purchase New Package</a>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
        
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 ">
                            <div class="myListing">
                            @if(isset($packages[0]))
                                @foreach($packages as $package)
                                    <div class="singleFlexitem mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                        <div class="row">
                                            <div class="col-md-8 col-7">
                                                <div class="listCap">
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <div class="recentCaption">
                                                                <h5><a href="#" class="featureTittle">{{$package->validitycount->pname}}</a>
                                                                </h5>
                                                                <p class="featureCap">{{$package->validitycount->ptype}},₹ {{$package->validitycount->price}} Visiting Count: <strong>{{$package->validitycount->count}}</strong></p>
                                                                @if($package->status==1)<p class="featureCap">Remaining Count: <strong>{{($package->validitycount->count)-($visited)}}</strong></p>@else<p class="featureCap">Remaining Count: <strong>0</strong></p>@endif
                                                                <p class="featureCap">Valid Till: {{$package->validitycount->validity}}Days/<strong class="subCap">{{$package->created_at->addDays($package->validitycount->validity)->format('d M Y')}}</strong></p>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-5">
                                                <div class="validitys d-lg-flex d-flex gap-3 gap-lg-3 mb-1">
                                                <div class="btn-wrapper ">
                                                    @if(($package->created_at->addDays($package->validitycount->validity))->lt(now())) <span class="pro-btn1">Expired</span>   @endif
                                                </div>
                                                <div class="btn-wrapper">
                                                    <a href="{{route('package.purchase',['p_id'=>$package->validitycount->id])}}" class="pro-btn2">Buy Again</a>
                                                </div>
                                                </div>
                                                <span class="featurePricing d-lg-flex d-md-flex
                                                pricings ">Transcation Id: <p>{{$package->transcation_id}}</p></span>
    
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                            <p style="text-align: center;margin-top:10px; margin-bottom:14px;"> No Packages Purchased yet!!</p>
                            @endif
                            
                                
                            </div>
                        </div>
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