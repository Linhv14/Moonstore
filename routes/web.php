<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliverController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*///========================================================================

Route::middleware(['authAdminIn'])->group(function () {

    // Show Dashboard 
    Route::view('admin-dashboard', 'admin.index');
    //=====================================================================

    // Show Categories
    Route::view('admin-list-category', 'admin.category.list');
    // Add Category
    Route::view('admin-add-category', 'admin.category.add');
    Route::post('admin-save-category', [CategoryController::class, 'save']);
    // Delete category
    Route::get('admin-delete-category/{id}', [CategoryController::class, 'delete']);
    // Update category
    Route::get('admin-edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('admin-update-category/{id}', [CategoryController::class, 'update']);
    //========================================================================

    // Show Products
    Route::get('admin-list-product', [ProductController::class, 'list']);
    // Add Product
    Route::view('admin-add-product', 'admin.product.add');
    Route::post('admin-save-product', [ProductController::class, 'save']);
    // Delete Product
    Route::get('admin-delete-product/{id}', [ProductController::class, 'delete']);
    // Update Product
    Route::get('admin-edit-product/{id}', [ProductController::class, 'edit']);
    Route::post('admin-update-product/{id}', [ProductController::class, 'update']);
    //========================================================================

    // Show Banners
    Route::view('admin-list-banner', 'admin.banner.list');
    // Add Banner
    Route::view('admin-add-banner', 'admin.banner.add');
    Route::post('admin-save-banner', [BannerController::class, 'save']);
    // Delete Banner
    Route::get('admin-delete-banner/{id}', [BannerController::class, 'delete']);
    // Update Banner
    Route::get('admin-edit-banner/{id}', [BannerController::class, 'edit']);
    Route::post('admin-update-banner/{id}', [BannerController::class, 'update']);
    //======================================================================

    // Show Posts
    Route::view('admin-list-post', 'admin.post.list');
    // Add Post
    Route::view('admin-add-post', 'admin.post.add');
    Route::post('admin-save-post', [PostController::class, 'save']);
    // Delete Post
    Route::get('admin-delete-post/{id}', [PostController::class, 'delete']);
    // Update Post
    Route::get('admin-edit-post/{id}', [PostController::class, 'edit']);
    Route::post('admin-update-post/{id}', [PostController::class, 'update']);
    //========================================================================

    Route::middleware(['IsAdmin'])->group(function () {
        // Show Users
        Route::get('admin-list-user', [UserController::class, 'list']);
        // Delete User
        Route::get('admin-delete-user/{id}', [UserController::class, 'delete']);
        // Update User
        Route::get('admin-edit-user/{id}', [UserController::class, 'edit']);
        Route::post('admin-update-user/{id}', [UserController::class, 'update']);
        // Update Type User
        Route::post('admin-update-type-user/{id}', [UserController::class, 'updateType']);
    });
    //========================================================================

    // Show Orders
    Route::get('admin-list-order', [OrderController::class, 'list']);
    // Update Order
    Route::get('admin-edit-order/{id}', [OrderController::class, 'edit']);
    Route::post('admin-update-order/{id}', [OrderController::class, 'update']);
    // Delete Order
    Route::get('admin-delete-order/{id}',[OrderController::class, 'delete']);
    // Show Detail Order
    Route::get('admin-detail-order/{id}', [OrderController::class, 'detail']);
    // Back to Order
    Route::get('admin-back-to-order/{id}',[OrderController::class, 'backToOrder']);
    // Confirm to Reveice
    Route::get('admin-confirm-order/{id}', [OrderController::class, 'confirm']);
    // Show History Orders
    Route::get('admin-history-order', [OrderController::class, 'adminHistoryOrder']);

    // Show List Delivering
    Route::get('admin-list-deliver', [DeliverController::class, 'list']);
    // Confirm to Deliver
    Route::get('admin-confirm-deliver/{id}', [DeliverController::class, 'confirm']);
    // Delete Deliver
    Route::get('admin-delete-deliver/{id}',[DeliverController::class, 'delete']);
});

// Login Admin
Route::get('login-admin', [LoginAdminController::class, 'login'])->middleware('authAdminOut');
Route::post('login-admin', [LoginAdminController::class, 'authenticate']);

// Logout Admin
Route::get('logout-admin', [LoginAdminController::class, 'logout']);

// Home Page
Route::get('/', [LoginClientController::class, 'home']);

Route::middleware(['authClientOut'])->group(function () {
    // Register Client
    Route::get('register', [LoginClientController::class, 'register']);
    Route::post('register', [LoginClientController::class, 'save']);

    // Login Client
    Route::get('login', [LoginClientController::class, 'login']);
    Route::post('login', [LoginClientController::class, 'authenticate']);

    // Change option
    Route::post('redirect', [LoginClientController::class, 'redirect']);

    // Show Forget Password
    Route::get('forget-password', [LoginClientController::class, 'forgetPassword']);
});

// Logout Client
Route::get('logout', [LoginClientController::class, 'logout']);

// Process Cart
Route::get('client-add-cart/{id}', [CartController::class, 'add']);
Route::get('product/client-add-cart/{id}', [CartController::class, 'add']);
Route::get('category/client-add-cart/{id}', [CartController::class, 'add']);
Route::get('client-add-cart-item', [CartController::class, 'addItem']);

Route::get('client-delete-cart/{id}', [CartController::class, 'delete']);
Route::get('client-delete-cart-item/{id}', [CartController::class, 'deleteItem']);

Route::get('product/client-delete-cart/{id}', [CartController::class, 'delete']);
Route::get('category/client-delete-cart/{id}', [CartController::class, 'delete']);

Route::get('client-update-cart-item/{id}/{quanty}', [CartController::class, 'updateItem']);

// Show Cart
Route::view('cart', 'client.cart');

// Show Product Detail
Route::get('product/{id}', [ProductController::class, 'detail']);

// Checkout 
Route::middleware(['authClientIn'])->group(function () {
    Route::get('checkout', [CartController::class, 'checkout']);
    Route::post('order-confirm', [CartController::class, 'confirm']);

    Route::get('order', [OrderController::class, 'show']);    
    Route::get('history-order', [OrderController::class, 'clientHistoryOrder']);    
});

// Show Sort Category
Route::get('category/sort/', [CategoryController::class, 'sort']);
// Show Category
Route::get('category/find/{id}', [CategoryController::class, 'show']);
// Show Category
Route::get('category/{type}', [CategoryController::class, 'query']);

Route::get('search', [SearchController::class, 'search']);



