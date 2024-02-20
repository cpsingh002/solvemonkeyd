<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Livewire\DashboardComponent;
use App\Livewire\Category\CategoryComponent;
use App\Livewire\Category\AddCategoryComponent;
use App\Livewire\Category\EditCategoryComponent;
use App\Livewire\Category\SubCategoryComponent;
use App\Livewire\Category\AddSubCategoryComponent;
use App\Livewire\Category\EditSubCategoryComponent;
use App\Livewire\Package\AddPackagecomponent;
use App\Livewire\Package\Packagecomponent;
use App\Livewire\Package\EditPackagecomponent;
use App\Livewire\City\Citycomponent;
use App\Livewire\User\UserComponent;
use App\Livewire\User\AddUserComponent;
use App\Livewire\User\EditUserComponent;
use App\Livewire\Banner\BannerComponent;
use App\Livewire\Banner\AddBannerComponent;
use App\Livewire\Banner\EditBannerComponent;
use App\Livewire\Testimonial\TestimonialComponent;
use App\Livewire\Testimonial\AddTestimonialComponent;
use App\Livewire\Testimonial\EditTestimonialComponent;
use App\Livewire\Product\ProductComponent;
use App\Livewire\Product\AddProductComponent;
use App\Livewire\Product\EditProductComponent;
use App\Livewire\Brand\BrandComponent;
use App\Livewire\Brand\AddBrandComponent;
use App\Livewire\Brand\EditBrandComponent;
use App\Livewire\Attribute\AttributeComponent;
use App\Livewire\Attribute\AddAttributeComponent;
use App\Livewire\Attribute\EditAttributeComponent;
use App\Livewire\ModelNumber\ModelNumberComponent;
use App\Livewire\ModelNumber\AddModelNumberComponent;
use App\Livewire\ModelNumber\EditModelNumberComponent;
use App\Livewire\AttributeOption\AttributeOptionComponent;
use App\Livewire\AttributeOption\AddAttributeOptionComponent;
use App\Livewire\AttributeOption\EditAttributeOptionComponent;

use App\Livewire\User\AddUserProductComponent;
use App\Livewire\User\EditUserProductComponent;
use App\Livewire\Frontend\HomeComponent;
use App\Livewire\Frontend\AboutComponent;
use App\Livewire\Frontend\ContactComponent;
use App\Livewire\Frontend\ProductDetailsComponent;
use App\Livewire\Frontend\ProductListComponent;
use App\Livewire\Frontend\FaqComponent;
use App\Livewire\Frontend\PrivacyPolicyComponent;
use App\Livewire\Frontend\TermsConditionComponent;
use App\Livewire\Frontend\PackagesComponent;
use App\Livewire\Frontend\CategorySearchComponent;
use App\Livewire\Frontend\BrandSearchComponent;

use App\Livewire\User\UserAccountComponent;
use App\Livewire\User\MessageComponent;
use App\Livewire\User\UserDashboardComponent;
use App\Livewire\User\UserOrderComponent;
use App\Livewire\User\UserWishlistComponent;
use App\Livewire\User\ProductAdsComponent;
use App\Livewire\User\Profile\UserEditProfileComponent;
use App\Livewire\ThankyouComponent;


use App\Livewire\BrandTest\BrandTesTComponent;
use App\Livewire\BrandTest\AddBrandTesTComponent;
use App\Livewire\BrandTest\EditBrandTesTComponent;
use App\Livewire\AttributeTest\AttributeTestComponent;
use App\Livewire\AttributeTest\AddAttributeTestComponent;
use App\Livewire\AttributeTest\EditAttributeTestComponent;

use App\Livewire\Frontend\SearchComponent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/ulogin',[LoginController::class,'ulogin']);
Route::post('/ulogin',[LoginController::class,'uloginauth'])->name('ulogin');
Route::post('/uregisteor',[RegisterController::class,'uregisteor'])->name('uregisteor');
Route::get('/adminlogin',[LoginController::class,'adminlogin']);
Route::post('/adminlogin',[LoginController::class,'adminloginauth'])->name('adminlogin');
Route::get('/about',AboutComponent::class)->name('about');
Route::get('/contact',ContactComponent::class)->name('contact');
Route::get('/product-list',ProductListComponent::class)->name('product-list');
Route::get('/product/{slug}',ProductDetailsComponent::class)->name('product.details');
Route::get('/faq',FaqComponent::class)->name('faq');
Route::get('/terms-and-condition',TermsConditionComponent::class)->name('terms-and-condition');
Route::get('/privacy-policy',PrivacyPolicyComponent::class)->name('privacy-policy');
Route::get('/packages',PackagesComponent::class)->name('package');
Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');
Route::get('/product-category/{category_slug}/{scategory_slug?}',CategorySearchComponent::class)->name('product.category');
Route::get('product-brand/{brand_slug}',BrandSearchComponent::class)->name('product.brand');
Route::get('/',HomeComponent::class)->name('/');
Route::get('/searchs', SearchComponent::class)->name('searchs');
Route::get('/search/{s}/{c?}/{text}',SearchComponent::class)->name('search');

Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/message',MessageComponent::class)->name('message');
    Route::get('/user-order',UserOrderComponent::class)->name('user-order');
    Route::get('/user-account',UserAccountComponent::class)->name('user-account');
    Route::get('/user-dashboard',UserDashboardComponent::class)->name('user-dashboard');
    Route::get('/wishlist',UserWishlistComponent::class)->name('wishlist');
    Route::get('/user-ads',ProductAdsComponent::class)->name('user-ads');
    Route::get('/user/profile/edit',UserEditProfileComponent::class)->name('user.editprofile');
});

