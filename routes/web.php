<?php

use App\Http\Livewire\Pages\CartComponent;
use App\Http\Livewire\Pages\CategoryComponent;
use App\Http\Livewire\Pages\Contact;
use App\Http\Livewire\Pages\Details;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\Search;
use App\Http\Livewire\Pages\Shop;
use App\Http\Livewire\Pages\Wishlist;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Admin\Category\Index as AdminCategory;
use App\Http\Livewire\Admin\Category\Create as AdminCategoryCreate;
use App\Http\Livewire\Admin\Category\Update as AdminCategoryUpdate;
use App\Http\Livewire\Admin\Product\Index as AdminProduct;
use App\Http\Livewire\Admin\Product\Create as AdminProductCreate;
use App\Http\Livewire\Admin\Product\Update as AdminProductUpdate;
use App\Http\Livewire\User\Dashboard as UserDashboard;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route for pages
Route::get('/',Home::class);
Route::get('/shop',Shop::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/wishlist',Wishlist::class)->name('product.wishlist');
Route::get('/search',Search::class)->name('product.search');
Route::get('/product/{product_slug}',Details::class)->name('product.details');
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/contact',Contact::class);

// Route for Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    // Route for Admin category
    Route::get('/admin/category', AdminCategory::class)->name('admin.category');
    Route::get('/admin/category/create', AdminCategoryCreate::class)->name('admin.category.create');
    Route::get('/admin/category/update/{category_slug}', AdminCategoryUpdate::class)->name('admin.category.update');
    // Route for Admin product
    Route::get('/admin/product', AdminProduct::class)->name('admin.product');
    Route::get('/admin/product/create', AdminProductCreate::class)->name('admin.product.create');
    Route::get('/admin/product/update/{product_slug}', AdminProductUpdate::class)->name('admin.product.update');
});
// Route for User
Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
});
