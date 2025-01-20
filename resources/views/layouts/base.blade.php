<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
        content="ads, advertise, advertising, classified, classified ads, database, directory, jobs, listing, local, portal" />
    <meta name="description"
        content="Choose from 72 Premium classified ads Templates from the #1 source for classified ads Templates. Created by our Global Community of independent Web Developers." />
    <title>Solve Monkey</title>
    <link rel="icon" type="image/x-icon" sizes="20x20" href="{{asset('assets/img/icon/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/plugin.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!--<link rel="stylesheet" href="{{asset('assets/css/main-style.css')}}"> -->

    <link rel="stylesheet" href="{{asset('assets/css/style-new.css')}}">
    
    
    
</head>

<!--<style>-->
<!--     .fa-heart-o:before{content:"\f08a"}-->
<!--    .fa-heart:before{content:"\f004"}-->
<!--</style>-->

<body>

    @livewire('header-component')
   

    {{$slot}}



    <div class="body-overlay-desktop"></div>
    <div id="modal-wrapper" style="display:none">
        <div class="modal-wrapper-box text-center">

            <div class="close-icon">
                <i class="las la-times"></i>
            </div>
            <h2 class="modialTittle">Post Your <span>Ad</span> ?</h2>
            <div class="btn-wrapper">
                <a href="{{route('post-ad')}}" class="cmn-btn02">Yes , Post ad</a>
            </div>
        </div>
    </div>

    <div id="modal-wrapper-login" style="display:none">
        <div class="modal-wrapper-box text-center">

            <div class="close-icon">
                <i class="las la-times"></i>
            </div>
            <h2 class="modialTittle">Login <span>Here</span> </h2>
            <div class="card-body">
                <form method="POST" action="#" id="frmLogin">
                    @csrf
                    <div id="loginfrom">
                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 fw-bold col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="emaill" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" 
                                    autocomplete="current-password">
                                    <i class="toggle-password la la-fw la-eye-slash"></i>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div id="login_msg"></div>
                        <div class="row mb-3">
                            <div class="col-md-10 m-auto">
                                <div class="form-check1">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-check-label fw-bold" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                        </div>
                                        <div class="col-6">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link buttoned" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 m-auto">
                                <div class="btn-wrapper">
                                    <button type="submit" class="pro-btn2 py-2 px-3">
                                        {{ __('Login') }}
                                    </button>
                                    <button type="button" class="pro-btn2 py-2 px-3" id="loginotp">
                                        {{ __('Login With OTP ') }}
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div id="loginotpfrom" style="display:none">
                        <div class="row mb-3">
                            <label for="phone"  class="col-md-4 fw-bold col-form-label text-md-end">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus onKeyPress="if( this.value.length == 10 ) return false; " >
                                <div id="phone_error" class="field_error text-danger"></div>
                                <div id="phoneerroemsg"></div>
                            </div>
                        </div>

                        <div class="row mb-3"  id="otpenterscetion" style="display:none">
                            <label for="phone"  class="col-md-4 fw-bold col-form-label text-md-end">{{ __('OTP Code') }}</label>
                            <div class="col-md-6">
                                <input id="Otpcode" type="text" class="form-control @error('opt') is-invalid @enderror"
                                    name="otp" value="{{ old('otp') }}"  autocomplete="phone" autofocus onKeyPress="if( this.value.length == 6 ) return false; " >
                                <div id="otp_error" class="field_error text-danger"></div>
                                <div id="phoneerroemsg"></div>
                            </div>
                        </div>
                        <div id="loginotp_msg"></div>
                        <div class="row mb-0">
                            <div class="col-md-12 m-auto">
                                <div class="btn-wrapper">
                                    <button type="button" class="pro-btn2 py-2 px-3" id="loginotpsend">
                                        {{ __('Click Here Get OTP') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0" id="loginsectionsds" style="display:none">
                            <div class="col-md-12 m-auto">
                                <div class="btn-wrapper">
                                    <button type="submit" class="pro-btn2 py-2 px-3">
                                        {{ __('Login') }}
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="sinUp"><span>Don’t have an account? </span>
                        <a href="#" class="singApp popup-btn-register text-violet fw-bold">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div id="modal-wrapper-register" style="display:none">
        <div class="modal-wrapper-box text-center">

            <div class="close-icon">
                <i class="las la-times"></i>
            </div>
            <h2 class="modialTittle">Register <span>Here</span> </h2>
            <div class="card-body">
                <form method="POST" action="#" id="frmRegistar">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div id="name_error" class="field_error text-danger"></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div id="email_error" class="field_error text-danger"></div>
                        </div>
                    </div>

                    <div class="row ">
                        <label for="password"
                            class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                                <i class="toggle-password la la-fw la-eye-slash"></i>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label fw-bold text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div id="password_error" class="field_error text-danger"></div>
                    </div>
                    <div id="checkboxed_error" class="field_error text-danger"></div>
                    <div id="thank_you_msg" class="field_error text-center text-success"></div>
                    <div id="register_msg" class= "msg-show text-center text-danger"></div>
               
                    <div class="row mb-0">
                        <div class="col-md-12 text-center">
                            <div class="btn-wrapper">
                                <button type="submit" class="pro-btn2 py-2 px-3">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!--<div class="row mt-2">-->
                    <!--    <p class="sinUp"><span>Don’t have an account? </span>-->
                    <!--    <a class="singApp popup-btn-register text-violet fw-bold">Sign Up</a></p>-->
                    <!--</div>-->
                    
                    
                    <div class="row mt-2">

                        <p class="sinUp"><span>Do you have an account?</span>
                        <a  href="#" class="singApp popup-btn-login text-violet fw-bold">Sign In</a></p>

                    </div>
                </form>
            </div>
        </div>
    </div>

    @livewire('footer-component')

    <div class="mouseCursor cursorOuter"></div>
    <div class="mouseCursor cursorInner"></div>

    <div class="progressParent">
        <svg class="backCircle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>

    <script src="{{asset('assets/js/plugin.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
 
    <script>
        jQuery('#frmRegistar').submit(function(e){
    
            e.preventDefault();
            jQuery('.field_error').html('');
            jQuery.ajax({
                url:'{{ route('uregisteor') }}',
                data:jQuery('#frmRegistar').serialize(),
                type:'post',
                success:function(result){
                    if(result.status=="error"){
                        jQuery.each(result.error,function(key,val){
                            jQuery('#'+key+'_error').html(val[0]);
                        });
                
                    }
                    if(result.status=="success"){
                        // jQuery('#register_msg').html(result.msg);
                        jQuery('#frmRegistar')[0].reset();
                        jQuery('#thank_you_msg').html(result.msg);
                    }
                }
            });
        });

        jQuery('#frmLogin').submit(function(e){
            jQuery('#login_msg').html("");
            e.preventDefault();
            jQuery.ajax({
                url:'{{ route('ulogin') }}',
                data:jQuery('#frmLogin').serialize(),
                type:'post',
                success:function(result){
                    if(result.status=="error"){
                        jQuery.each(result.error,function(key,val){
                                    jQuery('#'+key+'_error').html(val[0]);
                                });
                        jQuery('#login_msg').html(result.msg);
                    }
                    if(result.status=="success"){
                        window.location.reload();
                    }
                }
            });
        });
    </script>
    
    <script> 
        btn.addEventListener('click', function(e){ 
            e.stopPropagation();
            view.classList.toggle('is_active');
        }); // open menu
    
        for(var i = 0; i < viewItems.length; i++){
            viewItems[i].addEventListener('click', function(e){
                e.stopPropagation();
                out.innerHTML = this.innerHTML;
                view.classList.remove('is_active');
            });
        } 
        function(){
            if(view.classList.contains('is_active')){
                view.classList.remove('is_active');
            } 
        }); 
    </script>
    
    
    @livewireScripts
	@stack('scripts')
    <script type="text/javascript">
        function validate() {
            alert('hhh');
            var pattern = new RegExp("([^\d])\d{10}([^\d])");

            if (pattern.test(document.getElementById('phone').value)) {
                return true;
            }
            else {
                return false;
            }
        }
    </script>

    <script>

        $(document).on('click', '#loginotp', function() {
        //   alert("ddd")
            $('#loginotpfrom').css('display','block' );

           $('#loginfrom').css('display','none');
           $('#emaill').prop('required',false);
           $('#Otpcode').prop('required',true);
           $('#phone').prop('required',true);
        });

        jQuery('#loginotpsend').on('click', function(e){
            var id=$("#phone").val();
            // e.preventDefault();
            jQuery('#phoneerroemsg').html("");
			if(id == ''){
				jQuery('#phoneerroemsg').html('Please Enter Phone Number!.');
			}else{

                // var pattern = new RegExp("/^[0-9]{10}$/");
                // if (pattern.test(document.getElementById('phone').value)) {
                    jQuery('#loginotp_msg').html("");
                    // e.preventDefault();
                    // alert('fdgfsfxgds')
                    jQuery.ajax({
                        url:'{{ route('loginsms') }}',
                        data:'phone='+id,
                        type:'get',
                        success:function(result){
                            if(result.status=="error"){

                                jQuery.each(result.error,function(key,val){
                                    jQuery('#'+key+'_error').html(val[0]);
                                });
                                // jQuery('#loginotp_msg').html(result.msg);
                            }
                            if(result.status=="success"){
                                $("#otpenterscetion").css('display','revert-layer' );
                                $('#loginotpsend').css('display','none');
                                $("#loginsectionsds").css('display','revert-layer');
                                // window.location.reload();
                            }
                        },
                        async: false
                    });
                // }
                // else {
                //     jQuery('#phoneerroemsg').html('Please Enter Correct Phone Number!.');
                //     // return false;
                // }
                // alert(id);
                
            }
        });
    </script>

</body>

<!-- Mirrored from bytesed.com/tf/listocean/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2023 06:17:37 GMT -->

</html>