<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontendSettingController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/login-page', [FrontendController::class, 'userLoginView'])->name('user.login');
Route::post('/user-login', [CustomerController::class, 'userLogin'])->name('user.user_login');
Route::get('/register-page', [FrontendController::class, 'userRegistrationView'])->name('user.register');
Route::get('/provider-register', [FrontendController::class, 'partnerRegistrationView'])->name('partner.register');
Route::get('/forgotpassword-page', [FrontendController::class, 'forgotPassword'])->name('user.forgot_password');

Route::get('/category-list', [FrontendController::class, 'catgeoryList'])->name('category.list');
Route::get('/subcategory-list', [FrontendController::class, 'subCatgeoryList'])->name('subcategory.list');
Route::get('/service-list', [FrontendController::class, 'serviceList'])->name('service.list');
Route::get('/blog-list', [FrontendController::class, 'blogList'])->name('blog.list');
Route::get('/provider-list', [FrontendController::class, 'providerList'])->name('frontend.provider');

Route::get('/category-details/{id}', [FrontendController::class, 'categoryDetail'])->name('category.detail');
Route::get('/blog-details/{id}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
Route::get('/provider-detail/{id}', [FrontendController::class, 'providerDetail'])->name('provider.detail');
Route::get('/handyman-detail/{id}', [FrontendController::class, 'handymanDetail'])->name('handyman-detail');
Route::get('/service-detail/{id}', [FrontendController::class, 'serviceDetail'])->name('service.detail');

Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('user.privacy_policy');
Route::get('/term-conditions', [FrontendController::class, 'termConditions'])->name('user.term_conditions');
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy'])->name('user.refund_policy');
Route::get('/help-support', [FrontendController::class, 'helpSupport'])->name('user.help_support');
Route::get('/data-deletion-request', [FrontendController::class, 'DataDeletion'])->name('user.data_deletion_request');


Route::get('/book-service', [FrontendController::class, 'bookServiceView'])->name('book.service');
Route::get('/book-post-job', [FrontendController::class, 'bookPostJobView'])->name('book.post_job');
Route::get('/booking-detail/{id}', [FrontendController::class, 'bookingDetail'])->name('booking.detail');

Route::get('/post-job', [FrontendController::class, 'postJob'])->name('post.job');
Route::get('/related-service/{id}', [FrontendController::class, 'relatedService'])->name('related.service');

Route::get('/favourite-service', [FrontendController::class, 'favouriteServiceList'])->name('favourite.service');
Route::get('/service-packages', [FrontendController::class, 'servicePackageList'])->name('service.package');
Route::get('/rating-all', [FrontendController::class, 'ratingList'])->name('rating.all');

Route::get('/post-job-detail/{id}', [FrontendController::class, 'postJobDetail'])->name('post.job.detail');


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/booking-list', [FrontendController::class, 'bookingList'])->name('booking.list');
    Route::get('/post-job-list', [FrontendController::class, 'postJobList'])->name('post.job.list');
    Route::post('save-favourite',[ServiceController::class, 'saveFavouriteService' ])->name('save-favourite');
    Route::post('delete-favourite',[ServiceController::class, 'deleteFavouriteService' ])->name('delete-favourite');
    Route::post('save-booking-rating', [BookingController::class, 'saveBookingRating' ] )->name('save-booking-rating');
    Route::post('save-recently-viewed/{serviceId}',[FrontendSettingController::class,'recentlyViewedStore' ])->name('save-recently-viewed');
    Route::get('get-recently-viewed',[FrontendSettingController::class,'recentlyViewedGet' ])->name('get-recently-viewed');
});
Route::get('/category-datatable', [FrontendController::class, 'categoryDatatable'])->name('category.data');
Route::get('/subcategory-datatable', [FrontendController::class, 'subCategoryDatatable'])->name('subcategory.data');
Route::get('/service-datatable', [FrontendController::class, 'serviceDatatable'])->name('service.data');
Route::get('/blog-datatable', [FrontendController::class, 'blogDatatable'])->name('blog.data');
Route::get('/provider-datatable', [FrontendController::class, 'providerDatatable'])->name('provider.data');
Route::get('/booking-datatable', [FrontendController::class, 'bookingDatatable'])->name('booking.data');
Route::get('/post-job-datatable', [FrontendController::class, 'postJobDatatable'])->name('post.job.data');
Route::get('/favouriteservice-datatable', [FrontendController::class, 'favouriteServiceDatatable'])->name('favouriteservice.data');
Route::get('/rating-datatable', [FrontendController::class, 'ratingDatatable'])->name('rating.data');
Route::post('/user-subscribe', [FrontendController::class, 'userSubscribe'])->name('user.subscribe');











