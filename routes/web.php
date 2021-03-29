<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{NewsController, HomeController, CategoryController};
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('category', [CategoryController::class, 'index'])
    ->name('category');
Route::get('category/show{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('category.show');

// for admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::get('news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/show/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
