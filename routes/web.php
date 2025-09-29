<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuItemsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
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


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.show.category');
    Route::get('/menu-item', [MenuItemsController::class, 'index'])->name('admin.menuitem');
    Route::get('/menu-item/create', [MenuItemsController::class, 'create'])->name('admin.show.item');
    Route::post('/menu-item', [MenuItemsController::class, 'store'])->name('admin.store.item');
    Route::post('/category', [CategoryController::class, 'store'])->name('admin.store.category');
    Route::post('/menu-item/{menuItem}', [MenuItemsController::class, 'update'])->name('admin.update.item');
    Route::get('/menu-item/{menuItem}/edit', [MenuItemsController::class, 'edit'])->name('admin.edit.item');
});

Route::middleware('auth')->controller(CustomerController::class)->group(function () {
    Route::get('/fos', 'index')->name('customer.index');
});
