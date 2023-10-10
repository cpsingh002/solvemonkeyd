@extends('layouts/base')
@section('container')
<main>



<div class="myAccout section-padding2">
<div class="container">
<div class="row">
<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5">

<div class="accountSidebar">
<ul class="listing listScroll">
	<li class="listItem">
<a href="{{'user-dashboard'}}" class="items active"> <i class="lar la-user-circle icon"></i> Dashboard</a>
</li>
<li class="listItem">
<a href="{{'user-account'}}" class="items "> <i class="lar la-user-circle icon"></i> My Account</a>
</li>
<!-- <li class="listItem">
<a href="memberShip.html" class="items"><i class="las la-address-card icon"></i> Membership</a>
</li> -->
<li class="listItem">
<a href="{{'user-ads'}}" class="items"><i class="las la-ad icon"></i> My Product Ads</a>
</li>
<li class="listItem">
<a href="{{'order'}}" class="items"><i class="las la-ad icon"></i> My Orders</a>
</li>
<li class="listItem">
<a href="{{'wishlist'}}" class="items"> <i class="lar la-heart icon"></i> Wishlist</a>
</li>
<li class="listItem">
<a href="{{'message'}}" class="items"> <i class="lar la-heart icon"></i> Chat</a>
</li>
<!-- <li class="listItem">
<a href="help.html" class="items"> <i class="lar la-question-circle icon"></i> Help</a>
</li> -->
</ul>
<div class="accessAccount">
<a href="#" class="account-btn"><i class="las la-sign-out-alt icon"></i> Logout</a>
</div>
</div>
</div>
<div class="col-xxl-9 col-xl-9 col-lg-8 col-md-7">

<div class="row mb-24">
<div class="col-sm-12">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
</ol>
</nav>
</div>




<div class="myListing mt-5">

	<div class="row">
		<div class="col-lg-4 col-md-6">

			<div class="singlePrice mb-24">
			<h4 class="priceTittle">Total Orders</h4>
			<span class="price">40<span class="subTittle"></span></span>
			<!-- <div class="btn-wrapper">
			<a href="#" class="cmn-btn-outline1">Get Started</a>
			</div> -->
			</div>
			</div>
		
		<!-- </div> -->
		<div class="col-lg-4 col-md-6">

			<div class="singlePrice mb-24">
			<h4 class="priceTittle">Total ADs</h4>
			<span class="price">80<span class="subTittle"></span></span>
			<!-- <div class="btn-wrapper">
			<a href="#" class="cmn-btn-outline1">Get Started</a>
			</div> -->
			</div>
			</div>
		
		<!-- </div> -->
		<div class="col-lg-4 col-md-6">

			<div class="singlePrice mb-24">
			<h4 class="priceTittle">Total Sell</h4>
			<span class="price">20<span class="subTittle"></span></span>
			<!-- <div class="btn-wrapper">
			<a href="#" class="cmn-btn-outline1">Get Started</a>
			</div> -->
			</div>
			</div>
		
		<!-- </div> -->





</div>
</div>
</div>
</div>
</div>

</main>
@endsection