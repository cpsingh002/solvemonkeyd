<?php

use Illuminate\Support\Facades\Route;
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
   
});