<?php

use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(SubCategoryController::class)->group(function () {
    Route::get('/subcategory', 'index')->name('admin-subcategory');
    Route::get('/subcategory/create', 'create')->name('admin-subcategory-create');
    Route::post('/subcategory/store', 'store')->name('admin-subcategory-store');
    Route::get('/subcategory/{id}/edit', 'edit')->name('admin-subcategory-edit');
    Route::put('/subcategory/{id}/update', 'update')->name('admin-subcategory-update');
    Route::delete('/subcategory/{id}/delete', 'destroy')->name('admin-subcategory-delete');
});

