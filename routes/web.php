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
// Route::get('index',function(){
// 	return view('layouts.content',['index'=>'index']);
// });
Route::get('test',['uses'=>'Mycontroller@test']);

Route::post('timviec',[
	'as'=>'timviec',
	'uses'=>'Mycontroller@timviec'
]);


Route::post('login',[
	'as'=>'login',
	'uses'=>'Mycontroller@login'
]);

Route::get('index',['as'=>'index','uses'=>'Mycontroller@index']);
Route::get('tuyendung','Mycontroller@tuyendung');
Route::get('ungvien','Mycontroller@ungvien');
// Route::get('{page}','Mycontroller@page');

Route::get('chitietvieclam/{id}',[
	'as'=>'chitietvieclam',
	'uses'=>'Mycontroller@chitietvieclam'
]);


