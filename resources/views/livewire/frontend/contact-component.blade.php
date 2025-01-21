<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <style>
      @media(max-width:830px){
         

 .footerWrapper .footer-area .footer-tittle .listing .listItem .singleLinks {
    font-size: 11px !important;
  } 
  
  .footerWrapper .footer-area .footer-form .newsletter-footer .input {
    margin-left: -64px;
    width:100%;
}
        }
         @media(max-width:768px){

 .footerWrapper .footer-area .footer-tittle .listing .listItem .singleLinks {
    font-size: 11px !important;
  } 
  
  .footerWrapper .footer-area .footer-form .newsletter-footer .input {
    margin-left: -64px;
    width:100%;
}
         }
    </style>
    
    
    
    
    
    <main>

   

    <div class="contactArea section-padding2">
        <div class="container rowed">
            <div class="row mt-3 ">
                <div class=" col-lg-6 col-md-6 col-12 ">
                    <div class="contact-Wrapper">
                        <div class="row wo">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-40">
                                    <h2 class="tittle p-0">Get in touch</h2>
                                    <p>Our friendly team would love to hear from you.</p>
                                </div>
                            </div>
                             @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <form class="form-horizontal" wire:submit.prevent="addContactform">
                            <div class="col-lg-12 d-flex gap-2">
                                <div class="col-lg-6 col-md-6 ">
                                    <label class="infoTitle">First name</label>
                                    <div class="input-form input-form2 mb-3">
                                        <input type="text" placeholder="First name" wire:model="fname" class="mb-2">
                                        @error('fname') <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 ">
                                    <label class="infoTitle">Last name</label>
                                    <div class="input-form input-form2 mb-3">
                                        <input type="text" placeholder="Last name" wire:model="lname" class="mb-2">
                                     @error('lname') <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex gap-2">
                                <div class="col-lg-6 col-md-6 ">
                                    <label class="infoTitle">Email</label>
                                    <div class="input-form input-form2 ">
                                        <input type="email" placeholder="you@company.com" wire:model="email" class="mb-2">
                                         @error('email') <p class="text-danger">{{$message}}</p>
                                           @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 ">
                                    <div class="input-form">
                                        <label class="infoTitle">Phone number</label>
                                        <div  wire:ignore>
                                        <input id="phone" name="phone" type="tel" wire:model="phone" class="mb-2">
                                        </div>
                                        @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-12">
                                    <label class="infoTitle">Message</label>
                                    <div class="input-form mb-3">
                                        <textarea name="message " id="message" placeholder="Message..." wire:model="message" class="mb-2"></textarea>
                                        @error('message') <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label class="checkWrap2">You agree to our privacy policy.
                                        <input class="effectBorder" type="checkbox" value="1" wire:model="checkbox" class="mb-2">
                                        <span class="checkmark mb-2"></span>
                                        @error('checkbox') <p class="text-danger">{{$message}}</p>
                                        @enderror
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
                <div class=" col-lg-6 col-md-6 col-12 ">
                    <div class="contactRight-img">
                        <img src="{{asset('assets/img/gallery/contact.jpg')}}" alt="images" class="contactImg">
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>
</div>
