<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            
            'email'=>'nullable|exists:users,email',
            'password'=>'nullable',
            'phone'=>'nullable|numeric|digits:10|exists:users,phone',
            'otp'=>'nullable|numeric|digits:6'           
        ],[
           'email.required'=>'The Email field is required.',
            'password.required'=>'The Password field is required.',
            'phone.exists'=>'This Phone Number is not persent.',
            'phone.required'=>'The Phone field is required.',
            'phone.numeric' =>'Only Numeric value appceted.',
            'phone.digits'=>'Please Provide 10 digits phone number.',
            'otp.required'=>'OTP code Required.',
            'otp.numeric' =>'Only Numeric value appceted.',
            'otp.digits'=>'Please Provide 6 digits OtP code.'

        ]);
        if(!$valid->passes()){
            return response()->json(['status'=>'error','msg'=>'Email and password field are required','error'=>$valid->errors()->toArray()]);
        }

        if($request->otp != ''){
            $user=User::where(['phone'=>$request->phone,'otp_code'=>$request->otp])->first();
            if(!isset($user)){
                return response()->json(['status'=>'error','msg'=>'Email and password are not matched']);
            }else{
                Auth::guard()->loginUsingId($user->id);
                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                }
                User::where('id',Auth::id())->update(['otp_code'=>null]);
                if(Auth::user()->is_active != 1){
                    Auth::logout();
                    return response()->json(['status'=>'error','msg'=>'Your Account is deactivated by Solve Monkey. Please reach out to info@solvemonkey.com. We apologize for the inconvenience.']);
                }
                return response()->json(['status'=>'success','msg'=>'msg']);
            }
        }else{

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

    public function SendLoginOtp(Request $request)
    {
        $valid=Validator::make($request->all(),[
            'phone'=>['required','numeric','digits:10'],          
        ],[
           'phone.exists'=>'This Phone Number is not persent.',
            'phone.required'=>'The Phone field is required.',
            'phone.numeric' =>'Only Numeric value appceted.',
            'phone.digits'=>'Please Provide 10 digits phone number. '
        ]);
        if(!$valid->passes()){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
        }else{
            $user = User::where('phone',$request->phone)->first();
            $number = $request->phone;
            $otp = rand(111111,999999);
            if(isset($user))
            {
               User::where('phone',$request->phone)->update(['otp_code'=>$otp]); 
            }else{
                    $user = User::create([
                        'name' => $request->phone,
                        'email' => null,
                        'password' => Hash::make($request->phone),
                        'phone' => $request->phone,
                        'otp_code'=>$otp
                    ]);
            }
                
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://allsms1.dreamitservices.co.in/index.php/smsapi/httpapi/?secret=ZEB1fTQG8VKl4SEvgUsp&sender=SJSSMH&tempid=1707173538437715764&receiver='.$number.'&route=TA&msgtype=1&sms=Dear%20User%20your%20one-time%20password%20(OTP)%20is%20'.$otp.'.%20Enter%20this%20code%20to%20verify%20your%20solve%20monkey%20account.%20Keep%20it%20private%20for%20your%20security.%20Thank%20you!%20SJSSMH',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: PHPSESSID=67e8b4abe3b41d7fc64504b61043a1e1'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            // $result = json_decode($response,true);
            // dd($result,$response);
            return response()->json(['status'=>'success','msg'=>'Enter Otp code which is send to your number']);
        }
    }
}
