<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
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
     
 } 

        nav svg{
            height:20px;
        }
        nav .hidden{
            display:block !important;
        }
         .select-itms{
            display:flex;
            justify-content:space-around;
            top:-22px;
        }
        .listscrolls{
            display:flex;
            flex-flow:column;
            gap:10px;
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
    /*margin-bottom:-70px;*/
}
 
        
        /*nav .flex{*/
        /*    display:none;*/
        /*}*/
        
        /*nav span button.border{*/
        /*    border:0px solid !important;*/
        /*}*/
        /*nav span .border{*/
        /*    border:0px solid !important;*/
        /*}*/
    </style>
    <main>

        <div class="section-padding2 ">
            <div class="">
               <div class=" contained">
                    <!--row roows-->
                    <aside class="sidebar">
                    <div >
                        <a href="javascript:void(0)" class="closebtn d-lg-none d-md-block d-col-block f-right fs-1" >&times;</a>
                        <div class="cateSidebar mt-40">
                            <h5 class="catTittle2">All Categories</h5>


                            <ul class="listing listScroll listscrolls">
                                @foreach($categories as $category)
                                    <li class="listItem"><a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="items">
                                        <img src="{{asset('admin/category/icon')}}/{{$category->icon}}" class="icon" alt="{{$category->name}}">
                                        <span>{{$category->name}} <span class="itemNumber">({{$category->productcount->count()}})</span></span>
                                    </a></li>
                                
                                @endforeach
                            </ul>
                            
                            <div class="price mb-10">
                                <h5 class="catTittle">Price</h5>
                                <div class="picPrice">
                            
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="input-form">
                                                <input type="text" placeholder="Min" wire:model="min_price" wire:change="minchange">

                                                <div class="icon"><i class="fa-solid fa-indian-rupee-sign"></i></i></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="input-form">
                                                <input type="text" placeholder="Max" wire:model="max_price" wire:change="maxchange">

                                                <div class="icon"><i class="fa-solid fa-indian-rupee-sign"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="price mb-10">
                                <h5 class="catTittle">Type</h5>
                                <div class="picPrice">
                            
                                    <div class="row">
                                        <ul class="listing listScroll">
                                            
                                        <li class="list-item"><input type="checkbox" class="me-2" wire:model="for_sell" value="1" wire:change="maxchange"><span class="fs-14">For Sell ({{$for_sell_count}})</span></li>
                                        <li class="list-item"><input type="checkbox" class="me-2" wire:model="for_exchange" value="1" wire:change="maxchange"><span class="fs-14">For Exchange ({{$for_exchange_count}})</span></li>
                                        <li class="list-item"><input type="checkbox" class="me-2" wire:model="for_rent" value="1" wire:change="maxchange"><span class="fs-14">For Rent ({{$for_rent_count}})</span></li>
                                            
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>

                           {{-- <div class="dateTime mb-30">
                                <h5 class="catTittle catss">Date Posted</h5>

                                <div class="datePicker">
                                    <input id="datepicker1" placeholder="10/04/2022" />
                                </div>
                            </div> --}}
                            <div class="btn-wrapper">
                                <a href="#" class="cmn-btn4 w-100" wire:click="resetfilter"> Reset Filter</a>
                            </div> 
                        </div>
                    </div>
</aside>
                    <section class="content">
                        <div class="row">    
                            <div class="col-lg-1 col-md-1 ml-3 col-2">
                                 <button class="btn solid"><i class="fa-solid fa-bars"></i></button>
                            </div>
                             <div class="col-lg-11 col-md-11 col-10">
                        <div class="viewItems">
                                <form action="{{route('searchs')}}"  method="get" id="seacrhform"  class="seacrhform" name="myform" >
                                     <div class="row">
                                            <div class="col-md-4 col-6">
                                                <!--<label for="Country">State</label>-->
                                                <select name="s"  id="namegh" class="form-control forms"  wire:model ="state_id"  wire:change="changeState" required>
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="slocation" class="text-danger"></span>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <!--<label for="city">City</label>-->
                                                <select name="c" class="form-control forms" wire:model="city_id" wire:change="chnagecity"required>
                                                    <option value="">Select City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="clocation" class="text-danger"></span>
                                                
                                            </div>
                                    <div class="col-md-4 col-12" >
                                        <div class="SearchWrapper">
                                            <div class="searchBox-wrapper">
    
                                                <div  class="search-box">
                                                    <div class="input-form">
                                                        <input type="text" name="text" class=" keyup-input" value="{{$text}}" placeholder="Search" required>
                                                        <span id="textlocation" class="text-danger"></span>
                                                        <div class="icon" onClick="placeOrder()">
                                                            <i class="las la-search"></i>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                
                                            </div>
                                        <!--    <div class="view">-->
                                        <!--    <button class="customTab active"-->
                                        <!--        data-toggle-target=".customTab-content-1"><i-->
                                        <!--            class="las la-th-large"></i></button>-->
                                        <!--    <button class="customTab" data-toggle-target=".customTab-content-2"><i-->
                                        <!--            class="las la-bars"></i></button>-->
                                        <!--</div>-->
    
                                            
                                        </div>
                                    </div>
                                    </div>
                                </form>
                        </div>
                    </div>    

                        <div class="gridView customTab-content customTab-content-1 active">
                            <div class="row tabed">
                            @if(isset($products[0]))
                                @foreach($products as $product)
                                    <div class="col-xl-3  col-lg-4  col-md-12 col-sm-6">
                                        <div class="singleFeature mb-24">
                                            @if($product->admin_verified == 1)
                                                <div class="verifed-section" style="position: absolute;  z-index: 999999; padding: 1% !important; text-align: center;">
                                                    <div class="recentImg">
                                                        <img class="" src="{{asset('assets/img/logo/solve-logo1.png')}}" alt="images" width="100px" height="100px">
                                                    </div>
                                                    <!-- <span>Verified</span> -->
                                                </div>
                                            @endif
                                            <div class="featureImg">
                                                <a href="{{route('product.details',['slug'=>$product->slug])}}"><img src="{{asset('admin/product/feat')}}/{{$product->featimage}}"
                                                        alt="{{$product->name}}"></a>
                                            </div>
                                            <div class="featureCaption">
                                                <h4><a href="{{route('product.details',['slug'=>$product->slug])}}" class="featureTittle feets">{{ucfirst($product->name)}}</a>
                                                </h4>
                                               <div class="d-flex">
                                                <p class="featureCap w-60">{{$product->state->name}},   {{$product->country->name}} </p> <strong class="subCap miss">
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
                                                    @endif
                                                    </strong>
                                                    </div>
                                                <span class="featurePricing"><i class="fa-solid fa-indian-rupee-sign"></i> {{preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$product->prices)}}</span>
                                                <div class="btn-wrapper">
                                                    @if($product->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                                    @if($product->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                                    @if($product->is_rent == 1)  <span class="pro-btn3">Rent</span>     @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                    {{'No Items Available'}}
                                @endif
                             
                            </div>
                        </div>





                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="pagination mt-60">
                                    <ul class="pagination-list">
                                        {{$products->links('vendor/livewire/bootstrap')}}
                                       
                                    </ul>
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
        function validateform(){  
        var name=document.myform.s.value;  
        var password=document.myform.c.value; 
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
    
        if(password==""){  
            document.getElementById("clocation").innerHTML= "please City is required.";  
            status=false; 
            return status;
        }else{  
            document.getElementById("clocation").innerHTML="";
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