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
    $data = [
        'name'  => '阿白',
        'phone' => '0900000000',
        'mali'  => 'cizyhane@gmail.com'
    ];
    return view('frontend/index',$data);
}) -> name('home');

Route::get('about',function(){
    return view('frontend/about');
}) -> name('about');

Route::get('products',function(){
    return view('frontend/products');
}) -> name('products');

Route::get('store',function(){
    return view('frontend/store');
}) -> name('store');


//後台

//登入
Route::get('/admin/login',function(){
    return view('backend.login');
});
Route::post('/admin/login','Auth\LoginController@login')->name('login');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){

    //登出
    Route::get('/admin/logout','Auth\LoginController@logout')->name('logout');

    //Website
    Route::get('/','Backend\WebsiteController@edit')->name('website.edit');
    Route::post('/','Backend\WebsiteController@update')->name('website.update');

    //Home
    Route::get('home','Backend\HomeController@edit')->name('home.edit');
    Route::post('home','Backend\HomeController@update')->name('home.update');

    //About
    Route::get('about','Backend\AboutController@edit')->name('about.edit');
    Route::post('about','Backend\AboutController@update')->name('about.update');

    //Product
    Route::resource('product','Backend\ProductController',['except'=>['show']]);

    //Store
    Route::get('store','Backend\StoreController@edit')->name('store.edit');
    Route::post('store','Backend\StoreController@update')->name('store.update');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
