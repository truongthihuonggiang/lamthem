<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kt_vieclam;
use App\kt_loaicongviec;
use App\oc_nguoidung;
use App\kt_nav;
use App\kt_binhluan_vieclam;
use App\kt_nguoidung_tuyendung;
use App\kt_danhgia_vieclam_tuyendung;
use View;
use Illuminate\Support\Facades\DB;

class Tuyendung_Controller extends Controller
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
    public function tuyendung(){
        $active = 'tuyendung';
        $kt_vieclam = new kt_vieclam;
        $oc_nguoidung = new oc_nguoidung;
        $tb_oc_nguoidung = $oc_nguoidung->all();
        $kt_nguoidung_tuyendung = new kt_nguoidung_tuyendung;
        $tb_nguoidung_tuyendung = $kt_nguoidung_tuyendung->get_nguoidung_tuyendung(); 
        $tb_soviecxong = $kt_vieclam->soviecxong();
        $tb_soviecchuaxong = $kt_vieclam->soviecchuaxong();
        return view('pages.tuyendung',compact('active','tb_oc_nguoidung','tb_nguoidung_tuyendung','tb_soviecchuaxong','tb_soviecxong'));
    }
    public function chitietvieclam(Request $request) {
        $idvieclam = $request->idvieclam;
        $dadangky = $request->dadangky;
    	$kt_vieclam = new kt_vieclam;
    	$chitietvieclam = $kt_vieclam->chitietvieclam($idvieclam); 
        $idtacgia = "";
        foreach ($chitietvieclam as $row) {
            $idtacgia = $row->idtacgia;
        }
        $tb_vieclam_tacgia = $kt_vieclam->chitietvieclam_tacgia($idtacgia,$idvieclam);
        $kt_binhluan_vieclam = new kt_binhluan_vieclam;
        $tb_binhluan = $kt_binhluan_vieclam->tb_binhluan($idvieclam);
        $tendonvi = $request->tendonvi;
        if (empty($chitietvieclam)) {
            return view('errors.404');
        }
    	return view('pages.chitietvieclam',
            ['active'=>'tuyendung',
            'tb_vieclam'=>$chitietvieclam,
            'tb_vieclam_tacgia'=>$tb_vieclam_tacgia,
            'tb_binhluan'=>$tb_binhluan,
            'tendonvi'=>$tendonvi,
            'dadangky'=>$dadangky]);
    }
    public function timviec(Request $request){
        $active = 'tuyendung';
        $kt_vieclam = new kt_vieclam;
        $tb_timviec = $kt_vieclam->dstimviec($request->tinh,$request->idloaiviec);
        $oc_nguoidung = new oc_nguoidung;
        $tb_oc_nguoidung = $oc_nguoidung->all();
        return view('pages.tuyendung.timviec',[
                   'active'=>'tuyendung',
                   'tb_timviec'=>$tb_timviec,
                    'tb_oc_nguoidung'=>$tb_oc_nguoidung]);
    }
}
