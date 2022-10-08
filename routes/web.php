<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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



// Route
// 'middleware' => 'guest'






Route::group(['prefix' => "/admin", 'middleware' => 'auth', 'as' => 'admin.'], function () {

    Route::get('/', function () {
        return redirect(null, 301)->route('admin.dashboard.index');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('posts', PostController::class)->except(['show']);
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
});





Route::group(['prefix' => "/"], function () {
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    // Blog
    Route::resource('/blog', BlogController::class, [
        'only' => ['index', 'show']
    ]);

    // Category
    Route::resource('/categories', CategoryController::class, [
        'only' => ['show']
    ]);
    // User
    Route::get('/users/{user:slug}', [UserController::class, 'show'])->name('users.show');


    // Login & Register
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', [RegisterController::class, 'index'])->name('user.register');
        Route::post('/register', [RegisterController::class, 'register'])->name('user.register');
        Route::get('/login', [LoginController::class, 'index'])->name('user.login');
        Route::post('/login', [LoginController::class, 'login'])->name('user.login');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
    });
});