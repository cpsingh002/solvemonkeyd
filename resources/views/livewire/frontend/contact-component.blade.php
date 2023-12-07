<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
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
                            <form class="form-horizontal" wire:submit.prevent="addContactform">
                                <div class="col-lg-6 col-md-6">
                                    <label class="infoTitle">First name</label>
                                    <div class="input-form input-form2">
                                        <input type="text" placeholder="First name" wire:model="fname">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="infoTitle">Last name</label>
                                    <div class="input-form input-form2">
                                        <input type="text" placeholder="Last name" wire:model="lname">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label class="infoTitle">Email</label>
                                    <div class="input-form input-form2">
                                        <input type="email" placeholder="you@company.com" wire:model="email">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-form">
                                        <label class="infoTitle">Phone number</label>
                                        
                                            <input id="phone" name="phone" type="tel" wire:model="phone">
                                        
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label class="infoTitle">Message</label>
                                    <div class="input-form">
                                        <textarea name="message " id="message" placeholder="About your project" wire:model="message"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label class="checkWrap2">You agree to our privacy policy.
                                        <input class="effectBorder" type="checkbox" value="1" required wire:model="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-sm-12">
                                    <div class="btn-wrapper mb-10">
                                        <button type="submit" class="cmn-btn4 w-100">Send message</button>
                                        
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12">
                    <div class="contactRight-img">
                        <img src="{{asset('assets/img/gallery/contact.jpg')}}" alt="images" class="contactImg">
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>
</div>
