<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kt_vieclam;
use App\kt_loaicongviec;
use App\oc_nguoidung;
use App\kt_nav;
use App\kt_binhluan_vieclam;
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
        $kt_vieclam = new kt_vieclam;
        $tb_timviec = $kt_vieclam->timviec('all','all');
        return view('pages.tuyendung',[
            'page'=>'tuyendung',
            'tb_timviec'=>$tb_timviec]);
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
    	$tb_vieclam = $kt_vieclam->chitietvieclam($id); //$kt_vieclam->where('idvieclam',$id)->get();
        $tb_vieclam_tacgia = $kt_vieclam->chitietvieclam_tacgia($id); 
    	$oc_nguoidung = new oc_nguoidung;
    	$tb_oc_nguoidung = $oc_nguoidung->all();
        $kt_binhluan_vieclam = new kt_binhluan_vieclam;
        $tb_binhluan = $kt_binhluan_vieclam->tb_binhluan($id);
    	return view('pages.chitietvieclam',
            ['page'=>'tuyendung',
            'tb_vieclam'=>$tb_vieclam,
            'tb_oc_nguoidung'=>$tb_oc_nguoidung,
            'tb_vieclam_tacgia'=>$tb_vieclam_tacgia,
            'tb_binhluan'=>$tb_binhluan]);

    }
    public function timviec(Request $request){
       $kt_vieclam = new kt_vieclam;
       $tb_timviec = $kt_vieclam->timviec($request->tinh,$request->idloaiviec);
       return view('pages.tuyendung.timviec',[
                   'page'=>'tuyendung',
                   'tb_timviec'=>$tb_timviec
                    ]);
    }



    public function test(){
        $kt_vieclam = new kt_binhluan_vieclam;
        $tb_vieclam = $kt_vieclam->tb_binhluan(6305);
        //var_dump($tb_vieclam);
        foreach ($tb_vieclam as $row) {
            echo $row->noidung."<br/>";
            echo $row->idnguoidung;
        }
        
    }
}
