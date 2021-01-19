<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
    function()
{

    Auth::routes();


    Route::get('/', function () {
        return redirect(\route('home'));
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('posts',App\Http\Controllers\PostController::class);
    // i dont understand why i had to change posts to post in url so it can work!!
    Route::get('/post/search',[App\Http\Controllers\PostController::class,'search'])->name('posts.search');

});
