
    <li class="single d-flex gap-3 ">
        <a href="{{route('wishlist')}}" class="heart "><i class="lar la-heart icon"></i>
            <div class="left-info">
                @if(Cart::instance('wishlist')->count() > 0)
                    <span class="index">{{Cart::instance('wishlist')->count()}}</span>
                @endif
                <span class="title"></span>
            </div>
        </a>
        <span class="d-lg-none d-md-block ">whishlist </span>
    </li>
