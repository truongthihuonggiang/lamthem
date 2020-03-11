<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class oc_nguoidung extends Model
{
    protected $table = 'oc_nguoidung';
    public $timestamps = false;
    function nguoidung_dangnhap($taikhoan,$matkhau){
    	$matkhau = md5($matkhau . "!@1a3B");
    	$nguoidung = $this->where('email','=',"$taikhoan")->where('matkhau','=',"$matkhau")->get(); //
    	if (count($nguoidung)>0) {
    		return true;
    	}
    	return false;
    }
    function kiemtra_email($email){
        $tb = $this->where('email','=',$email)->get();
        if (count($tb)>0) {
            return false;
        }
        return true;
    }
    function save_nguoidung($idnguoidung,$email,$matkhau,$ten,$ngaysinh,$dienthoai,$gioitinh,$ngaydangky,$kichhoat,$loai,$guimail,$idclan,$v0,$v1){
        return $this->insert(['idnguoidung'=>$idnguoidung,
                    'email' => $email,
                    'matkhau'=>$matkhau,
                    'ten'=>$ten,
                    'ngaysinh'=>$ngaysinh,
                    'dienthoai'=>$dienthoai,
                    'gioitinh'=>$gioitinh,
                    'ngaydangky'=>$ngaydangky,
                    'kichhoat'=>$kichhoat,
                    'loai'=>$loai,
                    'guimail'=>$guimail,
                    'idclan'=>$idclan,
                    'v0'=>$v0,
                    'v1'=>$v1]);
    }
    function get_idnguoidung($email,$matkhau){
        $matkhau = md5($matkhau . "!@1a3B");
        $tb = $this->where('email','=',"$email")->where('matkhau','=',"$matkhau")->get();
        return $tb;
    }
    function get_ten_idnguoidung($idnguoidung)
    {
        $ten = "";
        $tb = $this->select('ten')->where('idnguoidung','=','$idnguoidung')->get();
        foreach ($tb as $row) {
            $ten = $row->ten;
        }
        return $ten;
    }
    function create_id(){
        $tb = $this->select(DB::raw('MAX(idnguoidung) as MAX_ID'))->get();
        return $tb;
    }
}
