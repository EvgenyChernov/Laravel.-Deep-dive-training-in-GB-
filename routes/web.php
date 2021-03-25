<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/name/{name}', function (string $name): string {
    return "Hello, $name";
});
// 4. Реализовать несколько страниц с выводом какой-либо информации.
//так же использовал пару простых вьюх
Route::get('/one/', function (){
    return view('one');
});
Route::get('/two/', function (){
    return view('two');
});

