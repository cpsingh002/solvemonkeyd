<div class="showSidebar">
    <ul>
        <li class="singleList">
            <a href="{{route('product-list')}}" class="tittle"><i
                    class="las la-phone-volume icon"></i>
                Property</a>
        </li>
        @foreach($categories as $category)
        <li class="singleList menu-item-has-children current-menu-item">
            <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="tittle"><i
                    class="las la-sort-amount-up icon"></i>{{$category->name}}</a>
                    <!-- {{$category->subCategories}} -->
                    @if(count($category->subCategories) != 0)
                        <div class="megamenuWrapper">
                            <div class="singleMegamenu">
                                <h5 class="submenu-title">{{$category->name}}</h5>
                                <div class="megamenu-product">
                                    <ul class="product-items">
                                        @foreach($category->subCategories as $scategory)
                                            <li><a href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}" class="list">{{$scategory->name}}</a></li>
                                        @endforeach 
                                    </ul>
                                </div>
                            </div>

                        </div>
                    @endif
        </li>
        @endforeach
        <!-- <li class="singleList menu-item-has-children current-menu-item">
            <a href="{{'/product-list'}}" class="tittle"> <i
                    class="las la-headphones icon"></i>
                Electronics </a>
            <div class="megamenuWrapper">
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems1.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems2.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems3.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems4.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems5.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems6.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems7.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat1.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems9.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems4.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="singleList menu-item-has-children current-menu-item">
            <a href="{{'/product-list'}}" class="tittle"><i class="las la-tv icon"></i> TV
                &amp;
                Audio </a>
            <div class="megamenuWrapper">
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat1.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat2.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat3.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat4.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat5.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat6.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat7.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat8.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat9.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/phoneCat5.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="singleList menu-item-has-children current-menu-item">
            <a href="{{'/product-list'}}" class="tittle"><i
                    class="las la-keyboard icon"></i> Key
                Board</a>
            <div class="megamenuWrapper">
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/recentListings1.jpg')}}"
                                    alt="images"> </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/recentListings2.jpg')}}"
                                    alt="images"> </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/recentListings3.jpg')}}"
                                    alt="images"> </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/recentListings4.jpg')}}"
                                    alt="images"> </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems5.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/recentListings6.jpg')}}"
                                    alt="images"> </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems9.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems1.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/catitems2.jpg')}}" alt="images">
                            </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singleMegamenu">
                    <div class="megamenu-product">
                        <div class="product-img">
                            <a href="{{'/product-list'}}"> <img
                                    src="{{asset('assets/img/gallery/recentListings6.jpg')}}"
                                    alt="images"> </a>
                        </div>
                        <div class="megamenu-contents">
                            <h4> <a href="{{'/product-list'}}" class="megamenu-title"> items
                                    Tittle </a> </h4>
                            <div class="price">
                                <h5 class="newPrice"> $33.00 </h5>
                                <span class="prevPrice"> $50.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="singleList">
            <a href="{{'/product-list'}}" class="tittle"><i class="las la-mouse icon"></i>
                Mouse
                Electronics </a>
        </li>
        <li class="singleList">
            <a href="{{'/product-list'}}" class="tittle"><i
                    class="las la-laptop icon"></i>Jewelry
                Watches </a>
        </li> -->
    </ul>
</div>
