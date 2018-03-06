<?php

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

Route::get('/',[
   'as'=> 'trangchu' ,
    'uses' => 'PageController@getIndex'
]);
Route::get('/loai-san-pham/{id_type}',[
   'as' => 'loaisanpham' ,
    'uses' => 'PageController@getLoaiSP'
]);
Route::get('/chi-tiet-san-pham/{id}',[
   'as' => 'chitietsanpham' ,
   'uses' => 'PageController@getChiTietSP'
]);
Route::get('/lien-he',[
    'as' => 'lienhe' ,
    'uses' => 'PageController@getLienHe'
]);
Route::get('/gioi-thieu',[
   'as' => 'gioithieu' ,
   'uses' => 'PageController@getGioiThieu'
]);
Route::get('/them-vao-gio-hang/{id}',[
   'as' => 'themgiohang' ,
    'uses' => 'PageController@getAddToCart'
]);
Route::get('/xoa-khoi-gio-hang/{id}',[
   'as' => 'xoakhoigiohang' ,
   'uses' => 'PageController@getDeleteToCart'
]);
Route::get('/dat-hang',[
   'as' => 'dathang' ,
   'uses' => 'PageController@getCheckout'
]);
Route::post('dat-hang',[
   'as' => 'dathang',
   'uses' => 'PageController@postCheckout'
]);
Route::get('dang-nhap',[
   'as' => 'dangnhap' ,
   'uses' => 'PageController@getLogin'
]);
Route::get('dang-ki',[
   'as' => 'dangki' ,
   'uses' => 'PageController@getSignUp'
]);
Route::post('dang-ki',[
    'as' => 'dangki' ,
    'uses' => 'PageController@postSignUp'
]);
Route::post('dang-nhap',[
   'as' => 'dangnhap' ,
   'uses' => 'PageController@postLogin'
]);
Route::get('dang-xuat',[
   'as' => 'dangxuat',
   'uses' => 'PageController@getLogout'
]);
Route::get('tim-kiem',[
   'as' => 'timkiem' ,
    'uses' => 'PageController@getTimKiem'
]);