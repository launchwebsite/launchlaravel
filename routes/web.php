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

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/category_list', [PageController::class, 'categorylist'])
    ->name('categorylist');

Route::get('/category_details', [PageController::class, 'categorydetails'])
    ->name('categorydetails');

Route::get('/job_opening', [PageController::class, 'jobopening'])
    ->name('jobopening');

// Apply for a job - select job and store it in session
Route::post('/apply_job/select', [PageController::class, 'selectJob'])
    ->name('applyjob.select');

// Application page
Route::get('/apply_job', [PageController::class, 'applyjob'])
    ->name('applyjob');

// Submit application
Route::post('/apply_job', [PageController::class, 'storeApplication'])
    ->name('storeApplication');

Route::get('/contact', [PageController::class, 'contact'])
    ->name('contact');

Route::get('/ad_post', [PageController::class, 'adpost'])
    ->name('adpost');

Route::post('/add-your-ad', [VendorController::class, 'VendorPostAdd'])
    ->name('vendoraddpost.store');

// vendor auto select
Route::get('/check-vendor', [VendorController::class, 'checkVendor'])
    ->name('vendor.check');

Route::get('/ad_details/{id?}', [PageController::class, 'addetails'])
    ->name('addetails');

Route::get('/ad_list1', [PageController::class, 'adlist1'])
    ->name('adlist1');

Route::get('/ad_list2', [PageController::class, 'adlist2'])
    ->name('adlist2');

Route::get('/ad_list3', [PageController::class, 'adlist3'])
    ->name('adlist3');

Route::get('/user_form', [PageController::class, 'user'])
    ->name('user');

Route::get('/index', [PageController::class, 'index'])
    ->name('index');

/*
|--------------------------------------------------------------------------
| Vendor Authentication
|--------------------------------------------------------------------------
*/

Route::post('/vendor/register', [VendorController::class, 'store'])
    ->name('vendor.register');

Route::get('/vendor-login', function () {
    return view('vendor.vendor-login');
})->name('vendor-login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

/*
|--------------------------------------------------------------------------
| Admin Login
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [LogController::class, 'login'])
        ->name('login');

    Route::post('/admin/loginuser', [LogController::class, 'loginuser'])
        ->name('login.user');

});

/*
|--------------------------------------------------------------------------
| Vendor Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:vendor')->group(function () {

    Route::get('/vendor/dashboard', [VendorController::class, 'dashboard'])
        ->name('vendor.dashboard');

    Route::delete('/vendor/logout', function (\Illuminate\Http\Request $request) {

        Auth::guard('vendor')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'You have been logged out successfully.');

    })->name('vendor.logout');

    Route::get('/vendor/ad-your-post', [VendorController::class, 'postlist'])->name('vendor.postlist');

    Route::get('/vendor-products', [VendorController::class, 'addpost'])->name('vendor.post.form');
    Route::post('/venddor-products/store', [VendorController::class, 'poststore'])->name('vendor.post-store');

    /*
    |--------------------------------------------------------------------------
    | Career
    |--------------------------------------------------------------------------
    */

    Route::get('/vendor/career', [CareerController::class, 'VendorIndex'])
        ->name('vendor.career.index');

    Route::get('/vendor/add-career', [CareerController::class, 'VendorCreate'])
        ->name('vendor.career.add');

    Route::post('/vendor/career/store', [CareerController::class, 'VendorStore'])
        ->name('vendor.career.store');

    Route::get('/vendor/career/edit/{id}', [CareerController::class, 'VendorEdit'])
        ->name('vendor.career.edit');

    Route::put('/vendor/career/update/{id}', [CareerController::class, 'VendorUpdate'])
        ->name('vendor.career.update');

    Route::get('/vendor/career/delete/{id}', [CareerController::class, 'VendorDestroy'])
        ->name('vendor.career.delete');

});

