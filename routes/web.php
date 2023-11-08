<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Livewire\DashboardComponent;
use App\Livewire\Category\CategoryComponent;
use App\Livewire\Category\AddCategoryComponent;
use App\Livewire\Category\EditCategoryComponent;
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


use App\Http\Controllers\HomeController;


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

Route::get('/', function () {
    return view('index');
});



// frontend routes
// Route::post('login',[LoginController::class,'login']);
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::get('/terms-and-condition',[HomeController::class,'termsCondition'])->name('terms-and-condition');
Route::get('/privacy-policy',[HomeController::class,'privacyPolicy'])->name('privacy-policy');
Route::get('/product-list',[HomeController::class,'productList'])->name('product-list');
Route::get('/product-detail',[HomeController::class,'ProductDetails'])->name('product-detail');
Route::get('/post-ad',[HomeController::class,'postAd'])->name('post-ad');
Route::get('/package',[HomeController::class,'package'])->name('package');

Route::get('/edit-ad',[HomeController::class,'editAd'])->name('edit-ad');


//frontend user routes
Route::get('/message',[HomeController::class,'message'])->name('message');
Route::get('/user-order',[HomeController::class,'userOrder'])->name('user-order');
Route::get('/user-account',[HomeController::class,'userAccount'])->name('user-account');
Route::get('/user-ads',[HomeController::class,'userAds'])->name('user-ads');
Route::get('/user-dashboard',[HomeController::class,'userDashboard'])->name('user-dashboard');
Route::get('/wishlist',[HomeController::class,'wishlist'])->name('wishlist');



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth:sanctum','authadmin'])->group(function(){});

Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard',[UserController::class,'index'])->name('user.dashboard');
   
    Route::get('/user/change-password',[UserController::class,'PasswordChange'])->name('user.changepassword');
    Route::get('/user/profile',[UserController::class,'Profile'])->name('user.profile');
    Route::get('/user/profile/edit',[UserController::class,'Editprofile'])->name('user.editprofile');
});

Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',DashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',CategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}/{scategory_slug?}',EditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/packages',Packagecomponent::class)->name('admin.packages');
    Route::get('/admin/package/add',AddPackagecomponent::class)->name('admin.addpackage');
    Route::get('/admin/package/edit/{pid}',EditPackagecomponent::class)->name('admin.editpackage');
    Route::get('/admin/cities',Citycomponent::class)->name('admin.cities');
    Route::get('/admin/users',UserComponent::class)->name('admin.users');
    Route::get('/admin/user/add',AddUserComponent::class)->name('admin.adduser');
    Route::get('/admin/user/edit/{uid}',EditUserComponent::class)->name('admin.edituser');


    Route::get('/admin/products',ProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{uid}',EditProductComponent::class)->name('admin.editproduct');
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
    // Route::get('/admin/attribute/edit/{bid}',EditAttributeComponent::class)->name('admin.editattribute');


   
});