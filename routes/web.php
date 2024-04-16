<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');



Route::middleware('auth')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('/vendor-dashboard', [VendorController::class, 'index'])->name('vendor-dashboard');
    Route::get('/customer-dashboard', [CustomerController::class, 'index'])->name('customer-dashboard');
    Route::post('/fetch-products-by-category', [AdminController::class, 'fetchProductsByCategory'])->name('fetch.products.by.category');

});



Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');



Route::get('/manage/users/{user}', [AdminController::class, 'show'])->name('manage.users.show');
Route::delete('/manage/users/{user}', [AdminController::class, 'destroy'])->name('manage.users.destroy');
Route::get('/manage/products', 'AdminController@indexProducts')->name('manage.products.index');
Route::get('/manage/categories', 'AdminController@indexCategories')->name('manage.categories.index');
Route::get('/manage/users', [AdminController::class, 'index'])->name('manage.users.index');

Route::get('/manage/reviews', [AdminController::class, 'indexReviews'])->name('manage.reviews.index');
Route::delete('/manage/reviews/{id}', [AdminController::class, 'deleteReview'])->name('manage.reviews.delete');


