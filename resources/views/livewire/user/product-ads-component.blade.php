<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
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
        <div class="contained">
            <aside class="sidebar">
            <div >
<a href="javascript:void(0)" class="closebtn d-lg-none d-md-block d-col-block f-right fs-1" >&times;</a>
               <div class="accountSidebar sidebar ">
                    <ul class="listing listScroll">
                        <li class="listItem">
                            <a href="{{'user-account'}}" class="items itemss item itmed"> <i
                                    class="fa-solid fa-chart-line"></i> Dashboard</a>
                        </li>
                        <li class="listItem">
                            <a href="{{'user-account'}}" class="items "> <i class="lar la-user-circle icon"></i> My
                                Account</a>
                        </li>
                        <li class="listItem">
                                <a href="{{route('user-packages')}}" class="items"><i class="las la-ad icon"></i> My Packages</a>
                            </li>
                        <li class="listItem">
                            <a href="{{'user-ads'}}" class="items itemss active item itmed"><i class="fas fa-ad"></i> My Product Ads</a>
                        </li>
                        <li class="listItem">
                            <a href="{{'user-order'}}" class="items itemss item"><i class="fa-solid fa-cart-shopping"></i> My Orders</a>
                        </li>
                        <li class="listItem">
                            <a href="{{'wishlist'}}" class="items"> <i class="lar la-heart icon"></i> Wishlist</a>
                        </li>
                        <li class="listItem">
                            <a href="{{route('message')}}" class="items"> <i class="lar la-heart icon"></i> Chat</a>
                        </li>
                       
                    </ul>
                    <div class="accessAccount">
                        <a href="#" class="account-btn"><i class="las la-sign-out-alt icon"></i> Logout</a>
                    </div>
                </div>
            </div>
            <!--class="col-xxl-3 col-xl-3 col-lg-4 col-md-5"-->
            </aside>
             <section class="content">
                <div class="row"> 
                       <div class="col-lg-1 col-md-2 col-2">
                            <button class="btn solid"><i class="fa-solid fa-bars"></i></button>
                        </div>
                        <div class="col-xxl-9 col-xl-11 col-lg-11 col-md-10 col-10 ">

                <div class="row  ">
                    <div class="col-sm-6 mt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb crumbed">
                                <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">My Product Ads</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-wrapper float-end ">
                            <a href="{{'post-ad'}}" class="cmn-btn4 float-end">Add</a>
                        </div>
                    </div>
                </div>
               </div>
               </div>
               
               
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 ">

                <div class="myListing">
                    {{--
                    <div class="singleFlexitem mb-24  wow fadeInUp social" data-wow-delay="0.0s">
                        <div class="row">
                            <div class="col-8">
                                <div class="listCap">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="recentImg">
                                                <img src="../assets/img/gallery/myList1.jpg" alt="images">
                                            </div>
                                            
                                        </div>
                                        <div class="col-9">
                                            <div class="recentCaption">
                                                <h5><a href="{{'product-details'}}" class="featureTittle">Luxury couple
                                                        apartment</a></h5>
                                                <p class="featureCap">Dallas, Texas  <strong class="subCap">24hrs ago</strong></p>
                                                <span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i>124.80</span>
                                                <div class="btn-wrapper">
                                                    <span class="pro-btn1">RENOVETED</span>
                                                    <span class="pro-btn2  mt-md-3">PROMOTED</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="btn-wrapper mb-20">
                                    <a href="#" class="cmn-btn-outline4 mr-10 mb-10"><i class="lar la-eye icon"></i>44k</a>
                                    <a href="{{'edit-ad'}}" class="cmn-btn4">Edit Ad</a>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="singleFlexitem mb-24  wow fadeInUp social" data-wow-delay="0.1s">
                        <div class="row">
                            <div class="col-8">
                                <div class="listCap">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="recentImg">
                                                <img src="../assets/img/gallery/myList2.jpg" alt="images">
                                            </div>
                                            
                                        </div>
                                        <div class="col-9">
                                            <div class="recentCaption">
                                                <h5><a href="{{'product-details'}}" class="featureTittle">Luxury couple
                                                        apartment</a></h5>
                                                <p class="featureCap">Dallas, Texas  <strong class="subCap">24hrs ago</strong></p>
                                                <span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i>124.80</span>
                                                <div class="btn-wrapper">
                                                    <span class="pro-btn1">RENOVETED</span>
                                                    <span class="pro-btn2 mt-md-3">PROMOTED</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="btn-wrapper mb-20">
                                    <a href="#" class="cmn-btn-outline4 mr-10 mb-10"><i class="lar la-eye icon"></i>44k</a>
                                    <a href="{{'edit-ad'}}" class="cmn-btn4">Edit Ad</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                    <p class="noed text-center">No item added</p>
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