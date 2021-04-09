<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, NewsController, FeedbackController, OrdersController};
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

// for admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
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

