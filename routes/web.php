<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function() {
   return view('about');
})->name('about');
Route::get('/contacts', function() {
    return view('contacts');
})->name('contacts');
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('collections', [ShopController::class, 'collections'])->name('collections');
Route::get('/products/{slug}', [HomeController::class, 'products'])->name('products');
Route::get('/product/{id}', [HomeController::class, 'productAjax'])->name('products.ajax');

// Terms and conditions
Route::get('terms-conditions', function() {return view('terms-conditions');})->name('terms-conditions');
// Privacy Policy
Route::get('privacy-policy', function() {return view('privacy-policy');})->name('privacy-policy');

Route::middleware('auth-customer')->group(function() {
    // My Account
   Route::group(['prefix' => 'my-account'], function() {
       Route::get('/', [AccountController::class, 'index'])->name('my-account');
       Route::get('/orders', [AccountController::class, 'orders'])->name('my-account.orders');
       Route::get('/orders/{id}', [AccountController::class, 'orderDetails'])->name('my-account.orders.details');

       Route::get('/account-details', [AccountController::class, 'accountDetails'])->name('my-account.account-details');
       Route::post('/account-details', [AccountController::class, 'accountDetailsUpdate'])->name('my-account.account-details.update');

       Route::get('/address', [AccountController::class, 'address'])->name('my-account.address');
       Route::get('/wishlist', [AccountController::class, 'wishlist'])->name('my-account.wishlist');
   });
        // Checkout Routes
       Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
       Route::post('/checkout', [CheckoutController::class, 'post'])->name('checkout.post');

       // Payment Routes
       Route::post('/paypal/order', [PaymentController::class, 'paypalOrder'])->name('paypal.order');
       Route::get('/paypal/success', [PaymentController::class, 'success'])->name('paypal.success');
       Route::get('/paypal/cancel', [PaymentController::class, 'cancel'])->name('paypal.cancel');

       Route::post('/stripe/', [PaymentController::class, 'stripeOrder'])->name('stripe.order');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Panel Routes

Route::group(['prefix' => 'app'], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Products Routes
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Categories Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Orders Routes
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders', [OrderController::class, 'store'])->name('admin.orders.store');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');


    // Users Routes
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Attributes Routes
    Route::get('/attributes', [AttributeController::class, 'index'])->name('admin.attributes.index');
    Route::get('/attributes/create', [AttributeController::class, 'create'])->name('admin.attributes.create');
    Route::get('/attributes/{id}', [AttributeController::class, 'show'])->name('admin.attributes.show');
    Route::post('/attributes', [AttributeController::class, 'store'])->name('admin.attributes.store');
    Route::get('/attributes/{id}/edit', [AttributeController::class, 'edit'])->name('admin.attributes.edit');
    Route::put('/attributes/{id}', [AttributeController::class, 'update'])->name('admin.attributes.update');
    Route::delete('/attributes/{id}', [AttributeController::class, 'destroy'])->name('admin.attributes.destroy');

    // Attributes Routes
    Route::get('/collections', [CollectionController::class, 'index'])->name('admin.collections.index');
    Route::get('/collections/create', [CollectionController::class, 'create'])->name('admin.collections.create');
    Route::get('/collections/{id}', [CollectionController::class, 'show'])->name('admin.collections.show');
    Route::post('/collections', [CollectionController::class, 'store'])->name('admin.collections.store');
    Route::get('/collections/{id}/edit', [CollectionController::class, 'edit'])->name('admin.collections.edit');
    Route::put('/collections/{id}', [CollectionController::class, 'update'])->name('admin.collections.update');
    Route::delete('/collections/{id}', [CollectionController::class, 'destroy'])->name('admin.collections.destroy');
});


