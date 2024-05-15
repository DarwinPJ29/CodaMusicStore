<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\StocksController;
use App\Http\Controllers\Website\AuthenticationController;
use App\Http\Controllers\Website\PaymentHistoryController;
use App\Http\Controllers\Website\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Guest or User Route
Route::controller(AuthenticationController::class)->group(function () {
    Route::any('/', 'index')->name('index');
    Route::any('/about', 'about')->name('about');
    Route::any('/sign_in', 'signin')->name('signin')->middleware('guest');
    Route::get('/sign_up', 'signup')->name('signup')->middleware('guest');
    Route::post('/sign_up', 'signup')->name('signups')->middleware('guest');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    Route::any('/change_password', 'changePassword')->name('changePassword')->middleware('auth');
});

//Admin Routes
//Dashboard Routes
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware(['auth', 'admin']);
});

//Product Cruds
Route::resource('/product', ProductController::class)->middleware(['auth', 'admin']);
Route::patch('product/archive/{id}', [ProductController::class, 'archive'])->name('archive')->middleware(['auth', 'admin']);
Route::patch('product/unarchive/{id}', [ProductController::class, 'unarchive'])->name('unarchive')->middleware(['auth', 'admin']);

//Delivery Cruds
Route::resource('/delivery', DeliveryController::class)->middleware(['auth', 'admin']);
// Stocks Controller
Route::controller(StocksController::class)->group(function () {
    Route::get('/stocks', 'index')->name('stocks')->middleware(['auth', 'admin']);
    Route::get('/customers', 'customers')->name('customers')->middleware(['auth', 'admin']);
});

//Receipts Routes
Route::prefix('/orders')->controller(RequestController::class)->group(function () {
    Route::any('/requests', 'showRequest')->name('showRequest')->middleware(['auth', 'admin']);
    Route::any('/declined', 'showDeclined')->name('showDeclined')->middleware(['auth', 'admin']);
    Route::any('/received', 'showReceived')->name('showReceived')->middleware(['auth', 'admin']);
    Route::any('/completed', 'showCompleted')->name('showCompleted')->middleware(['auth', 'admin']);
    Route::get('/receive/{id}', 'receiveReceipts')->name('receiveReceipts')->middleware(['auth', 'admin']);
    Route::get('/decline/{id}', 'declineReceipts')->name('declineReceipts')->middleware(['auth', 'admin']);
});

//Report Routes
Route::prefix('reports')->controller(ReportController::class)->group(function () {
    Route::any('/', 'reports')->name('reports')->middleware(['auth', 'admin']);
    Route::any('/generate', 'generateToPdf')->name('generateToPdf')->middleware(['auth', 'admin']);
});


//Website Routes

//User Controller
Route::controller(UserController::class)->group(function () {
    Route::get('product/view/{id}', 'viewProduct')->name('view.product');
    Route::any('/category/{id}', 'category')->name('category');
    Route::post('/search', 'search')->name('search');
    Route::get('my-cart/view/{id}', 'showCart')->name('view.showCart')->middleware('auth');
    Route::any('add-to-cart/product/{id}', 'addToCart')->name('get.addToCart');
    Route::patch('add-to-cart/product/edit/{id}', 'updateQuantity')->name('patch.updateQuantity')->middleware('auth');
    Route::delete('add-to-cart/product/remove/{id}', 'removeProduct')->name('del.removeProduct')->middleware('auth');
    Route::any('add-to-card/checkout/upload/{id}', 'checkout')->name('get.checkout')->middleware('auth');
});

// Payment History Controller
Route::prefix('/payment-history')->controller(PaymentHistoryController::class)->group(function () {
    Route::any('/checkout', 'checkoutHistory')->name('checkoutHistory')->middleware('auth');
    Route::any('/receive', 'toReceive')->name('toReceive')->middleware('auth');
    Route::any('/completed', 'completed')->name('completed')->middleware('auth');
    Route::any('/declined', 'declined')->name('declined')->middleware('auth');
});
