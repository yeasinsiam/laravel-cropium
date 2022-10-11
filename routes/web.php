<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\CategoryPageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\RegisterPageController;
use App\Http\Controllers\UserPageController;
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




// Admin Routes
Route::group(['prefix' => "/admin", 'middleware' => ['auth:sanctum', 'verified'], 'as' => 'admin.'], function () {

    Route::get('/', function () {
        return redirect(null, 301)->route('admin.dashboard.index');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('posts', PostController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);

    // user
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
});




// Customer Routes
Route::group(['prefix' => '/customer', 'as' => 'customer.'], function () {



    Route::group(['middleware' =>  'guest.customer'], function () {
        Route::get('/register', [CustomerController::class, 'registerPage'])->name('register-page');
        Route::post('/register', [CustomerController::class, 'register'])->name('register');

        Route::get('/login', [CustomerController::class, 'loginPage'])->name('login-page');
        Route::post('/login', [CustomerController::class, 'login'])->name('login');
    });

    Route::group(['middleware' =>  'auth.customer'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');
    });
});








Route::group(['prefix' => "/"], function () {
    // Home
    Route::get('/', [HomePageController::class, 'index'])->name('home.index');

    // Blog
    Route::resource('/blog', BlogPageController::class, [
        'only' => ['index', 'show']
    ]);

    // Category
    Route::resource('/categories', CategoryPageController::class, [
        'only' => ['show']
    ]);
    // User
    Route::get('/users/{user:slug}', [UserPageController::class, 'show'])->name('users.show');


    // Login & Register
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', [RegisterPageController::class, 'index'])->name('user.register');
        Route::post('/register', [RegisterPageController::class, 'register'])->name('user.register');
        Route::get('/login', [LoginPageController::class, 'index'])->name('user.login');
        Route::post('/login', [LoginPageController::class, 'login'])->name('user.login');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::post('/logout', [LoginPageController::class, 'logout'])->name('user.logout');
    });
});