/*
|--------------------------------------------------------------------------
| Admin Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('page.dashboard');

    Route::delete('/admin/logout', [LogController::class, 'logout'])
        ->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Vendor Management
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/vendor_table', [AdminController::class, 'vendor'])
        ->name('admin.vendor');

    Route::post('/admin/vendor/{id}/toggle-status', [AdminController::class, 'toggleVendorStatus'])
        ->name('admin.vendor.toggle-status');

    Route::delete('/admin/vendor/{id}/delete', [AdminController::class, 'deleteVendor'])
        ->name('admin.vendor.delete');

    Route::get('/admin/vendor/create', [AdminController::class, 'vendorCreate'])
        ->name('admin.vendor.create');

    Route::post('/admin/vendor/store', [AdminController::class, 'vendorStore'])
        ->name('admin.vendor.store');

    Route::get('/admin/vendor/{id}/edit', [AdminController::class, 'vendorEdit'])
        ->name('admin.vendor.edit');

    Route::put('/admin/vendor/{id}/update', [AdminController::class, 'vendorUpdate'])
        ->name('admin.vendor.update');

    /*
    |--------------------------------------------------------------------------
    | Category Management
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/category', [CategoryController::class, 'index'])
        ->name('admin-category');

    Route::get('/admin/category/create', [CategoryController::class, 'create'])
        ->name('admin-category-create');

    Route::post('/admin/category', [CategoryController::class, 'store'])
        ->name('admin-category-store');

    Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])
        ->name('admin-category-edit');

    Route::put('/admin/category/{id}/update', [CategoryController::class, 'update'])
        ->name('admin-category-update');

    Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])
        ->name('admin-category-delete');

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */

    Route::get('/attributes', [AttributeController::class, 'index'])
        ->name('attributes.index');

    Route::get('/create', [AttributeController::class, 'create'])
        ->name('attributes.add');

    Route::post('/admin/attributes/store', [AttributeController::class, 'store'])
        ->name('attributes.store');

    Route::get('/admin/attributes/{id}/edit', [AttributeController::class, 'edit'])
        ->name('attributes.edit');

    Route::put('/admin/attributes/{id}/update', [AttributeController::class, 'update'])
        ->name('attributes.update');

    Route::get('/admin/attributes/delete/{id}', [AttributeController::class, 'destroy'])
        ->name('attributes.delete');

    /*
    |--------------------------------------------------------------------------
    | Product Creation
    |--------------------------------------------------------------------------
    */

    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::post('/products/store', [ProductController::class, 'store'])
        ->name('products.store');

    /*
    |--------------------------------------------------------------------------
    | Product AJAX Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/subcategory/{id}/attributes', [ProductController::class, 'getAttributes'])
        ->name('subcategory.attributes');

    Route::get('/category/{id}/subcategories', [ProductController::class, 'getSubCategories'])
        ->name('category.subcategories');

    /*
    |--------------------------------------------------------------------------
    | Career
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/career', [CareerController::class, 'index'])
        ->name('career.index');

    Route::get('/admin/add-career', [CareerController::class, 'create'])
        ->name('career.add');

    Route::post('/admin/career/store', [CareerController::class, 'store'])
        ->name('career.store');

    Route::get('/admin/career/{id}/edit', [CareerController::class, 'edit'])
        ->name('career.edit');

    Route::put('/admin/career/update/{id}', [CareerController::class, 'update'])
        ->name('career.update');

    Route::get('/admin/career/delete/{id}', [CareerController::class, 'destroy'])
        ->name('career.delete');

    Route::get('/admin/candidates-application', [CareerController::class, 'candidatesApplications'])
        ->name('candidates.application');

    /*
    |--------------------------------------------------------------------------
    | Admin Products
    |--------------------------------------------------------------------------
    */

    // Product create page
    Route::get('/admin/product', [ProductController::class, 'index'])
        ->name('admin.products.index');

    // Product list
    Route::get('/admin/vendor-added-posts', [ProductController::class, 'adminList'])
        ->name('admin.product.list');

    // Product edit
    Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])
        ->name('admin.product.edit');

    // Product update
    Route::put('/admin/product/{id}/update', [ProductController::class, 'update'])
        ->name('admin.product.update');

    // Product delete
    Route::delete('/admin/product/{id}/delete', [ProductController::class, 'destroy'])
        ->name('admin.product.delete');

});

/*
|--------------------------------------------------------------------------
| Subcategory Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/admin/subcategory.php';
