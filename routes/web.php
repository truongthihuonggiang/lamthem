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
$tb = DB::table('kt_nav')->select(['id','name','link'])->get();
$nav = array();
foreach ($tb as $row) {
		$nav[] = $row;						
}
View::share([
	'nav'=>$nav
]);
Route::get('/', function () {
    return view('welcome');
});
Route::get('index',function(){
	return view('layouts.content',['index'=>'index']);
});
Route::get('{page}','Mycontroller@index');