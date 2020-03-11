<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kt_vieclam;
use App\kt_loaicongviec;
use App\oc_nguoidung;
use App\kt_nav;
use App\kt_binhluan_vieclam;
use App\kt_nguoidung_tuyendung;
use App\kt_nguoidung_timviec;
use App\kt_danhgia_vieclam_tuyendung;
use View;
use Illuminate\Support\Facades\DB;

class Ungvien_Controller extends Controller
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
	public function ungvien(Request $request){
		$active = "ungvien";
		$tinh = "";
		$limit = isset($request->limit) ? $request->limit : 10;
		$kt_nguoidung_timviec = new kt_nguoidung_timviec;
		$tb_ungvien = $kt_nguoidung_timviec->get_dsungvien($tinh,$limit);
		$end_page = count($tb_ungvien);
        return view('pages.ungvien',compact('active','tb_ungvien','limit','end_page'));
    }
    public function page_limit(Request $request){
    	if ($request->ajax()) {
    		$tinh = "";
			$limit = isset($request->limit) ? $request->limit+10 : 10;
			$kt_nguoidung_timviec = new kt_nguoidung_timviec;
			$tb_ungvien = $kt_nguoidung_timviec->get_dsungvien($tinh,$limit);
			$end_page = count($tb_ungvien);
        	return view('pages.ungvien.ds_ungvien',compact('tb_ungvien','limit','end_page'))->render();
    	}
    	else{
    		return view('errors.404');
    	}
    }
    public function chitietungvien(Request $request){
    	$idtimviec = $request->idungvien;
    	$kt_nguoidung_timviec = new kt_nguoidung_timviec;
    	$kt_danhgia_vieclam_tuyendung = new kt_danhgia_vieclam_tuyendung;
    	$chitietungvien = $kt_nguoidung_timviec->get_chitietungvien($idtimviec);
    	$binhluan = $kt_danhgia_vieclam_tuyendung->get_dsbinhluan_idtimviec($idtimviec);
    	return view('pages.ungvien.chitietungvien',compact('chitietungvien','binhluan'));
    }
}
