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
Route::get('dangky',['as'=>'dangky','uses'=>'Canhan_Controller@dangky']);
Route::post('dangky',['uses'=>'Canhan_Controller@dangky_nguoidung'])->name('dangky_nguoidung');

Route::get('/', ['uses'=>'Home_Controller@index']);
// Route::get('index',function(){
// 	return view('layouts.content',['index'=>'index']);
// });
Route::get('test',['uses'=>'Mycontroller@test'])->name('test');

Route::post('timviec',[
	'as'=>'timviec',
	'uses'=>'Tuyendung_Controller@timviec'
]);
Route::get('timviec',['as'=>'timviec','uses'=>'Tuyendung_Controller@timviec']);

Route::get('index',['as'=>'index','uses'=>'Home_Controller@index']);
Route::get('index/pagination',['uses'=>'Home_Controller@index_pagination']);
//Route::post('index',['uses'=>'Mycontroller@index'])->name('dsvieclam');
Route::get('tuyendung',['as'=>'tuyendung','uses'=>'Tuyendung_Controller@tuyendung']);
Route::get('ungvien',['as'=>'ungvien','uses'=>'Ungvien_Controller@ungvien']);
Route::get('ungvien/page_limit',['uses'=>'Ungvien_Controller@page_limit'])->name('page_limit');

Route::get('canhan',['as'=>'canhan','uses'=>'Canhan_Controller@canhan']);
Route::get('canhan/themtintuyendung',['uses'=>'Canhan_Controller@themtintuyendung'])->name('themtintuyendung');
Route::post('canhan/themtintuyendung',['uses'=>'Canhan_Controller@save_dangtintuyendung'])->name('save_dangtintuyendung');
Route::get('canhan/hosotimviec',['uses'=>'Canhan_Controller@hosotimviec'])->name('hosotimviec');
Route::get('dangnhap',['uses'=>'Canhan_Controller@dangnhap'])->name('dangnhap');
Route::post('dangnhap',['uses'=>'Canhan_Controller@kiemtradangnhap'])->name('kiemtradangnhap');
Route::get('dangxuat',['uses'=>'Canhan_Controller@dangxuat'])->name('dangxuat');
// Route::get('{page}','Mycontroller@page');
Route::post('chitietvieclam',['uses'=>'Tuyendung_Controller@chitietvieclam'])->name('chitietvieclam');
Route::get('chitietvieclam',function(){
	return view('errors.404');
});

