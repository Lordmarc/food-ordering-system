<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuItemsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    
Route::get('/login', 'showSignIn')->name('show.signin');
Route::get('/register', 'showSignUp')->name('show.signup');
Route::post('/login', 'login')->name('login');
Route::post('/register', 'register')->name('register');
});

// ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/stats', [AdminController::class, 'fetchStats'])->name('admin.dashboard.stats');
   

    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.show.category');
    Route::get('/menu-item', [MenuItemsController::class, 'index'])->name('admin.menuitem');
    Route::get('/menu-item/create', [MenuItemsController::class, 'create'])->name('admin.show.item');
    Route::post('/menu-item', [MenuItemsController::class, 'store'])->name('admin.store.item');
    Route::post('/category', [CategoryController::class, 'store'])->name('admin.store.category');
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.order');
    Route::post('/menu-item/{menuItem}', [MenuItemsController::class, 'update'])->name('admin.update.item');
    Route::get('/menu-item/{menuItem}/edit', [MenuItemsController::class, 'edit'])->name('admin.edit.item');
    Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.updateStatus');;
});
// CUSTOMER
Route::middleware('auth')->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('/checkout', [OrderController::class, 'store'])->name('customer.store');
    Route::get('/customer/order', [OrderController::class, 'customerOrder'])->name('customer.order');
    Route::get('/customer/orderlist', [OrderController::class, 'fetchOrders'])->name('customer.fetch.orders');
    Route::get('/customer/profile', [ProfileController::class, 'index'])->name('customer.profile');
    Route::get('/customer/profile', function() {
        return view('customer.partials.profile');
    })->name('customer.profile');

    Route::get('/customer/address', function() {
        return view('customer.partials.address');
    })->name('customer.address');

    Route::get('/customer/password', function() {
        return view('customer.partials.password');
    })->name('customer.password');

    Route::get('/customer/orders', function() {
        return view('customer.partials.orders');
    })->name('customer.order'); // kung yan ang ginagamit sa link mo

});

