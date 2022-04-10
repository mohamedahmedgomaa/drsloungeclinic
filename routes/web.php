<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as DashboardControllerAdmin;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductController;
use App\Http\Livewire\Admin\Order\Order;
use App\Http\Livewire\Admin\OrderStatus\OrderStatus;
use App\Http\Livewire\Admin\OurService\OurService;
use App\Http\Livewire\Admin\Product\Product;
use App\Http\Livewire\Admin\ProductCategory\ProductCategory;
use App\Http\Livewire\Admin\ProductSubCategory\ProductSubCategory;
use App\Http\Livewire\Admin\ProductSubSubCategory\ProductSubSubCategory;
use App\Http\Livewire\Admin\Subscribe\Subscribe;
use App\Http\Livewire\Admin\Tag\Tag;
use App\Http\Livewire\Admin\UserBook\UserBook;
use App\Http\Livewire\User\Product\Cart;
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

Route::group(
    [
        'prefix' => (new Mcamara\LaravelLocalization\LaravelLocalization)->setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::prefix('user')->name('user.')->group(function () {

            Route::get('product/{id}', [ProductController::class, 'show'])->name('product');
            Route::get('cart', Cart::class)->name('cart');

            // Auth User
            Route::group(['middleware' => ['auth:web']], function () {

            });
        });

        Route::prefix('admin')->name('admin.')->group(function () {

            Route::get('login', [LoginController::class, 'login'])->name('login');
            Route::get('logout', [LoginController::class, 'logout'])->name('logout');

            Route::group(['middleware' => ['auth:admin']], function () {
                Route::get('/', [DashboardControllerAdmin::class, 'dashboard'])->name('dashboard');
                Route::get('/dashboard', [DashboardControllerAdmin::class, 'dashboard'])->name('dashboard');

                Route::get('booking', UserBook::class)->name('booking');
                Route::get('subscribe', Subscribe::class)->name('subscribe');
                Route::get('product', Product::class)->name('product');
                Route::get('product-category', ProductCategory::class)->name('productCategory');
                Route::get('product-sub-category', ProductSubCategory::class)->name('productSubCategory');
                Route::get('product-sub-sub-category', ProductSubSubCategory::class)->name('productSubSubCategory');
                Route::get('tag', Tag::class)->name('tag');
                Route::get('order', Order::class)->name('order');
                Route::get('our-service', OurService::class)->name('ourService');
                Route::get('order-status', OrderStatus::class)->name('orderStatus');

            });
        });
    });
