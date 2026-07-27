<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/category_list', [PageController::class, 'categorylist'])->name('categorylist');
Route::get('/category_details', [PageController::class, 'categorydetails'])->name('categorydetails');
Route::get('/job_opening', [PageController::class, 'jobopening'])->name('jobopening');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/ad_post', [PageController::class, 'adpost'])->name('adpost');
Route::get('/apply_job', [PageController::class, 'applyjob'])->name('applyjob');
Route::get('/ad_details', [PageController::class, 'addetails'])->name('addetails');
Route::get('/ad_list1', [PageController::class, 'adlist1'])->name('adlist1');
Route::get('/ad_list2', [PageController::class, 'adlist2'])->name('adlist2');
Route::get('/ad_list3', [PageController::class, 'adlist3'])->name('adlist3');
Route::get('/user_form', [PageController::class, 'user'])->name('user');
Route::get('/index', [PageController::class, 'index'])->name('index');

Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [LogController::class, 'login'])->name('login');
    Route::post('/admin/loginuser', [LogController::class, 'loginuser'])->name('login.user');

});

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('page.dashboard');
    Route::delete('/admin/logout', [LogController::class, 'logout'])->name('logout');
    Route::get('/admin/vendor_table', [AdminController::class, 'vendor'])->name('admin.vendor');
    Route::post('/admin/vendor/{id}/toggle-status', [AdminController::class, 'toggleVendorStatus'])
        ->name('admin.vendor.toggle-status');

    // Route::resource('backend/home-banner',HomeBannerController::class);

});
