<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyOffer;
use App\Models\Package;
use Illuminate\View\View;
use Easebuzz\PayWithEasebuzzLaravel\PayWithEasebuzzLib;

class HomeController extends Controller
{
    //
    
    public function CompanyOffer(Request $request)
    {
        $companyoffers = CompanyOffer::where('status',1)->get();
        return view('company_offer',['companyoffers'=>$companyoffers]);
    }
    public function CompanyOfferDetails(Request $request)
    {
        $companyoffer = CompanyOffer::where('slug',$request->slug)->where('status',1)->first();
        $rcompanyoffers = CompanyOffer::where('id','!=', $companyoffer->id)->where('status',1)->get();
        return view('company_offer_detail',['companyoffer'=>$companyoffer,'rcompanyoffers'=>$rcompanyoffers]);
    }

    Public function PlanPurchase(Request $request, string $id)
    {
        // dd($request); 
        $packages = Package::where('pslug',$id)->where('status',1)->first();
        if (isset($packages))
        {

        }else{
            return redirect()->route('/');
        }


     return view('livewire.frontend.package-purchase-component',['packages'=>$packages]);
     
        
    }

    Public function PlanPurchaseadd(Request $request)
    {
        $packages = Package::where('pslug',$request->id)->where('status',1)->first();
        // $param = $request->post();
        $postData = array ( 
            "amount" => $packages->price, 
            "firstname" => Auth::user()->name, 
            "email" => Auth::user()->email, 
            "phone" => Auth::user()->phone, 
            "productinfo" => $packages->pname, 
            "surl" => route('easzy.pass'), 
            "furl" => route('user-packages'), 
        );
        $key = "YOUR_KEY_HERE";
        $salt = "YOUR_SALT_HERE";
        $env = "YOUR_ENV_HERE";
        $payebz = new PayWithEasebuzzLib($key, $salt, $env);
        $result = $payebz->initiatePaymentAPI($param, true);
        
        // var_dump($result);
        // die();

        return view('initiate_payment', ['result' => $result]);
    }

    public function ebz_response(Request $request): View
    {
        $param = $request->post();
        // $param will contain the response provided to you by Easebuzz. You can handle your success and failed scenarios based on the response.
        var_dump($param);
        die();
        return view('initiate_payment', ['result' => '']);
    }


}
