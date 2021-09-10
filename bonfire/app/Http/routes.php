<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Products;
use App\User;
use App\Bills;
use App\BillDetail;
use App\Brands;
use App\Blogs;

Route::get('/', function () {
    return view('welcome');
});

Route::get('trangchu', 'PageController@getIndex');

Route::get('checkout', 'PageController@getCheckOut');
Route::post('checkout', 'PageController@postCheckOut');

Route::get('product', 'PageController@getProduct');
Route::get('about', 'PageController@getAbout');
Route::get('services', 'PageController@getServices');
Route::get('portfolio', 'PageController@getPortfolio');
Route::get('contact', 'PageController@getContact');
Route::get('blog', 'PageController@getBlog');
Route::get('shopping_cart', 'PageController@getShoppingCart');

Route::get('signup', 'PageController@getSignUp');
Route::post('signup', 'PageController@postSignUp');

Route::get('login', 'PageController@getLogin');
Route::post('login', 'PageController@postLogin');

Route::get('logout', 'PageController@getLogout');

Route::get('edit', 'PageController@getEdit');
Route::post('edit', 'PageController@postEdit');

Route::get('add_to_cart/{id}',[
    'as'=> 'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);

Route::get('del_cart/{id}',[
    'as'=> 'xoagiohang',
    'uses'=>'PageController@getDelItemCart'
]);

Route::match(['get', 'post'], 'search','PageController@search');


Route::get('admin/login', 'UserController@getLoginAdmin');
Route::post('admin/login', 'UserController@postLoginAdmin');
Route::get('admin/logout', 'UserController@getLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () 
{
    Route::group(['prefix' => 'products'], function () {
        Route::get('list', 'ProductsController@getIndex');
        Route::get('edit/{id}', 'ProductsController@getEdit');
        Route::post('edit/{id}', 'ProductsController@postEdit');

        Route::get('add', 'ProductsController@getAdd');
        Route::post('add', 'ProductsController@postAdd');

        Route::get('delete/{id}', 'ProductsController@getDelete');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('list', 'UserController@getIndex');
        Route::get('edit/{id}', 'UserController@getEdit');
        Route::post('edit/{id}', 'UserController@postEdit');
        Route::get('delete/{id}', 'UserController@getDetete');
    });

    Route::group(['prefix' => 'bills'], function () {
        Route::get('list', 'BillsController@getIndex');
        Route::get('bill_detail/{id}', 'BillsController@getDetail');
    });

    Route::group(['prefix' => 'blogs'], function () {
        Route::get('list', 'BlogsController@getIndex');
        Route::get('edit/{id}', 'BlogsController@getEdit');
        Route::post('edit/{id}', 'BlogsController@postEdit');

        Route::get('add', 'BlogsController@getAdd');
        Route::post('add', 'BlogsController@postAdd');

        Route::get('delete/{id}', 'BlogsController@getDelete');
    });

    Route::group(['prefix' => 'brands'], function () {
        Route::get('list', 'BrandsController@getIndex');
        Route::get('edit/{id}', 'BrandsController@getEdit');
        Route::post('edit/{id}', 'BrandsController@postEdit');

        Route::get('add', 'BrandsController@getAdd');
        Route::post('add', 'BrandsController@postAdd');

        Route::get('delete/{id}', 'BrandsController@getDelete');
    });
});