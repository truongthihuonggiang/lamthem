<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kt_vieclam;
use App\kt_loaicongviec;
use App\oc_nguoidung;
use App\kt_nav;
use App\kt_binhluan_vieclam;
use App\kt_nguoidung_tuyendung;
use View;
use Illuminate\Support\Facades\DB;


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
    function view_share(){
        $kt_nav = new kt_nav;
        $nav = $kt_nav->get_nav();
        $kt_vieclam = new kt_vieclam;
        $tb_tinh = $kt_vieclam->get_tinh();
        $kt_loaicongviec = new kt_loaicongviec;
        $tb_loaicongviec = $kt_loaicongviec->all();
        return View::share([
            'nav'=>$nav,
            'tb_tinh'=>$tb_tinh,
            'tb_loaicongviec'=>$tb_loaicongviec]);
    }
    public function index(){
        $index ='index';
        $oc_nguoidung = new oc_nguoidung;
        $tb_oc_nguoidung = $oc_nguoidung->all();
        $kt_vieclam = new kt_vieclam;
        $tb_vieclam = $kt_vieclam->get_kt_vieclam();
        $tb_vieclamthem = $kt_vieclam->vieclamthem();        
        return view('layouts.content',compact('index','tb_vieclam','tb_oc_nguoidung','tb_vieclamthem'));
    }
    public function tuyendung(){
        $page = 'tuyendung';
        $oc_nguoidung = new oc_nguoidung;
        $tb_oc_nguoidung = $oc_nguoidung->all();
        $kt_nguoidung_tuyendung = new kt_nguoidung_tuyendung;
        $tb_nguoidung_tuyendung = $kt_nguoidung_tuyendung->get_nguoidung_tuyendung(); 
        return view('pages.tuyendung',compact('page','tb_oc_nguoidung','tb_nguoidung_tuyendung'));
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
    		return redirect()->back()->with('er_user','SAi ten dang nhap');
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
        if (empty($tb_vieclam)) {
            return view('errors.404');
        }
    	return view('pages.chitietvieclam',
            ['page'=>'tuyendung',
            'tb_vieclam'=>$tb_vieclam,
            'tb_oc_nguoidung'=>$tb_oc_nguoidung,
            'tb_vieclam_tacgia'=>$tb_vieclam_tacgia,
            'tb_binhluan'=>$tb_binhluan]);

    }
    public function timviec(Request $request){
        $page = 'tuyendung';
        $kt_vieclam = new kt_vieclam;
        $tb_timviec = $kt_vieclam->timviec($request->tinh,$request->idloaiviec);
        $oc_nguoidung = new oc_nguoidung;
        $tb_oc_nguoidung = $oc_nguoidung->all();
        return view('pages.tuyendung.timviec',[
                   'page'=>'tuyendung',
                   'tb_timviec'=>$tb_timviec,
                    'tb_oc_nguoidung'=>$tb_oc_nguoidung]);
    }
    // public function timviec(Request $rq){
    //     echo $rq->tinh;
    // }
    public function canhan(){
        return view("pages.canhan.canhan");
    }
    public function dangky(){
        return view('form.dangky');
    }

    public function test(){
        
        return redirect('index')->with('error_user','sai ten dang nhap');
    }
}
