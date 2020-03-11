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

class Canhan_Controller extends Controller
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
    public function canhan(){
        session_start();
        if (isset($_SESSION['login'])) {
            $active ="canhan";
            $kt_nguoidung_timviec = new kt_nguoidung_timviec;
            $chitiettimviec = $kt_nguoidung_timviec->get_chitietungvien($_SESSION['idnguoidung']);
            return view("pages.canhan.tabscanhan",compact('active','chitiettimviec'));
        }
        return redirect()->route('dangnhap');
        
    }
    public function dangnhap(){
        session_start();
        if (isset($_SESSION['login'])) {
            return redirect()->route('index');
        }
        return view('pages.canhan.dangnhap');
    }
    public function dangky(){
        session_start();
        if (isset($_SESSION['login'])) {
            return redirect()->route('index');
        }
        return view('form.dangky');
    }
    public function kiemtradangnhap(Request $request){
        session_start();
        if (isset($_SESSION['login'])) {
            return redirect()->route('index');
        }
        $kiemtra_dangnhap =  new oc_nguoidung;
        $email = $request->email;
        $matkhau = $request->matkhau;
        if ($kiemtra_dangnhap->nguoidung_dangnhap($email,$matkhau)) {
            
            $_SESSION['login']=true;
            $tb_ten = $kiemtra_dangnhap->get_idnguoidung($email,$matkhau);
            foreach ($tb_ten as $row) {
                $ten = $row->ten;
                $_SESSION['idnguoidung']=$row->idnguoidung;
            }
            $_SESSION['ten'] = isset($ten) ? $ten : "";
            return redirect()->route('canhan');
        }
        else{
            return redirect()->back()->with('error','Sai Email hoặc mật khẩu');
        }
        
    }
    public function dangxuat(){
        session_start();
        session_unset();
        session_destroy();
        return redirect()->route('index');
    }
    function themtintuyendung()
    {
        session_start();
        if (isset($_SESSION['login'])) {
            $active = 'canhan';
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $ngaydang =  date("Y-m-d h:i:s");
            return view('pages.canhan.themtintuyendung',compact('active','ngaydang'));
        }
        return redirect()->route('index');
    }
    public function hosotimviec(){
        $active = 'canhan';
        session_start();
        if (isset($_SESSION['login'])) {
            return View('pages.canhan.hosotimviec',compact('active'));
        }
        return redirect()->route('index');
    }
    public function dangky_nguoidung(Request $request){
        $oc_nguoidung = new oc_nguoidung;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $create_id = $oc_nguoidung->create_id();
        foreach ($create_id as $row) {
            $idnguoidung = $row->MAX_ID + 1;
        }
        $ngaydangky =  date("Y-m-d");
        $email = isset($request->email) ? $request->email : "";
        $matkhau = isset($request->matkhau) ? $request->matkhau : "";
        $ten = isset($request->ten) ? $request->ten : "";
        $ngaysinh = isset($request->ngaysinh) ? $request->ngaysinh : "";
        $dienthoai = isset($request->dienthoai) ? $request->dienthoai : "";
        $gioitinh = isset($request->gioitinh) ? $request->gioitinh : 0;
        $matkhau = md5($matkhau . "!@1a3B");
        $kichhoat = 1;
        $loai = 0;
        $guimail = 0;
        $idclan =0;
        $v0 = 0;
        $v1 = 0;
        $kiemtra_email = $oc_nguoidung->kiemtra_email($email);
        if (!$kiemtra_email) {
            return redirect()->back()->with('error','Email đã tồn tại');
        }
        else{
            $oc_nguoidung->save_nguoidung($idnguoidung,$email,$matkhau,$ten,$ngaysinh,$dienthoai,$gioitinh,$ngaydangky,$kichhoat,$loai,$guimail,$idclan,$v0,$v1);
            session_start();
            $_SESSION['login']=true;
            $_SESSION['ten']=$ten;
            $_SESSION['idnguoidung']=$idnguoidung;
            return redirect()->route('canhan');
        }
    }
    public function save_dangtintuyendung(Request $request){
        $date = date_create($request->thoigianbatdau,timezone_open("Asia/Ho_Chi_Minh"));
        echo date_format($date,"H:i Y-m-d");
        echo $request->tieude;
    }
}
