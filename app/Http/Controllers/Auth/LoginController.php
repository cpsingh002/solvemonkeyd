<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected $redirectTo =  RouteServiceProvider::HOME; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // if(Auth::user()->user_type == AMD){
        //     $redirectTo =  RouteServiceProvider::HOME;
        // }else{
        //     $redirectTo =  RouteServiceProvider::Dasbord;
        // }
        $this->middleware('guest')->except('logout');
    }
    public function uloginauth(Request $request)
    {
        
        $valid=Validator::make($request->all(),[
            
            'email'=>'required',
            'password'=>'required',
            
            
        ],[
           'email.required'=>'The Email field is required.',
                    
                    'password.required'=>'The Password field is required.',
                    ]);
     if(!$valid->passes()){
                return response()->json(['status'=>'error','msg'=>'Email and password field are required']);
           }

           if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            if(Auth::user()->is_active != 1){
                Auth::logout();
                return response()->json(['status'=>'error','msg'=>'Your Account is deactivated by Solve Monkey. Please reach out to info@solvemonkey.com. We apologize for the inconvenience.']);
            }
            return response()->json(['status'=>'success','msg'=>'msg']);
        }else{
                return response()->json(['status'=>'error','msg'=>'Email and password are not matched']);
        }

    }

    public function adminlogin(Request $request)
    {
        //dd($request);
        return view('auth.adminlogin');
    }

    public function adminloginauth(Request $request)
    {
        //dd($request);
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            //dd(Auth::user());
            //return $this->sendLoginResponse($request);
            return redirect('admin/dashboard');
        }
        return $this->sendFailedLoginResponse($request);
    }
}
