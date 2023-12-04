
    <li class="single">
        <a href="{{route('wishlist')}}" class="heart"><i class="lar la-heart icon"></i>
            <div class="left-info">
                @if(Cart::instance('wishlist')->count() > 0)
                    <span class="index">{{Cart::instance('wishlist')->count()}}items</span>
                @endif
                <span class="title"></span>
            </div>
        </a>
    </li>
