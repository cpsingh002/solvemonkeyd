<footer>
        <div class="footerWrapper plr">
            <div class="footer-area footer-padding">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="footer-widget widget">
                                <div class="footer-tittle footer-tittle2">
                                    <div class="footer-logo mb-20">
                                        <a href="{{'/'}}"><img src="assets/img/logo/solve-logo.png" alt="images"></a>
                                    </div>
                                    <ul class="listing">
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a href="#"
                                                class="singleLinks"><i class="las la-map-marker icon"></i>Surat</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.1s"><a href="#"
                                                class="singleLinks"><i class="las la-phone icon"></i>9999056788</a>
                                        </li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.2s"><a href="#"
                                                class="singleLinks"><i class="las la-envelope icon"></i><span
                                                    class="__cf_email__">info@exchangesab.com</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-widget widget">
                                <div class="footer-tittle">
                                    <h4 class="footerTittle">Categories</h4>
                                    <ul class="listing">
                                        @foreach($categories as $category)
                                            <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a
                                                href="{{'product-list'}}" class="singleLinks"> {{$category->name}}</a></li>
                                        @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-widget widget">
                                <div class="footer-tittle">
                                    <h4 class="footerTittle">Help & support</h4>
                                    <ul class="listing">

                                        <li class="listItem wow fadeInUp" data-wow-delay="0.0s"><a href="{{'contact'}}"
                                                class="singleLinks"> Contact</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.2s"><a href="{{'faq'}}"
                                                class="singleLinks"> Faq</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.1s"><a
                                                href="{{'terms-and-condition'}}" class="singleLinks"> Terms and
                                                Conditions</a></li>
                                        <li class="listItem wow fadeInUp" data-wow-delay="0.2s"><a
                                                href="{{'privacy-policy'}}" class="singleLinks"> Privacy Policy</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6">
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
                                    <div class="form-row mb-20">
                                        <form class="newsletter-footer" target="_blank" action="#" method="get">
                                            <input class="input" type="email" name="email"
                                                placeholder="Your Email Address">
                                            <div class="btn-wrapper form-icon">
                                                <button class="btn-default btn-rounded" type="submit" name="submit">
                                                    Submit</button>
                                            </div>
                                        </form>
                                    </div>
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
                                    <p class="pera wow fadeInDown" data-wow-delay="0.0s">© Copyright 2023. All Rights
                                        Reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>