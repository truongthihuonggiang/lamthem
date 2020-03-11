<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class kt_nguoidung_timviec extends Model
{
    protected $table = "kt_nguoidung_timviec";
    public $timestamps = false;
    public function get_dsungvien($tinh,$limit){
    	$list = array();
    	if (empty($tinh)) {
    		$tb = DB::select("select g.* from (select d.ten, d.ngaysinh, b.*, e.url from  (select * from kt_nguoidung_timviec) as b  left join oc_nguoidung d on b.idnguoidung = d.idnguoidung left join oc_hinhanh e on b.idhinhanh = e.idhinh) as g inner join oc_vi as h on g.idnguoidung = h.idsohuu order by h.sotien desc limit 0,$limit ");
    	}
    	else{
    		$tb = DB::select("select g.* from (select d.ten, d.ngaysinh, b.*, e.url from  (select * from kt_nguoidung_timviec where tinh ='$tinh' as b  left join oc_nguoidung d on b.idnguoidung = d.idnguoidung left join oc_hinhanh e on b.idhinhanh = e.idhinh limit 0,$limit ) as g inner join oc_vi as h on g.idnguoidung = h.idsohuu order by h.sotien desc");
    	}
    	
    	$i=0;
    	foreach ($tb as $row) {
    		$idnguoidung = $row->idnguoidung;
    		$list[] = $row;
    		$list[$i]->soviecxong = 0;
    		$query1 =  DB::select("select count(a.idvieclam) as soviecxong from kt_dangkyviec a, kt_vieclam b where a.idnguoidung = '$idnguoidung' and  a.idvieclam = b.idvieclam and b.congkhai > 2");
    		foreach ($query1 as $row1) {
    			$list[$i]->soviecxong = $row1->soviecxong;
    		}
    		$i++;
    	}
		
			// $query =  "select g.* from ( select * from ( select idnguoidung from kt_nguoidung_timviec_loaiviec where idloai = '$iddanhmuc') as a left join ( select d.ten, d.ngaysinh, b.*, e.url from  (select * from kt_nguoidung_timviec where tinh ='$tinh' or (v0 - $v0 + v1 - $v1) < $ss ) as b  left join oc_nguoidung d on b.idnguoidung = d.idnguoidung left join oc_hinhanh e on b.idhinhanh = e.idhinh) as f on a.idnguoidung = f.idnguoidung limit 0,100) as g inner join oc_vi as h on g.idnguoidung = h.idsohuu order by h.sotien desc ";
		return $list;
    }
    public function get_chitietungvien($idtimviec){
        $list = array();
        $tb  = DB::select("select a.*, b.ten, b.ngaysinh, b.dienthoai , b.gioitinh,e.url from (select * from kt_nguoidung_timviec where idnguoidung ='$idtimviec') as a left join oc_nguoidung b on a.idnguoidung = b.idnguoidung left join oc_hinhanh e on a.idhinhanh = e.idhinh");
        $i=0;
        foreach ($tb as $row) {
            $list[$i] = $row;
            $list[$i]->soviecxong = 0;
            $soviecxong =  DB::select("select count(a.idvieclam) as soviecxong from kt_dangkyviec a, kt_vieclam b where a.idnguoidung = '$idtimviec' and  a.idvieclam = b.idvieclam and b.congkhai > 2");
            foreach ($soviecxong as $row1) {
                $list[$i]->soviecxong = $row1->soviecxong;
            }
            //////////tim viec hai long /////////////////
            $list[$i]->soviechailong=0;
            $soviechailong =  DB::select("select count(a.idvieclam) as soviechailong from kt_danhgia_vieclam_tuyendung a  where a.iddanhgia = '$idtimviec' and loai = 1 and hailong = 1");
            foreach ($soviechailong as $row1) {
                $list[$i]->soviechailong=$row1->soviechailong;
            }
            ////////////tim viec bi tocao///////////////
            $list[$i]->soviectocao=0;
            $soviectocao =  DB::select("select count(a.idvieclam) as soviectocao from kt_danhgia_vieclam_tuyendung a  where a.iddanhgia = '$idtimviec' and loai = 1 and hailong = 2");
            foreach ($soviectocao as $row1) {
                $list[$i]->soviectocao=$row1->soviectocao;
            }
            //////lay diem hien thi/////////////////
            $list[$i]->diem =0;
            $diem = DB::select("select sotien as diem from oc_vi where idvi = '$idtimviec'");
            foreach ($diem as $row1) {
                $list[$i]->diem=$row1->diem;
            }
            $i++;
        }
        return $list;
    }
}
