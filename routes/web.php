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

//注册
Route::get('/register','TestController@register'); //注册视图
Route::post('/regdo','TestController@regdo'); //注册的编辑

Route::get('/login','TestController@login');//登录
Route::post('/logindo','TestController@logindo');//登录编辑
