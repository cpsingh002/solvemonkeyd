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
     
         .contained {
        	 display: flex;
        	 width: 100%;
        	 height: 100%;
        }
         .sidebar {
        	 flex: 1 0 250px;
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
                            <div class="accountSidebar sidebar">
                            <ul class="listing listScroll">
                                <li class="listItem">
                                    <a href="{{route('user-dashboard')}}" class="items itemss active item itmed" > <i
                                            class="fa-solid fa-chart-line"></i> Dashboard</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('user-account')}}" class="items "> <i class="lar la-user-circle icon"></i> My
                                        Account</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('user-packages')}}" class="items"><i class="las la-ad icon"></i> My Packages</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('user-ads')}}" class="items itemss item itmed"><i class="fas fa-ad"></i> My Product Ads</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('user-order')}}" class="items itemss item"><i class="fa-solid fa-cart-shopping"></i> My Orders</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('wishlist')}}" class="items"> <i class="lar la-heart icon"></i> Wishlist</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('message')}}" class="items itemss item"><i class="fa-solid fa-message"></i> Chat</a>
                                </li>
        
                            </ul>
                            <div class="accessAccount">
                                <a href="#" class="account-btn"><i class="las la-sign-out-alt icon"></i> Logout</a>
                            </div>
                        </div>
                        </div>
                    
                    </aside>
                    <section class="content">
                        <div class="row"> 
                            <div class="col-lg-1 col-md-2 col-2">
                                <button class="btn solid"><i class="fa-solid fa-bars"></i></button>
                            </div>
                            <div class="col-xxl-9 col-xl-11 col-lg-11 col-md-7 col-10 " >
                                <div class=" mt-3">
                                    <div class="col-sm-12">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb crumbed">
                                                <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>        
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 " >
                            <div class="myListing mt-4">
                                <span> Total Listing Added By You: {{$productCount->count()}} </span>
                                <div class="row mt-4">
                                    <div class="col-lg-4 col-md-4 col-4">
                                        <div class="singlePrice mb-24 text-center">
                                            <h4 class="fs-14 mb-10">Listing For Sell</h4>
                                            <span class="">{{$productCount->where('is_sell',1)->count()}}<span class="subTittle"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-4">
                                        <div class="singlePrice mb-24 text-center">
                                            <h4 class="fs-14 mb-10">Listing For Rent</h4>
                                            <span class="">{{$productCount->where('is_rent',1)->count()}}<span class="subTittle"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-4">
                                        <div class="singlePrice mb-24 text-center" >
                                            <h4 class="fs-14 mb-10">Listing For Exchange</h4>
                                            <span class="">{{$productCount->where('is_exchange',1)->count()}}<span class="subTittle"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($activepackage))
                            <div class="memberShipCart">
                                <div class="singleMember mb-24">
                                    <div class="memberDetails">
                                        <h5>
                                            <a href="#" class="memberTittle">{{$activepackage->validitycount->pname}} <span class="activeUser">@if($activepackage->status == 1) Active @else Expri @endif</span></a>
                                        </h5>
                            
                                        <div class="infoSingle">
                                            <ul class="listing">
                                                <li class="listItem">Purchase : {{$activepackage->created_at->format('d M Y')}}</li>
                                                <li class="listItem">Valid Till: {{$activepackage->validitycount->validity}}Days/ <strong class="subCap">{{$activepackage->created_at->addDays($activepackage->validitycount->validity)->format('d M Y')}}</strong></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="#" class="cmn-btn-outline4 mr-10">₹ {{$activepackage->validitycount->price}}</a>
                                        <a href="#" class="cmn-btn4"> Hits :{{$activepackage->validitycount->count}}</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="small-tittle mb-30">
                                <h3>Top Visitied Listings</h3>
                            </div>
                            
                            <div class="paymentTable">
                                @foreach($topvisitlistings as $topvisitlisting)
                                <div class="singleFlexitem mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="listCap">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="recentImg">
                                                            <img src="{{asset('admin/product/feat')}}/{{$topvisitlisting->featimage}}" alt="{{$topvisitlisting->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="recentCaption">
                                                            <h5><a href="{{route('product.details',['slug'=>$topvisitlisting->slug])}}" class="featureTittle " style=
                                                            "font-size:15px;" >{{ucfirst($topvisitlisting->name)}}</a></h5>
                                                            <div class="d-flex justify-content-between">
                                                                <span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i> {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$topvisitlisting->prices)}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-4">
                                                <div class="btn-wrapper mb-lg-20 ml-lg-60 mb-20 text-center">
                                                    <a href="#" class="cmn-btn-outline4 mr-10 mb-md-2"><i class="lar la-eye icon"></i> {{$topvisitlisting->visit_count}}</a>
                                                </div>
                                               
                                            </div>
                                        
                                    </div>
                                </div>
                                @endforeach
                            
                                
                            </div>
                            <!--<div class="small-tittle mb-30">-->
                            <!--    <h3>Top Sell Listings</h3>-->
                            <!--</div>-->

                            <!--<div class="paymentTable">-->
                            <!--    <div class="singleMember wow fadeInUp social" data-wow-delay="0.0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">-->
                            <!--        <p class="memberInfo">Verified Membership</p>-->
                            <!--        <p class="price">$102.99</p>-->
                            <!--        <p class="memberInfo">$07 Jan 2022</p>-->
                            <!--        <p class="memberInfo">Mastercard ****<span class="lastDegit">9834</span></p>-->
                            <!--        <p class="success-btn">Successfully paid</p>-->
                            <!--    </div>-->
                            
                                
                            <!--</div>-->
                            <!--<div class="small-tittle mb-30">-->
                            <!--    <h3>Top Exchange Listings</h3>-->
                            <!--</div>-->
                            <!--<div class="paymentTable">-->
                            <!--    <div class="singleMember wow fadeInUp social" data-wow-delay="0.0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">-->
                            <!--        <p class="memberInfo">Verified Membership</p>-->
                            <!--        <p class="price">$102.99</p>-->
                            <!--        <p class="memberInfo">$07 Jan 2022</p>-->
                            <!--        <p class="memberInfo">Mastercard ****<span class="lastDegit">9834</span></p>-->
                            <!--        <p class="success-btn">Successfully paid</p>-->
                            <!--    </div>-->
                            <!--</div>-->
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