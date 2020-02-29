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

Route::get('/', function () {
    return view('welcome');
});

//注册视图
Route::get('/register','TestController@register');
//注册的编辑
Route::post('/regdo','TestController@regdo');

//登录
Route::get('/login','TestController@login');
//登录编辑
Route::post('/logindo','TestController@logindo');

//个人中心
Route::get('/center','TestController@center');

//
Route::any('/get','Getcontroller@GetAccessToken');

//关于access_token
Route::prefix('/user')->middleware('token')->group(function(){
    Route::get('/test','Getcontroller@test');//access_token接口测试
    Route::get('/test1','Getcontroller@test1');//access_token接口测试
});