// frontend routes

Route::get('/post-ad',AddUserProductComponent::class)->name('post-ad');

// Route::get('/admin/product/add',AddProductComponent::class)->name('admin.addproduct');

Route::get('/edit-ad/{pid}',EditUserProductComponent::class)->name('edit-ad');
//frontend user routes


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth:sanctum','authadmin'])->group(function(){});

// Route::middleware(['auth:sanctum','verified'])->group(function(){
//     Route::get('/user/dashboard',[UserController::class,'index'])->name('user.dashboard');
   
//     Route::get('/user/change-password',[UserController::class,'PasswordChange'])->name('user.changepassword');
//     Route::get('/user/profile',[UserController::class,'Profile'])->name('user.profile');
//     Route::get('/user/profile/edit',[UserController::class,'Editprofile'])->name('user.editprofile');
// });

Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',DashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',CategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}',EditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/subcategories',SubCategoryComponent::class)->name('admin.subcategories');
    Route::get('/admin/subcategory/add',AddSubCategoryComponent::class)->name('admin.addsubcategory');
    Route::get('/admin/subcategory/edit/{scategory_slug}',EditSubCategoryComponent::class)->name('admin.editsubcategory');
    Route::get('/admin/packages',Packagecomponent::class)->name('admin.packages');
    Route::get('/admin/package/add',AddPackagecomponent::class)->name('admin.addpackage');
    Route::get('/admin/package/edit/{pid}',EditPackagecomponent::class)->name('admin.editpackage');
    Route::get('/admin/cities',Citycomponent::class)->name('admin.cities');
    Route::get('/admin/users',UserComponent::class)->name('admin.users');
    Route::get('/admin/user/add',AddUserComponent::class)->name('admin.adduser');
    Route::get('/admin/user/edit/{uid}',EditUserComponent::class)->name('admin.edituser');


    Route::get('/admin/products',ProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{pid}',EditProductComponent::class)->name('admin.editproduct');
    Route::get('/admin/banners',BannerComponent::class)->name('admin.banners');
    Route::get('/admin/banner/add',AddBannerComponent::class)->name('admin.addbanner');
    Route::get('/admin/banner/edit/{bid}',EditBannerComponent::class)->name('admin.editbanner');
    Route::get('/admin/testimonials',TestimonialComponent::class)->name('admin.testimonials');
    Route::get('/admin/testimonial/add',AddTestimonialComponent::class)->name('admin.addtestimonial');
    Route::get('/admin/testimonial/edit/{tid}',EditTestimonialComponent::class)->name('admin.edittestimonial');
    Route::get('/admin/brands',BrandComponent::class)->name('admin.brands');
    Route::get('/admin/brand/add',AddBrandComponent::class)->name('admin.addbrand');
    Route::get('/admin/brand/edit/{bid}',EditBrandComponent::class)->name('admin.editbrand');

    Route::get('/admin/attributes',AttributeComponent::class)->name('admin.attributes');
    Route::get('/admin/attribute/add',AddAttributeComponent::class)->name('admin.addattribute');
    Route::get('/admin/attribute/edit/{aid}',EditAttributeComponent::class)->name('admin.editattribute');
    Route::get('/admin/modelnumbers',ModelNumberComponent::class)->name('admin.modelnumbers');
    Route::get('/admin/modelnumber/add',AddModelNumberComponent::class)->name('admin.addmodelnumber');
    Route::get('/admin/modelnumber/edit/{mid}',EditModelNumberComponent::class)->name('admin.editmodelnumber');

    Route::get('/admin/attributeoptions',AttributeOptionComponent::class)->name('admin.attributeoptions');
    Route::get('/admin/attributeoption/add',AddAttributeOptionComponent::class)->name('admin.addattributeoption');
    Route::get('/admin/attributeoption/edit/{oid}',EditAttributeOptionComponent::class)->name('admin.editattributeoption');

    Route::get('/admin/testbrands',BrandTestComponent::class)->name('admin.testbrands');
    Route::get('/admin/testbrand/add',AddBrandTestComponent::class)->name('admin.testaddbrand');
    Route::get('/admin/testbrand/edit/{bid}',EditBrandTestComponent::class)->name('admin.testeditbrand');

    Route::get('/admin/testattributes',AttributeTestComponent::class)->name('admin.testattributes');
    Route::get('/admin/testattribute/add',AddAttributeTestComponent::class)->name('admin.testaddattribute');
    Route::get('/admin/testattribute/edit/{aid}',EditAttributeTestComponent::class)->name('admin.testeditattribute');
   
});