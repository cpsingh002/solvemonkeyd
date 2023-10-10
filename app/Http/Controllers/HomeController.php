<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }


    public function productList()
    {
        return view('product-list');
    }

    public function ProductDetails()
    {
        return view('product-details');
    }

    public function postAd()
    {
        return view('post-ad');
    }

    public function editAd()
    {
        return view('post-ad-edit');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function termsCondition()
    {
        return view('terms-condition');
    }

    public function faq()
    {
        return view('faq');
    }


    // user routes function
    public function message()
    {
        return view('user/message');
    }

    public function userOrder()
    {
        return view('user/user-order');
    }

    public function userAccount()
    {
        return view('user/user-account');
    }

    public function userAds()
    {
        return view('user/user-ads');
    }

    public function userDashboard()
    {
        return view('user/user-dashboard');
    }

    public function wishlist()
    {
        return view('user/wishlist');
    }
    


}