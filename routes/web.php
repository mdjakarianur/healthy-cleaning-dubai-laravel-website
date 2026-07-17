<?php

use App\Http\Middleware\CustomerMiddleware;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreManager;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\ProductItemController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProductInformationController;
use App\Http\Controllers\Admin\DistrictSetupController;
use App\Http\Controllers\Admin\ThanaController;
use App\Http\Controllers\Admin\MenuController;
// frontend
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ApproveCustomerController;

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
    return redirect('/login');
});

Route::get('error_solve',[AjaxController::class,'error_solve']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('stores/{id}',[StoreManager::class,'stores']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// product extra routes
Route::get('find_cat/{item_id}',[AjaxController::class,'find_cat']);
Route::get('getProductVariation/{type}',[AjaxController::class,'getProductVariation']);
Route::post('filterProduct',[AjaxController::class,'filterProduct']);
Route::post('TrashedfilterProduct',[AjaxController::class,'TrashedfilterProduct']);
Route::post('findArea',[AjaxController::class,'findArea']);
Route::get('getAreaName/{id}',[AjaxController::class,'getAreaName']);
Route::post('filterSupplier',[AjaxController::class,'filterSupplier']);

Route::get('/paypal_pay',[PaypalController::class,'paypal_pay']);
Route::post('pay_with_paypal',[PaypalController::class,'pay_with_paypal'])->name('pay_with_paypal');
Route::get('success',[PaypalController::class,'success'])->name('success');
Route::get('cancel',[PaypalController::class,'cancel'])->name('cancel');

Route::get('GetCategorie/{category_id}',[ServiceCategoryController::class,'GetCategorie']);
Route::get('GetService/{service_id}',[FaqController::class,'GetService']);
Route::get('GetDivision/{division_id}',[DistrictSetupController::class,'GetDivision']);
Route::get('GetDistrict/{district_id}',[ThanaController::class,'GetDistrict']);

Route::post('change_menu_status',[MenuController::class,'status'])->name('menu.status');

Route::post('searchProduct',[AjaxController::class,'searchProduct']);
Route::post('disableAds',[AjaxController::class,'disableAds'])->name('frontend.disable_ads');


// web.php
Route::middleware('auth')
    ->prefix('admin')
    ->group(base_path('routes/admin.php'));

require __DIR__.'/auth.php';

// frontend
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('about', 'about');
    Route::get('blogs', 'blogs');
    Route::get('blog_details/{id}', 'blog_details');
    Route::get('services', 'services');
    Route::get('service_detail/{id}', 'service_detail');
    Route::get('careers', 'careers');
    Route::get('career_detail/{id}', 'career_detail');
    Route::get('gallery', 'gallery');
    Route::get('videoalbum', 'videoalbum');
    Route::get('privacy_policy', 'privacy_policy');
    Route::get('newsevent', 'newsevent');
    Route::get('newsevents_details/{id}', 'newsevents_details');
    Route::get('ads_details/{id}', 'ads_details');
    Route::get('privacypolicy', 'privacypolicy');
    Route::get('termsconditions', 'termsconditions');
    Route::get('returnrefund', 'returnrefund');
    Route::get('serviceguarantee', 'serviceguarantee');
    Route::get('team', 'team');
    Route::post('BookService/{id}', 'BookService');
    Route::post('sendReview/{id}', 'sendReview');
    Route::get('contact', 'contact');
    Route::post('sendMessage', 'sendMessage');
    Route::get('/customer_registration', 'customer_registration');
    Route::post('CustomerRegistration', 'CustomerRegistration');
});

Route::post('customerLoginAttempt', [FrontendController::class, 'loginAttempt'])->name('customer.login_attempt');

Route::get('customer-login', [FrontendController::class, 'customerLogin'])->name('customer.login');
Route::get('pass_change', [FrontendController::class, 'pass_change']);
Route::middleware([CustomerMiddleware::class])->group(function () {
    Route::get('customer_dashboard', [FrontendController::class, 'customer_dashboard'])->name('customer.dashboard');
});

Route::get('pending-customer', [FrontendController::class, 'pendingCustomer'])->name('pending.customer');

Route::get('/customerprofile/{id}', [CustomerDashboardController::class, 'customerprofile']);
Route::post('/updatecustomerdashboard/{id}', [CustomerDashboardController::class, 'updatecustomerdashboard']);
Route::get('/viewservice', [CustomerDashboardController::class, 'viewservice']);
Route::get('/servicebooking', [CustomerDashboardController::class, 'servicebooking']);
Route::post('createservice', [CustomerDashboardController::class, 'createservice']);

Route::get('/changepasswordcustomer', [CustomerDashboardController::class, 'changepasswordcustomer']);
Route::post('/upchangepasswordcustomer', [CustomerDashboardController::class, 'upchangepasswordcustomer']);

Route::get('customerlogout', [CustomerDashboardController::class, 'destroy'])->name('customerlogout');


Route::resources([
    'approve_customer' => ApproveCustomerController::class,
]);

Route::get('DenyCustomer/{id}', [ApproveCustomerController::class, 'DenyCustomer']);
Route::get('ApproveCustomer/{id}', [ApproveCustomerController::class, 'ApproveCustomer']);
Route::post('GetService',[CustomerDashboardController::class,'GetService']);
