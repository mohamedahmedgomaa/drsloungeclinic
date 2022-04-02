<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as DashboardControllerAdmin;
use App\Http\Controllers\User\DashboardController;
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

                Route::get('booking', \App\Http\Livewire\Admin\UserBook\UserBook::class)->name('booking');

            });
        });
    });
