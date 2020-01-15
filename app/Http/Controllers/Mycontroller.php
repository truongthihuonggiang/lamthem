<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kt_vieclam;
use App\kt_loaicongviec;
use App\oc_nguoidung;
use App\kt_nav;
use View;


class Mycontroller extends Controller
{
	
	function __construct(){
		$kt_nav = new kt_nav;
		$nav = $kt_nav->get_nav();
		View::share(['nav'=>$nav]);	
	}
    public function page($page){
    	$oc_nguoidung = new oc_nguoidung;
    	$tb_oc_nguoidung = $oc_nguoidung->all();
    	if ($page=='index') {
    		$kt_loaicongviec = new kt_loaicongviec;
    		$tb_loaicongviec = $kt_loaicongviec->all();
    		$kt_vieclam = new kt_vieclam;
    		$tb_vieclam = $kt_vieclam->get_kt_vieclam();
    		return view('layouts.content',['index'=>$page,'tb_vieclam'=>$tb_vieclam,'tb_loaicongviec'=>$tb_loaicongviec,'tb_oc_nguoidung'=>$tb_oc_nguoidung]);
    	}
    	return view('pages.'.$page,['page'=>$page]);
    }
    public function login(Request $request){
    	$oc_nguoidung = new oc_nguoidung;
    	$tb_oc_nguoidung = $oc_nguoidung->all();
    	$kt=0;
    	foreach ($tb_oc_nguoidung as $row) {
    		if ($row->email==$request->emial_user&&$request->pass_user=='abc') {
    			$kt=1;
    		}
    		
    	}
    	if ($kt==1) {
    		echo "Dang nhap";
    	}
    	else{
    		echo "sai";
    	}
    }
    public function chitietvieclam($id) {
    	$kt_vieclam = new kt_vieclam;
    	$tb_vieclam = $kt_vieclam->where('idvieclam',$id)->get();
    	$oc_nguoidung = new oc_nguoidung;
    	$tb_oc_nguoidung = $oc_nguoidung->all();
    	return view('pages.chitietvieclam',['page'=>'tuyendung','tb_vieclam'=>$tb_vieclam,'tb_oc_nguoidung'=>$tb_oc_nguoidung]);

    }
    public function test(){
    	$kt_vieclam = new kt_nav;
    	$tb_vieclam = $kt_vieclam->get_nav();
    	var_dump($tb_vieclam);
    }
}
