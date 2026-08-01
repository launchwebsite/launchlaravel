<?php
use App\Http\Controllers\CarListingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:vendor')->prefix('vendor/listings')->group(function () {
    Route::get('/cars', [CarListingController::class, 'index'])->name('listings.cars.index');
    Route::get('/cars/create', [CarListingController::class, 'create'])->name('listings.cars.create');
    Route::post('/cars', [CarListingController::class, 'store'])->name('listings.cars.store');
    Route::get('/cars/{id}/edit', [CarListingController::class, 'edit'])->name('listings.cars.edit');
    Route::put('/cars/{id}', [CarListingController::class, 'update'])->name('listings.cars.update');
    Route::delete('/cars/{id}', [CarListingController::class, 'destroy'])->name('listings.cars.destroy');
});
