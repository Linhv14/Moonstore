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
    Route::get('admin-dashboard', function () {
        return view('admin.index');
    })->name('route.admin.index'); 
    //=====================================================================

    // Show Categories
    Route::get('admin-list-category', [CategoryController::class, 'listCategory'])->name('route.admin.list_category');
    // Add Category
    Route::get('admin-add-category', [CategoryController::class, 'addCategory'])->name('route.admin.add_category');
    Route::post('admin-add-category', [CategoryController::class, 'saveCategory'])->name('route.admin.save_category');
    // Delete category
    Route::get('admin-delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('route.admin.delete_category');
    // Update category
    Route::get('admin-edit-category/{id}', [CategoryController::class, 'editCategory'])->name('route.admin.edit_category');
    Route::post('admin-update-category/{id}', [CategoryController::class, 'updateCategory'])->name('route.admin.update_category');
    //========================================================================

    // Show Products
    Route::get('admin-list-product', [ProductController::class, 'listProduct'])->name('route.admin.list_product');
    // Add Product
    Route::get('admin-add-product', [ProductController::class, 'addProduct'])->name('route.admin.add_product');
    Route::post('admin-add-product', [ProductController::class, 'saveProduct'])->name('route.admin.save_product');
    // Delete Product
    Route::get('admin-delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('route.admin.delete_product');
    // Update Product
    Route::get('admin-edit-product/{id}', [ProductController::class, 'editProduct'])->name('route.admin.edit_product');
    Route::post('admin-update-product/{id}', [ProductController::class, 'updateProduct'])->name('route.admin.update_product');
    //========================================================================

    // Show Banners
    Route::get('admin-list-banner', [BannerController::class, 'listBanner'])->name('route.admin.list_banner');
    // Add Banner
    Route::get('admin-add-banner', [BannerController::class, 'addBanner'])->name('route.admin.add_banner');
    Route::post('admin-add-banner', [BannerController::class, 'saveBanner'])->name('route.admin.save_banner');
    // Delete Banner
    Route::get('admin-delete-banner/{id}', [BannerController::class, 'deleteBanner'])->name('route.admin.delete_banner');
    // Update Banner
    Route::get('admin-edit-banner/{id}', [BannerController::class, 'editBanner'])->name('route.admin.edit_banner');
    Route::post('admin-update-banner/{id}', [BannerController::class, 'updateBanner'])->name('route.admin.update_banner');
    //======================================================================

    // Show Posts
    Route::get('admin-list-post', [PostController::class, 'listPost'])->name('route.admin.list_post');
    // Add Post
    Route::get('admin-add-post', [PostController::class, 'addPost'])->name('route.admin.add_post');
    Route::post('admin-add-post', [PostController::class, 'savePost'])->name('route.admin.save_post');
    // Delete Post
    Route::get('admin-delete-post/{id}', [PostController::class, 'deletePost'])->name('route.admin.delete_post');
    // Update Post
    Route::get('admin-edit-post/{id}', [PostController::class, 'editPost'])->name('route.admin.edit_post');
    Route::post('admin-update-post/{id}', [PostController::class, 'updatePost'])->name('route.admin.update_post');
    //========================================================================

    Route::middleware(['IsAdmin'])->group(function () {
        // Show Users
        Route::get('admin-list-user', [UserController::class, 'listUser'])->name('route.admin.list_user');
        // Delete User
        Route::get('admin-delete-user/{id}', [UserController::class, 'deleteUser'])->name('route.admin.delete_user');
        // Update User
        Route::get('admin-edit-user/{id}', [UserController::class, 'editUser'])->name('route.admin.edit_user');
        Route::post('admin-update-user/{id}', [UserController::class, 'updateUser'])->name('route.admin.update_user');
        // Update Type User
        Route::post('admin-update-type-user/{id}', [UserController::class, 'updateTypeUser'])->name('route.admin.update_type_user');
    });
    //========================================================================

    // Show Orders
    Route::get('admin-list-order', [OrderController::class, 'listOrder'])->name('route.admin.list_order');
    // Update Order
    Route::get('admin-edit-order/{id}', [OrderController::class, 'editOrder'])->name('route.admin.edit_order');
    Route::post('admin-update-order/{id}', [OrderController::class, 'updateOrder'])->name('route.admin.update_order');
    // Delete Order
    Route::get('admin-delete-order/{id}',[OrderController::class, 'deleteOrder'])->name('route.admin.delete_order');
    // Delete Deliver
    Route::get('admin-delete-deliver/{id}',[OrderController::class, 'deleteDeliver'])->name('route.admin.delete_deliver');
    // Back to Order
    Route::get('admin-back-to-order/{id}',[OrderController::class, 'backToOrder'])->name('route.admin.back_to_order');
    // Show Detail Order
    Route::get('admin-detail-order/{id}', [OrderController::class, 'detailOrder'])->name('route.admin.detail_order');
    // Confirm to Deliver
    Route::get('admin-confirm-deliver/{id}', [OrderController::class, 'confirmDeliver'])->name('route.admin.confirm_deliver');
    // Show List Delivering
    Route::get('admin-list-deliver', [OrderController::class, 'listDeliver'])->name('route.admin.list_deliver');
    // Confirm to Reveice
    Route::get('admin-confirm-order/{id}', [OrderController::class, 'confirmOrder'])->name('route.admin.confirm_order');
    // Show History Orders
    Route::get('admin-history-order', [OrderController::class, 'adminHistoryOrder'])->name('route.admin.history_order');
});

