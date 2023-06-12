<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('login', [AuthController::class, 'processLogin']);
});



Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('users/datatable', [UserController::class, 'datatable'])->name('users.datatable');
    Route::get('users/{user}/confirm-delete', [UserController::class, 'confirmDelete'])->name('users.confirm-delete');
    Route::resource('users', UserController::class)->except(['show']);

    Route::get('products/datatable', [ProductController::class, 'datatable'])->name('products.datatable');
    Route::get('products/{product}/confirm-delete', [ProductController::class, 'confirmDelete'])->name('products.confirm-delete');
    Route::resource('products', ProductController::class);
});

Route::get('event', function() {
   \App\Events\ShoutoutToUser::dispatch(auth()->user());
});

