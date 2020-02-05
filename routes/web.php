<?php
use App\Http\Controllers\Mycontroller;
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
// Chia se du lieu cho tat ca cac view
$Mycontroller = new Mycontroller;
$Mycontroller->view_share();

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
Route::get('tuyendung',['as'=>'tuyendung','uses'=>'Mycontroller@tuyendung']);
Route::get('ungvien',['as'=>'ungvien','uses'=>'Mycontroller@ungvien']);
// Route::get('{page}','Mycontroller@page');

Route::get('chitietvieclam/{id}',[
	'as'=>'chitietvieclam',
	'uses'=>'Mycontroller@chitietvieclam'
]);


