@extends('layouts/base')
@section('container')

<main>

   

    <div class="contactArea section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-12">
                    <div class="contact-Wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-40">
                                    <h2 class="tittle p-0">Get in touch</h2>
                                    <p>Our friendly team would love to hear from you.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label class="infoTitle">First name</label>
                                <div class="input-form input-form2">
                                    <input type="text" placeholder="First name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label class="infoTitle">Last name</label>
                                <div class="input-form input-form2">
                                    <input type="text" placeholder="Last name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="infoTitle">Email</label>
                                <div class="input-form input-form2">
                                    <input type="text" placeholder="you@company.com">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-form">
                                    <label class="infoTitle">Phone number</label>
                                    <form>
                                        <input id="phone" name="phone" type="tel">
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label class="infoTitle">Message</label>
                                <div class="input-form">
                                    <textarea name="message " id="message" placeholder="About your project"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label class="checkWrap2">You agree to our privacy policy.
                                    <input class="effectBorder" type="checkbox" value>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-sm-12">
                                <div class="btn-wrapper mb-10">
                                    <button class="cmn-btn4 w-100">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12">
                    <div class="contactRight-img">
                        <img src="assets/img/gallery/contact.jpg" alt="images" class="contactImg">
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>

@endsection