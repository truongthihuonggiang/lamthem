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
		$kt_vieclam = new kt_vieclam;
        $tb_tinh = $kt_vieclam->get_tinh();
        $kt_loaicongviec = new kt_loaicongviec;
        $tb_loaicongviec = $kt_loaicongviec->all();
		View::share([
            'nav'=>$nav,
            'tb_tinh'=>$tb_tinh,
            'tb_loaicongviec'=>$tb_loaicongviec]);	
	}
    public function index(){
        $oc_nguoidung = new oc_nguoidung;
        $tb_oc_nguoidung = $oc_nguoidung->all();
        $kt_vieclam = new kt_vieclam;
        $tb_vieclam = $kt_vieclam->get_kt_vieclam();
        return view('layouts.content',[
                    'index',
                    'tb_vieclam'=>$tb_vieclam,
                    'tb_oc_nguoidung'=>$tb_oc_nguoidung]);
    }
    public function tuyendung(){
        return view('pages.tuyendung',['page'=>'tuyendung']);
    }
    public function ungvien(){
        return view('pages.ungvien',['page'=>'ungvien']);
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

    	return view('pages.chitietvieclam',
            ['page'=>'tuyendung',
            'tb_vieclam'=>$tb_vieclam,
            'tb_oc_nguoidung'=>$tb_oc_nguoidung]);

    }
    public function test(){
    	$kt_vieclam = new kt_vieclam;
    	$tb_vieclam = $kt_vieclam->get_tinh();
        foreach ($tb_vieclam as $row) {
            echo $row->tinh."<br/>";
        }
    	
    }
    public function timviec(Request $request){
       $kt_vieclam = new kt_vieclam;
       $tb_timviec = $kt_vieclam->timviec($request->tinh,$request->idloaiviec);
       return view('pages.tuyendung.timviec',[
                   'page'=>'tuyendung',
                   'tb_timviec'=>$tb_timviec
                    ]);
    }
}
