<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
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
                <div class=" contained">
                <!--row-->
                <aside class="sidebar">
                    <div >
<a href="javascript:void(0)" class="closebtn d-lg-none d-md-block d-col-block f-right fs-1" >&times;</a>
                        <div class="accountSidebar sidebar" >
                       
                            <ul class="listing listScroll">
                                <li class="listItem">
                                    <a href="{{route('user-dashboard')}}" class="items itemss item itmed" > <i
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
                                    <a href="{{route('user-order')}}" class="items itemss active item"><i class="fa-solid fa-cart-shopping"></i> My Orders</a>
                                </li>
                                <li class="listItem">
                                    <a href="{{route('wishlist')}}" class="items"> <i class="lar la-heart icon"></i> Wishlist</a>
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
                    <div class="col-xxl-9 col-xl-11 col-lg-11 col-md-7 col-10">
                        <div class=" mt-3">
                            <div class="col-sm-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb crumbed">
                                        <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#"> My Orders</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                        <div class="promoteAds">
                            <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s"
                                style="visibility: visible; animation-delay: 0s; animation-name: fadeInLeft;">
                                <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.0s"
                                    style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                                    <div class="adsCap">
                                        <div class="adsImg">
                                            <img class="wish" src="../assets/img/gallery/wishlist1.jpg" alt="images">
                                        </div>
                                        <div class="adsCaption">
                                            <h5><a href="#" class="adsTittle">A pair of sneakers for
                                                    sell</a></h5>
                                            <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong>
                                            </p>
                                            <span class="adsPricing"><i class="fa-solid fa-indian-rupee-sign"></i>330.80</span>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="#" class="cmn-btn-outline5"><i
                                                class="las la-heart icon"></i>Completed</a>
                                    </div>
                                </div>
                            </div>


                            <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s"
                                style="visibility: visible; animation-delay: 0s; animation-name: fadeInLeft;">
                                <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.2s"
                                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <div class="adsCap">
                                        <div class="adsImg">
                                            <img class="wish" src="../assets/img/gallery/wishlist2.jpg" alt="images">
                                        </div>
                                        <div class="adsCaption">
                                            <h5><a href="#" class="adsTittle">Luxury couple
                                                    apartment</a></h5>
                                            <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong>
                                            </p>
                                            <span class="adsPricing"><i class="fa-solid fa-indian-rupee-sign"></i>120.34</span>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="#" class="cmn-btn-outline5"><i
                                                class="las la-heart icon"></i>Completed</a>
                                    </div>
                                </div>
                            </div>

                            <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s"
                                style="visibility: visible; animation-delay: 0s; animation-name: fadeInLeft;">
                                <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.0s"
                                    style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                                    <div class="adsCap">
                                        <div class="adsImg">
                                            <img class="wish" src="../assets/img/gallery/wishlist1.jpg" alt="images">
                                        </div>
                                        <div class="adsCaption">
                                            <h5><a href="#" class="adsTittle">A pair of sneakers for
                                                    sell</a></h5>
                                            <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong>
                                            </p>
                                            <span class="adsPricing"><i class="fa-solid fa-indian-rupee-sign"></i>330.80</span>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="#" class="cmn-btn-outline5"><i
                                                class="las la-heart icon"></i>Pending</a>
                                    </div>
                                </div>
                            </div>


                            <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s"
                                style="visibility: visible; animation-delay: 0s; animation-name: fadeInLeft;">
                                <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.2s"
                                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <div class="adsCap">
                                        <div class="adsImg">
                                            <img class="wish" src="../assets/img/gallery/wishlist2.jpg" alt="images">
                                        </div>
                                        <div class="adsCaption">
                                            <h5><a href="#" class="adsTittle">Luxury couple
                                                    apartment</a></h5>
                                            <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong>
                                            </p>
                                            <span class="adsPricing"><i class="fa-solid fa-indian-rupee-sign"></i>120.34</span>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="#" class="cmn-btn-outline5"><i
                                                class="las la-heart icon"></i>Completed</a>
                                    </div>
                                </div>
                            </div>

                            <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s"
                                style="visibility: hidden; animation-delay: 0s; animation-name: none;">
                                <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.0s"
                                    style="visibility: hidden; animation-delay: 0s; animation-name: none;">
                                    <div class="adsCap">
                                        <div class="adsImg">
                                            <img class="wish" src="../assets/img/gallery/wishlist1.jpg" alt="images">
                                        </div>
                                        <div class="adsCaption">
                                            <h5><a href="#" class="adsTittle">A pair of sneakers for
                                                    sell</a></h5>
                                            <p class="adsPera">Dallas, Texas · <strong class="subCap">24hrs ago</strong>
                                            </p>
                                            <span class="adsPricing"><i class="fa-solid fa-indian-rupee-sign"></i>330.80</span>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="#" class="cmn-btn-outline5"><i
                                                class="las la-heart icon"></i>Pending</a>
                                    </div>
                                </div>
                            </div>


                            <div class="borderStyle style1 wow fadeInLeft social" data-wow-delay="0.0s"
                                style="visibility: hidden; animation-delay: 0s; animation-name: none;">
                                <div class="singlePromoteAds mb-24  wow fadeInUp social" data-wow-delay="0.2s"
                                    style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                                    <div class="adsCap">
                                        <div class="adsImg">
                                            <img class="wish" src="../assets/img/gallery/wishlist2.jpg" alt="images">
                                        </div>
                                        <div class="adsCaption">
                                            <h5><a href="#" class="adsTittle">Luxury couple
                                                    apartment</a></h5>
                                            <p class="adsPera">Dallas, Texas ·<strong class="subCap">24hrs ago</strong>
                                            </p>
                                            <span class="adsPricing"><i class="fa-solid fa-indian-rupee-sign"></i>120.34</span>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mb-20">
                                        <a href="#" class="cmn-btn-outline5"><i
                                                class="las la-heart icon"></i>Pending</a>
                                    </div>
                                </div>
                            </div>

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