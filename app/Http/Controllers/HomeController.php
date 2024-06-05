<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyOffer;

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
}
