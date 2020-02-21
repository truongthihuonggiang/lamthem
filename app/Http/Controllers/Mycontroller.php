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
    public function index(){
        $index ='index';
        $oc_nguoidung = new oc_nguoidung;
        $tb_oc_nguoidung = $oc_nguoidung->all();
        $kt_vieclam = new kt_vieclam;
        $tb_vieclam = $kt_vieclam->get_kt_vieclam();
        $tb_vieclamthem = $kt_vieclam->vieclamthem();
        //get ds viec lam
        $limit = 5 ;
        $ss = 0.2;
        $page  = urldecode( (isset($_POST['page'])?$_POST['page']:0 ) ); 
        $idloai = urldecode( (isset($_POST['idloai'])?$_POST['idloai']:0 ) ); 
        $v0 = urldecode( (isset($_POST['v0'])?$_POST['v0']:0 ) ); 
        $v1 = urldecode( (isset($_POST['v1'])?$_POST['v1']:0 ) ); 
        $tinh   = urldecode( (isset($_POST['tinh'])?$_POST['tinh']:0 ) ); 
        $dienthoai  = urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:0 ) ); 
        $token  = urldecode( (isset($_POST['token'])?$_POST['token']:0 ) );     
        if (session('prev')) {
            if ($page>0) {
                $page = $page - 1;
            }
        }
        if (session('next')) {
            $page = $page + 1;
        }
        $start = $page * $limit;
        $end = $start + $limit;

        $kt_vieclam = new kt_vieclam;
        $dsvieclam = $kt_vieclam->get_dsvieclam($tinh,$idloai,$v0,$v1,$ss,$start,$limit);
        
        
        return view('layouts.content',compact('index','tb_vieclam','tb_oc_nguoidung','tb_vieclamthem','dsvieclam'));
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
    	$tb_oc_nguoidung = $oc_nguoidung->nguoidung_dangnhap($request->email_user,$request->pass_user);
        var_dump($tb_oc_nguoidung);
    	// if ($kt==1) {
    	// 	var_dump(expression)
    	// }
    	// else{
    	// 	return redirect()->back()->with('er_user','SAi ten dang nhap');
    	// }
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
        $page ="canhan";
        return view("pages.canhan.canhan",compact('page'));
    }
    public function dangky(){
        return view('form.dangky');
    }
    public function dsvieclam(Request $request){
       if (isset($request->Previous)) {
           return redirect()->back()->with('prev',1);
       }
        if (isset($request->Next)) {
            return redirect()->back()->with('next',1);
        }
    }


    public function test($page){
        echo "test";
        $limit = 5 ;
        $ss = 0.2;
        $page  = urldecode( (isset($_POST['page'])?$_POST['page']:0 ) ); 
        $idloai = urldecode( (isset($_POST['idloai'])?$_POST['idloai']:0 ) ); 
        $v0 = urldecode( (isset($_POST['v0'])?$_POST['v0']:0 ) ); 
        $v1 = urldecode( (isset($_POST['v1'])?$_POST['v1']:0 ) ); 
        $tinh   = urldecode( (isset($_POST['tinh'])?$_POST['tinh']:0 ) ); 
        $dienthoai  = urldecode( (isset($_POST['dienthoai'])?$_POST['dienthoai']:0 ) ); 
        $token  = urldecode( (isset($_POST['token'])?$_POST['token']:0 ) );     
        $start = $page * $limit;
        $end = $start + $limit;
        $kt_vieclam = new kt_vieclam;
        $dsvieclam = $kt_vieclam->get_dsvieclam($tinh,$idloai,$v0,$v1,$ss,$start,$limit);
        var_dump($dsvieclam);
        //return redirect('index')->with('error_user','sai ten dang nhap');
    }
}
