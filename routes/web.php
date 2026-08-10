<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/category_list', [PageController::class, 'categorylist'])->name('categorylist');
Route::get('/category_details', [PageController::class, 'categorydetails'])->name('categorydetails');
Route::get('/job_opening', [PageController::class, 'jobopening'])->name('jobopening');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/ad_post', [PageController::class, 'adpost'])->name('adpost');
Route::post('/add-your-ad', [VendorController::class, 'VendorPostAdd'])->name('vendoraddpost.store');
Route::get('/apply_job', [PageController::class, 'applyjob'])->name('applyjob');
Route::get('/ad_details', [PageController::class, 'addetails'])->name('addetails');
Route::get('/ad_list1', [PageController::class, 'adlist1'])->name('adlist1');
Route::get('/ad_list2', [PageController::class, 'adlist2'])->name('adlist2');
Route::get('/ad_list3', [PageController::class, 'adlist3'])->name('adlist3');
Route::get('/user_form', [PageController::class, 'user'])->name('user');
Route::get('/index', [PageController::class, 'index'])->name('index');

Route::post('/vendor/register', [VendorController::class, 'store'])->name('vendor.register');
Route::get('/vendor-login', function () {return view('vendor.vendor-login');})->name('vendor-login');
Route::get('/vendor-logout', function () {
    Session::forget('vendor');
    Session::flush();
    return redirect()->route('vendor-login')->with('success', 'vendor logged out successfully.');
})->name('vendor-logout');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [LogController::class, 'login'])->name('login');
    Route::post('/admin/loginuser', [LogController::class, 'loginuser'])->name('login.user');

});

Route::middleware('auth:vendor')->group(function () {

    Route::get('/vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
    Route::delete('/vendor/logout', function (\Illuminate\Http\Request $request) {
        Auth::guard('vendor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out successfully.');
    })->name('vendor.logout');

});

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('page.dashboard');
    Route::delete('/admin/logout', [LogController::class, 'logout'])->name('logout');
    Route::get('/admin/vendor_table', [AdminController::class, 'vendor'])->name('admin.vendor');
    Route::post('/admin/vendor/{id}/toggle-status', [AdminController::class, 'toggleVendorStatus'])
        ->name('admin.vendor.toggle-status');
    Route::delete('/admin/vendor/{id}/delete', [AdminController::class, 'deleteVendor'])->name('admin.vendor.delete');

    Route::get('/admin/vendor/create', [AdminController::class, 'vendorCreate'])->name('admin.vendor.create');
    Route::post('/admin/vendor/store', [AdminController::class, 'vendorStore'])->name('admin.vendor.store');
    Route::get('/admin/vendor/{id}/edit', [AdminController::class, 'vendorEdit'])->name('admin.vendor.edit');
    Route::put('/admin/vendor/{id}/update', [AdminController::class, 'vendorUpdate'])->name('admin.vendor.update');

    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin-category');
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin-category-create');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin-category-store');
    Route::post('/admin/category/edit', [CategoryController::class, 'edit'])->name('admin-category-edit');
    Route::get('/admin/category/edit', [CategoryController::class, 'showEdit'])->name('admin-category-edit-show');
    Route::put('/admin/category/update', [CategoryController::class, 'update'])->name('admin-category-update');
    Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin-category-delete');

    Route::get('/attributes', [AttributeController::class, 'index'])->name('attributes.index');
    Route::get('/create', [AttributeController::class, 'create'])->name('attributes.add');
    Route::post('/admin/attributes/store', [AttributeController::class, 'store'])->name('attributes.store');
    Route::post('/admin/attributes/edit', [AttributeController::class, 'edit'])->name('attributes.edit');
    Route::get('/edit', [AttributeController::class, 'showEdit'])->name('attributes.edit-show');
    Route::put('/admin/attributes/update', [AttributeController::class, 'update'])->name('attributes.update');
    Route::get('/admin/attributes/delete/{id}', [AttributeController::class, 'destroy'])->name('attributes.delete');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

    Route::get('/subcategory/{id}/attributes', [ProductController::class, 'getAttributes']);
    Route::get('/category/{id}/subcategories', [ProductController::class, 'getSubCategories']);

    Route::get('/admin/career', [CareerController::class, 'index'])->name('career.index');
    Route::get('/admin/add-career', [CareerController::class, 'create'])->name('career.add');
    Route::post('/admin/career/store', [CareerController::class, 'store'])->name('career.store');
    Route::get('/admin/career/edit/{id}', [CareerController::class, 'edit'])->name('career.edit');
    Route::put('/admin/career/update/{id}', [CareerController::class, 'update'])->name('career.update');
    Route::get('/admin/career/delete/{id}', [CareerController::class, 'destroy'])->name('career.delete');

    Route::get('/admin/product', [ProductController::class, 'index'])->name('products.index');
});

require __DIR__ . '/admin/subcategory.php';
