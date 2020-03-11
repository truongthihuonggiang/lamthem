<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class kt_danhgia_vieclam_tuyendung extends Model
{
    protected $table = 'kt_danhgia_vieclam_tuyendung'
    public $timestamps = false;
    public function get_dsbinhluan_idtimviec($idtimviec){
		$binhluan =  DB::select("select a.idnguoidung, a.nhanxet,a.ngaydang, b.tendonvi from kt_danhgia_vieclam_tuyendung a left join kt_nguoidung_tuyendung b on a.idnguoidung = b.idnguoidung where a.iddanhgia = '$idtimviec' and loai = 1 ");
		return $binhluan;
    }
    public function get_dsbinhluan_tuyendung($idtuyendung){
    	///////lay danh sach binh luan	
		$binhluan =  DB::select("select a.idnguoidung, a.nhanxet,a.ngaydang, b.ten from kt_danhgia_vieclam_tuyendung a left join oc_nguoidung b on a.idnguoidung = b.idnguoidung where a.iddanhgia = '$idtuyendung' and a.loai = 2 ");
		return $binhluan;
	}
}
    
