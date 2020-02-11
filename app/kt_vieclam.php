<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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
            $tb = $this->orderBy('ngaydang','DESC')->get();
            return $tb;
        }
        elseif ($tinh=='all'&&$idloaiviec!='all') {
            $tb = $this->where('idloaiviec',$idloaiviec)->orderBy('ngaydang','DESC')->get();
            return $tb;
        }
        elseif ($tinh!='all'&&$idloaiviec=='all') {
            $tb = $this->where('tinh',$tinh)->orderBy('ngaydang','DESC')->get();
            return $tb;
        }
        else{
            $tb = $this->where(['tinh'=>$tinh,'idloaiviec'=>$idloaiviec])->orderBy('ngaydang','DESC')->get();
            return $tb;
        }
        
    }
    function vieclamthem(){
        $tb = $this->where('idloaiviec','9')->orderBy('ngaydang','DESC')->paginate(3);
        return $tb;
    }
}
