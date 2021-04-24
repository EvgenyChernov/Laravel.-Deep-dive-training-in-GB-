<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{Account\AccountController,
    CategoryController,
    NewsController,
    FeedbackController,
    OrdersController,
    ParserController,
    SocialiteController
};
use App\Http\Controllers\Admin\{FeedbackController as AdminFeedbackController,
    CategoryController as AdminCategoryController,
    NewsController as AdminNewsController,
    UserController as AdminUserController
};

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
// TODO временно делал домашней страницей (думаю переделать на HomeController)
Route::get('/', [NewsController::class, 'index'])
    ->name('home');

Route::get('category', [CategoryController::class, 'index'])
    ->name('category');
Route::get('category/show{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('category.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect()->route('login');
    })->name('logout');
// for account
    Route::get('/account', AccountController::class)
        ->name('account');
// for admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::resource('/category', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/feedback', AdminFeedbackController::class);
        Route::resource('/user', AdminUserController::class);
        Route::get('/parsing', ParserController::class)
            ->name('parsing');
    });
});

Route::get('news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/show/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');


Route::get('feedback', [FeedbackController::class, 'index'])
    ->name('feedback');
Route::get('feedback/create', [FeedbackController::class, 'create'])
    ->name('feedback.create');
Route::group(['prefix' => 'feedback', 'as' => 'feedback.'], function () {
    Route::resource('/', FeedbackController::class);
});

Route::get('orders', [OrdersController::class, 'index'])
    ->name('orders');
Route::get('orders/create', [OrdersController::class, 'create'])
    ->name('orders.create');
Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::resource('/', OrdersController::class);
});

Auth::routes();

Route::group(['middleware' => 'guest', 'prefix' => 'socialite'], function () {
    //login VK
    Route::get('/auth/vk', [SocialiteController::class, 'loginVK'])
        ->name('vk.init');
    Route::get('/auth/vk/callback', [SocialiteController::class, 'responseVK'])
        ->name('vk.callback');
    //login Facebook
    Route::get('/auth/facebook', [SocialiteController::class, 'loginFacebook'])
        ->name('facebook.init');
    Route::get('/auth/facebook/callback', [SocialiteController::class, 'responseFacebook'])
        ->name('facebook.callback');
});
https://homestead.test/auth/facebook/callback


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
