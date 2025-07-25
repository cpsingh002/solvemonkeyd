<footer >
        <div class="footerWrapper plr">
            <div class="footer-area footer-padding">
                <div class="container-fluid">
                    <div class="row  ">
                        <div class="col-xxl-3 col-xl-3 col-md-3 col-sm-8  col-6">
                            <div class="footer-widget widget">
                                <div class="footer-tittle footer-tittle2">
                                    <div class="footer-logo mb-20">
                                        <a  href="{{route('/')}}"><img class="logoed" src="{{asset('assets/img/logo/solve-logo1.png')}}" alt="images"></a>
                                    </div>
                                    <ul class="listing">
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a href="#"
                                                class="singleLinks "><i id="mailed" class="las la-map-marker icon"></i>{{$website->address}}</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.1s"><a href="#"
                                                class="singleLinks "><i class="las la-phone icon"></i>{{$website->phone}}</a>
                                        </li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.2s"><a href="#"
                                                class="singleLinks "><i id="mailed" class="las la-envelope icon"></i><span
                                                    class="__cf_email__">{{$website->email}}</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-md-3 col-sm-6 col-6 ">
                            <div class="footer-widget widget">
                                <div class="footer-tittle">
                                    <h4 class="footerTittle">Categories</h4>
                                    <ul class="listing">
                                        @foreach($categories as $category)
                                            <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a
                                                href="{{route('product.category',['category_slug'=>$category->slug])}}" class="singleLinks ww-70"> {{$category->name}}</a></li>
                                        @endforeach
                                       
                                       @foreach($subcategories as $scategory)
                                            <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a
                                                href="{{route('product.category',['category_slug'=>$scategory->category->slug,'scategory_slug'=>$scategory->slug])}}" class="singleLinks ww-70"> {{$scategory->name}}</a></li>
                                        @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3  col-md-3 col-sm-6 col-6 ">
                            <div class="footer-widget widget">
                                <div class="footer-tittle">
                                    <h4 class="footerTittle">Help & support</h4>
                                    <ul class="listing">

                                        <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a href="{{route('contact')}}"
                                                class="singleLinks ww-70"> Contact</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.2s"><a href="{{route('faq')}}"
                                                class="singleLinks ww-70">FAQ </a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.1s"><a
                                                href="{{route('terms-and-condition')}}" class="singleLinks singles"> Terms and
                                                Conditions</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.2s"><a
                                                href="{{route('privacy-policy')}}" class="singleLinks ww-70"> Privacy Policy</a></li>

                                                <li class="listItem wow fadeInUp" data-wow-delay="0.2s"><a
                                                href="{{route('listing-policy')}}" class="singleLinks ww-70"> Listing Policy</a></li>        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3  col-md-3 col-sm-6 col-6 ">
                            <div class="footer-widget widget">
                                <div class="footer-tittle footer-tittle2">
                                    <h4 class="footerTittle">Newsletter</h4>
                                    <div class="footer-pera footer-pera2">
                                        <p class="pera wow fadeInUp" data-wow-delay="0.0s">Be the first one to know
                                            news, offers and events weekly in your. Unsubscribe whenever you like with
                                            one click.</p>
                                    </div>
                                </div>

                                <div class="footer-form mt-10 wow fadeInRight" data-wow-delay="0.1s">
                                    <form class="form-row mb-21" wire:submit.prevent="subscribe">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                        <div class="newsletter-footer">
                                            <input class="input" type="email" name="email" placeholder="Your Email Address" wire:model="email" required>
                                            <div class="btn-wrapper form-icon">
                                                <button class="btn-default btn-rounded" type="submit" name="submit">
                                                    Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="footer-social2 ">
                                        <a href="#" class="wow fadeInUp social" data-wow-delay="0.2s"><i
                                                class="lab la-facebook-f icon"></i></a>
                                        <a href="#" class="wow fadeInUp social" data-wow-delay="0.2s"><i
                                                class="lab la-youtube icon"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-area">
                <div class="container-fluid">
                    <div class="footer-border">
                        <div class="row">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p class="pera wow fadeInDown" data-wow-delay="0.0s">Copyright © Solve Monkey {{ date('Y') }}. <a href="https://softhunters.in/">Softhunters Technology </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>