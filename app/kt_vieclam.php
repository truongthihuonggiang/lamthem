<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class kt_vieclam extends Model
{
    protected $table = 'kt_vieclam';
    public $timestamps = false;
    function get_kt_vieclam(){
    	$tb_vieclam = $this->orderBy('ngaydang','DESC')->paginate(10);
    	return $tb_vieclam;
    }
    function chitietvieclam($idvieclam){
        $result = array();
    	$row_id = $this->all();
        foreach ($row_id as $row) {
            if (md5($row->idvieclam)==$idvieclam) {
                $result[] = $row;
            }
        }
    	return $result;
    }
    function chitietvieclam_tacgia($idvieclam){
        $result = array();
        $tb_vieclam = $this->chitietvieclam($idvieclam);
        if (count($tb_vieclam)>0) {
        foreach ($tb_vieclam as $row) {
            $idtacgia = $row['idtacgia'];
        }
        $tb_tacgia = $this->where('idtacgia','=',$idtacgia)->orderBy('ngaydang','DESC')->get();
        foreach ($tb_tacgia as $row) {
           if (md5($row->idvieclam)!=$idvieclam) {
              $result[] = $row;
           }
        }
        }
        return $result;
    }
    function get_tinh(){
        $tb = $this->select("tinh")->groupBy('tinh')->get();
        return $tb;
    }
    function timviec($tinh,$idloaiviec){
        if ($tinh=='all'&&$idloaiviec=='all') {
            $tb = $this->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
            return $tb;
        }
        elseif ($tinh=='all'&&$idloaiviec!='all') {
            $tb = $this->where('idloaiviec',$idloaiviec)->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
            return $tb;
        }
        elseif ($tinh!='all'&&$idloaiviec=='all') {
            $tb = $this->where('tinh',$tinh)->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
            return $tb;
        }
        else{
            $tb = $this->where(['tinh'=>$tinh,'idloaiviec'=>$idloaiviec])->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
            return $tb;
        }
        
    }
    function vieclamthem(){
        $tb = $this->where('idloaiviec','9')->orderBy('ngaydang','DESC')->paginate(3);
        return $tb;
    }
    function get_dsvieclam($tinh,$idloai,$v0,$v1,$ss,$start,$limit){
        $tb = DB::select("select c.*, d.url from (select a.* , b.tendonvi from kt_vieclam a left join kt_nguoidung_tuyendung b on a.idtacgia = b.idnguoidung where a.congkhai > 0 and (a.tinh ='$tinh' or (a.v0 - $v0 + a.v1 - $v1) < $ss or 1 = 1)) as c left join oc_hinhanh d on c.idhinhanh = d.idhinh order by c.idvieclam desc limit $start, $limit ");
        return $tb;
    }
}