// Login Admin
Route::get('login-admin', [LoginAdminController::class, 'loginAdmin'])->middleware('authAdminOut')->name('route.admin.login_admin');
Route::post('login-admin', [LoginAdminController::class, 'authenticate'])->name('route.admin.login_admin_process');

// Logout Admin
Route::get('logout-admin', [LoginAdminController::class, 'logoutAdmin'])->name('route.admin.logout_admin');

// Home Page
Route::get('/', [ClientController::class, 'showClient'])->name('route.client.index');

Route::middleware(['authClientOut'])->group(function () {
    // Register Client
    Route::get('register', [UserController::class, 'registerClient'])->name('route.client.register_client');
    Route::post('register', [UserController::class, 'saveClient'])->name('route.client.save_client');

    // Login Client
    Route::get('login', [LoginClientController::class, 'login'])->name('route.client.login_client');
    Route::post('login', [LoginClientController::class, 'authenticate'])->name('route.login_client_process');
    Route::post('redirect', [LoginClientController::class, 'redirect'])->name('route.client.redirect');

    // Show Forget Password
    Route::get('forget-password', [LoginClientController::class, 'fotgetPassword'])->name('route.client.forget_password');
});

// Logout Client
Route::get('logout-client', [LoginClientController::class, 'logoutClient'])->name('route.logout_client');

// Process Cart
Route::get('client-add-cart/{id}', [CartController::class, 'addCart'])->name('route.client.add_cart');
Route::get('product/client-add-cart/{id}', [CartController::class, 'addCart'])->name('route.client.product.add_cart');
Route::get('category/client-add-cart/{id}', [CartController::class, 'addCart'])->name('route.client.category.add_cart');
Route::get('client-add-cart-item', [CartController::class, 'addCartItem'])->name('route.client.add_cart_item');

Route::get('client-delete-cart/{id}', [CartController::class, 'deleteCart'])->name('route.client.delete_cart');
Route::get('product/client-delete-cart/{id}', [CartController::class, 'deleteCart'])->name('route.client.product.delete_cart');
Route::get('category/client-delete-cart/{id}', [CartController::class, 'deleteCart'])->name('route.client.category.delete_cart');
Route::get('client-delete-cart-item/{id}', [CartController::class, 'deleteCartItem'])->name('route.client.delete_cart_item');
Route::get('client-update-cart-item/{id}/{quanty}', [CartController::class, 'updateCartItem'])->name('route.client.update_cart');

// Show Cart
Route::get('cart', [CartController::class, 'showCart'])->name('route.client.cart');

// Show Product Detail
Route::get('product/{id}', [ProductController::class, 'showProductDetail'])->name('route.client.product_detail');

// Checkout 
Route::middleware(['authClientIn'])->group(function () {
    Route::get('checkout', [CartController::class, 'checkout'])->name('route.client.checkout');
    Route::post('order-confirm', [CartController::class, 'confirmOrder'])->name('route.client.order_confirm');
    Route::get('order', [CartController::class, 'showOrder'])->name('route.client.order');    
    Route::get('history-order', [OrderController::class, 'clientHistoryOrder'])->name('route.client.history_order');    
});

// Show Sort Category
Route::get('category/sort/', [CategoryController::class, 'fillterCategory']);

// Show Category
Route::get('category/find/{id}', [CategoryController::class, 'showCategory']);
// Show Category
Route::get('category/{type}', [CategoryController::class, 'showTypeCategory']);

Route::get('search', [SearchController::class, 'search']);



