<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class oc_nguoidung extends Model
{
    protected $table = 'oc_nguoidung';
    public $timestamps = false;
    function nguoidung_dangnhap($taikhoan,$matkhau){
    	// $matkhau = md5($matkhau . "!@1a3B");
    	$nguoidung = $this->where([['email','=',"$taikhoan"],['matkhau','=',"$matkhau"]])->get(); //
    	if (!empty($nguoidung)) {
    		return true;
    	}
    	return false;
    }
}
