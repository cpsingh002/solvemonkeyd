<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <main>

        <div class="section-padding2 plr">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xxl-3  col-xl-3 col-lg-4 col-md-5">
                        <div class="cateSidebar">
                            <h5 class="catTittle2">All {{$category->name}}</h5>


                            <ul class="listing listScroll">
                                @foreach($subcategories as $subcategory)
                                    <li class="listItem"><a href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$subcategory->slug])}}" class="items">
                                        <img src="{{asset('admin/category')}}/{{$subcategory->icon}}" class="icon" alt="{{$subcategory->name}}">
                                        <span>{{$subcategory->name}} <span class="itemNumber">(1,{{$subcategory->productcount->count()}})</span></span>
                                    </a></li>
                                
                                @endforeach
                            </ul>
                            <h5 class="catTittle2">All Brands</h5>


                            <ul class="listing listScroll">
                                @foreach($brands as $brand)
                                    <li class="list-item"><input type="checkbox" wire:model="brandtype" value="{{$brand->id}}" wire:click="brandseletc">{{$brand->name}} <span>(217)</span></li>
                                                      
                                @endforeach
                            </ul>
                            <h5 class="catTittle2">All Attributes</h5>


                            <ul class="listing listScroll">
                                @if($attributes != null)
                                @foreach($attributes as $attribute)
                                <p>{{$attribute->attribute}} </p>
                                        @foreach($attribute->attributeoptions as $acv)
                                            <li class="list-item"><input type="checkbox" wire:model="attributetype" value="{{$acv->id}}" wire:click="brandseletc">{{$acv->option_details}} <span>(217)</span></li>
                                        @endforeach          
                                @endforeach
                                @endif
                            </ul>

                            <div class="price mb-10">
                                <h5 class="catTittle">Price</h5>

                                <div class="picPrice">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input type="text" placeholder="Min" wire:model="min_price" wire:change="minchange">

                                                <div class="icon"><i class="las la-dollar-sign"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input type="text" placeholder="Max" wire:model="max_price" wire:change="maxchange">

                                                <div class="icon"><i class="las la-dollar-sign"></i></div>
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
                                            
                                        <li class="list-item"><input type="checkbox" wire:model="for_sell" value="1" wire:change="maxchange">For Sell <span>(217)</span></li>
                                        <li class="list-item"><input type="checkbox" wire:model="for_exchange" value="1" wire:change="maxchange">For Exchange <span>(217)</span></li>
                                        <li class="list-item"><input type="checkbox" wire:model="for_rent" value="1" wire:change="maxchange">For Rent <span>(217)</span></li>
                                            
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="dateTime mb-30">
                                <h5 class="catTittle">Date Posted</h5>

                                <div class="datePicker">
                                    <input id="datepicker1" placeholder="10/04/2022" />
                                </div>
                            </div>
                            <div class="btn-wrapper">
                                <a href="#" class="cmn-btn4 w-100"> Reset Filter</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-9 col-xl-9  col-lg-8 col-md-7">
                        <div class="viewItems">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="select-itms">
                                        <select name="select" class="niceSelect">
                                            <option value>New York, USA</option>
                                            <option value>Location PK</option>
                                            <option value>Location US</option>
                                            <option value>Location UK</option>
                                        </select>
                                        <i class="las la-map-marker-alt  icon"></i>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="SearchWrapper">
                                        <div class="searchBox-wrapper">

                                            <form action="#" class="search-box">
                                                <div class="input-form">
                                                    <input type="text" class=" keyup-input" placeholder="Search">

                                                    <div class="icon">
                                                        <i class="las la-search"></i>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="category-searchbar search-showHide">

                                                <span class="closed-icon"><i class="las la-times"></i></span>
                                                <div class="search-suggestions" id="search_suggestions_wrap">
                                                    <div class="search-inner">
                                                        <div class="category-suggestion item-suggestions">
                                                            <h6 class="item-title">Category Suggestions</h6>
                                                            <ul class="category-suggestion-list">
                                                                <li class="list"> <a href="#" class="item">Fruits &amp;
                                                                        Vegetables</a>
                                                                </li>
                                                                <li class="list"><a href="#" class="item">Cooking</a>
                                                                </li>
                                                                <li class="list"> <a href="#" class="item">Dairy</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-suggestion item-suggestions">
                                                            <h6 class="item-title">
                                                                <span>
                                                                    Product Suggestions
                                                                </span>
                                                                <a href="#" target="_blank" id="search_result_all"
                                                                    class="showAll">Show all</a>
                                                            </h6>
                                                            <ul class="product-suggestion-list mt-4"
                                                                id="search_result_products">
                                                                <li class="list">
                                                                    <a href="#" class="item">
                                                                        <div class="product-image"><img
                                                                                src="assets/img/gallery/wishlist1.jpg"
                                                                                alt="img"></div>
                                                                        <div class="product-info">
                                                                            <div class="product-info-top">
                                                                                <h6 class="product-name">Fresh Fruits
                                                                                </h6>
                                                                            </div>
                                                                            <div class="product-price">
                                                                                <div class="price-update-through">
                                                                                    <span class="flash-price fw-500">Rs
                                                                                        200.00</span>
                                                                                    <span class="flash-old-prices">Rs
                                                                                        240</span>
                                                                                </div>
                                                                                <span class="stock-out">In Stock</span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="view">
                                            <button class="customTab active"
                                                data-toggle-target=".customTab-content-1"><i
                                                    class="las la-th-large"></i></button>
                                            <button class="customTab" data-toggle-target=".customTab-content-2"><i
                                                    class="las la-bars"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="gridView customTab-content customTab-content-1 active">
                            <div class="row ">
                                @foreach($products as $product)
                                    <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                        <div class="singleFeature mb-24">
                                            <div class="featureImg">
                                                <a href="{{route('product.details',['slug'=>$product->slug])}}"><img src="{{asset('admin/product/feat')}}/{{$product->featimage}}"
                                                        alt="{{$product->name}}"></a>
                                            </div>
                                            <div class="featureCaption">
                                                <h4><a href="{{route('product.details',['slug'=>$product->slug])}}" class="featureTittle">Apple smartwatch
                                                        6</a>
                                                </h4>
                                                <p class="featureCap">{{$product->state->name}},{{$product->country->name}} · <strong class="subCap">12hrs
                                                        ago</strong></p>
                                                <span class="featurePricing">Rs{{$product->prices}}</span>
                                                <div class="btn-wrapper">
                                                    @if($product->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                                    @if($product->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                                    @if($product->is_rent == 1)  <span class="pro-btn2">Rent</span>     @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                    <div class="singleFeature mb-24">
                                        <div class="featureImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems8.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="featureCaption">
                                            <h4><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch
                                                    6</a>
                                            </h4>
                                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs139.40</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                    <div class="singleFeature mb-24">
                                        <div class="featureImg">
                                            <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems2.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="featureCaption">
                                            <h4><a href="{{'/product-detail'}}" class="featureTittle">Samsung M32</a>
                                            </h4>
                                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs139.40</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                    <div class="singleFeature mb-24">
                                        <div class="featureImg">
                                            <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems3.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="featureCaption">
                                            <h4><a href="{{'/product-detail'}}" class="featureTittle">Persian cat</a>
                                            </h4>
                                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs139.40</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                    <div class="singleFeature mb-24">
                                        <div class="featureImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems4.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="featureCaption">
                                            <h4><a href="{{'/product-detail'}}" class="featureTittle">Beats
                                                    headphone</a>
                                            </h4>
                                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs139.40</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                    <div class="singleFeature mb-24">
                                        <div class="featureImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems5.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="featureCaption">
                                            <h4><a href="{{'/product-detail'}}" class="featureTittle">4 Bed 2 storey
                                                    house</a></h4>
                                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs139.40</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4  col-lg-6  col-md-12 col-sm-6">
                                    <div class="singleFeature mb-24">
                                        <div class="featureImg">
                                            <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems6.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="featureCaption">
                                            <h4><a href="{{'/product-details'}}" class="featureTittle">Apple smartwatch
                                                    6</a>
                                            </h4>
                                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs139.40</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6  col-md-12  col-sm-6">
                                    <div class="singleFeature mb-24">
                                        <div class="featureImg">
                                            <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems7.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="featureCaption">
                                            <h4><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch
                                                    6</a>
                                            </h4>
                                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs139.40</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6  col-md-12  col-sm-6">
                                    <div class="singleFeature mb-24">
                                        <div class="featureImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems8.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="featureCaption">
                                            <h4><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch
                                                    6</a>
                                            </h4>
                                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs139.40</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6  col-md-12  col-sm-6">
                                    <div class="singleFeature mb-24">
                                        <div class="featureImg">
                                            <a href="{{'/product-detail'}}"> <img src="assets/img/gallery/catitems9.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="featureCaption">
                                            <h4><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch
                                                    6</a>
                                            </h4>
                                            <p class="featureCap">Los Angels, CA · <strong class="subCap">12hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs139.40</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="listingView customTab-content customTab-content-2">
                            <div class="row ">
                                @foreach($products as $product)
                                    <div class="col-xl-6 col-lg-12">
                                        <div class="singleFlexitem mb-24">
                                            <div class="recentImg">
                                                <a href="{{'/product-detail'}}"><img src="{{asset('admin/product/feat')}}/{{$product->featimage}}"
                                                        alt="{{$product->name}}"></a>
                                            </div>
                                            <div class="recentCaption">
                                                <h5><a href="{{'/product-detail'}}" class="featureTittle">{{$product->name}}</a>
                                                </h5>
                                                <p class="featureCap">{{$product->state->name}},{{$product->country->name}} · <strong class="subCap">24hrs
                                                        ago</strong></p>
                                                <span class="featurePricing">Rs{{$product->prices}}</span>
                                                <div class="btn-wrapper">
                                                    @if($product->is_sell == 1) <span class="pro-btn1">Sell</span>   @endif
                                                    @if($product->is_exchange == 1)  <span class="pro-btn2">Exchange</span>     @endif
                                                    @if($product->is_rent == 1)  <span class="pro-btn2">Rent</span>     @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-xl-6 col-lg-12">
                                    <div class="singleFlexitem mb-24">
                                        <div class="recentImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems8.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch
                                                    6</a>
                                            </h5>
                                            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs146,300</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="singleFlexitem mb-24">
                                        <div class="recentImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems2.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{'/product-detail'}}" class="featureTittle">Samsung M32</a>
                                            </h5>
                                            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs124.80</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="singleFlexitem mb-24">
                                        <div class="recentImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems3.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{'/product-detail'}}" class="featureTittle">Persian cat</a>
                                            </h5>
                                            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs34.80</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="singleFlexitem mb-24">
                                        <div class="recentImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems4.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{'/product-detail'}}" class="featureTittle">Beats
                                                    headphone</a>
                                            </h5>
                                            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs150.19</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="singleFlexitem mb-24">
                                        <div class="recentImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems5.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{'/product-detail'}}" class="featureTittle">4 Bed 2 storey
                                                    house</a></h5>
                                            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs99.99</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="singleFlexitem mb-24">
                                        <div class="recentImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems6.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch
                                                    6</a>
                                            </h5>
                                            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs380</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="singleFlexitem mb-24">
                                        <div class="recentImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems7.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{'/product-detail'}}" class="featureTittle">4 Bed 2 storey
                                                    house</a></h5>
                                            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs99.99</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="singleFlexitem mb-24">
                                        <div class="recentImg">
                                            <a href="{{'/product-detail'}}"><img src="assets/img/gallery/catitems8.jpg"
                                                    alt="images"></a>
                                        </div>
                                        <div class="recentCaption">
                                            <h5><a href="{{'/product-detail'}}" class="featureTittle">Apple smartwatch
                                                    6</a>
                                            </h5>
                                            <p class="featureCap">Dallas, Texas · <strong class="subCap">24hrs
                                                    ago</strong></p>
                                            <span class="featurePricing">Rs380</span>
                                            <div class="btn-wrapper">
                                                <span class="pro-btn1">Sell</span>
                                                <span class="pro-btn2">Exchange</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="pagination mt-60">
                                    <ul class="pagination-list">
                                        <li class=" wow fadeInRight" data-wow-delay="0.0s"><a href="#"
                                                class="page-number"><i class="las la-angle-left"></i></a></li>
                                        <li><span class="page-number current">1</span></li>
                                        <li><a href="#" class="page-number">2</a></li>
                                        <li><a href="#" class="page-number">3</a></li>
                                        <li><a href="#" class="page-number">4</a></li>
                                        <li><a href="#" class="page-number">5</a></li>
                                        <li class=" wow fadeInLeft" data-wow-delay="0.0s"><a href="#"
                                                class="page-number"><i class="las la-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>