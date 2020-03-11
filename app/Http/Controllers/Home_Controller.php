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

class Home_Controller extends Controller
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
    public function index(Request $request){
        $index ='index';
        $kt_nguoidung_tuyendung =  new kt_nguoidung_tuyendung;
        $top3_tuyendung = $kt_nguoidung_tuyendung->top3_tuyendung();
        
        $kt_vieclam = new kt_vieclam;
        $dsvieclam = $kt_vieclam->get_dsvieclam();
        if ($request->ajax()) {
            return redirect()->route('test');
        }
        return view('layouts.content',compact('index','dsvieclam','top3_tuyendung'));
    }
    public function index_pagination(Request $request){
        $kt_vieclam = new kt_vieclam;
        $dsvieclam = $kt_vieclam->get_dsvieclam();
        if ($request->ajax()) {
            return view('layouts.dsvieclam_pagination',compact('dsvieclam'))->render();
        }
        else{
        	return view('errors.404');
        }
    }
}
