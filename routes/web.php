<?php

use App\Http\livewire\HomeComponent;
use App\Http\livewire\ShopComponent;
use App\Http\livewire\CartComponent;
use App\Http\livewire\CheckoutComponent;
use App\Http\livewire\DetailsComponent;
use App\Http\livewire\CategoryComponent;
use App\Http\livewire\SearchComponent;
use App\Http\livewire\User\UserDashboardComponent;
use App\Http\livewire\Admin\AdminDashboardComponent;
use App\Http\livewire\Admin\AdminCategoryComponent;
use App\Http\livewire\Admin\AdminAddCategoryComponent;
use App\Http\livewire\Admin\AdminEditCategoryComponent;
use App\Http\livewire\Admin\AdminProductComponent;
use App\Http\livewire\Admin\AdminAddProductComponent;
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

 Route::get('/home', function () {
    return view('welcome');
}); 

Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class);
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 */

//For User o Custumer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});
//For ADMIN
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products'); 
    Route::get('/admin/products/add', AdminAddProductComponent::class)->name('admin.addproduct');
}); 