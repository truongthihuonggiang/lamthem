<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\paginator;
use Illuminate\LengthAwarePaginator;
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
        $tb = DB::select("select c.*, d.url from (select a.* , b.tendonvi from (select * from kt_vieclam where idvieclam = '$idvieclam'  ) as a left join kt_nguoidung_tuyendung b on a.idtacgia = b.idnguoidung ) as c left join oc_hinhanh d on c.idhinhanh = d.idhinh");
    	return $tb;
    }
    function chitietvieclam_tacgia($idnguoidung,$idvieclam){
        $idtacgia = !empty($idnguoidung) ? $idnguoidung : "";
        $tb_tacgia = $this->where('idtacgia','=',$idtacgia)->where('idvieclam','<>',$idvieclam)->orderBy('ngaydang','DESC')->paginate(10);
        return $tb_tacgia;
    }
    function get_tinh(){
        $tb = $this->select("tinh")->groupBy('tinh')->get();
        return $tb;
    }
    function timviec($tinh,$idloaiviec){
        if ($tinh=='all'&&$idloaiviec=='all') {
            $tb = $this->where('congkhai','>',0)->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
        }
        elseif ($tinh=='all'&&$idloaiviec!='all') {
            $tb = $this->where('idloaiviec',$idloaiviec)->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
        }
        elseif ($tinh!='all'&&$idloaiviec=='all') {
            $tb = $this->where('tinh',$tinh)->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);        }
        else{
            $tb = $this->where(['tinh'=>$tinh,'idloaiviec'=>$idloaiviec])->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
        }
        return $tb;
    }
    function dstimviec($tinh,$idloaiviec){
        if(empty($tinh)&&empty($idloaiviec))
        {
            $tb = $this->where('congkhai','>',0)->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
        }
        else{
            $tb = $this->where('congkhai','>','0')->where('idloaiviec',$idloaiviec)->where('tinh',$tinh)->orderBy('ngaydang','DESC')->paginate(10)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
            if (empty($tinh)) {
                $tb = $this->where('idloaiviec',$idloaiviec)->where('congkhai','>',0)->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
            }
            if (empty($idloaiviec)) {
                 $tb = $this->where('tinh',$tinh)->where('congkhai','>',0)->orderBy('ngaydang','DESC')->paginate(6)->setPath('timviec?tinh='.$tinh.'&idloaiviec='.$idloaiviec);
            }
        }
        
        return $tb;
    }
    function vieclamthem(){
        $tb = $this->where('idloaiviec','9')->orderBy('ngaydang','DESC')->paginate(3);
        return $tb;
    }
    function get_dsvieclam(){
        $list = array();
         $tb = DB::table(function($query){
            $query->select('kt_vieclam.*','kt_nguoidung_tuyendung.tendonvi')->from('kt_vieclam')->leftJoin('kt_nguoidung_tuyendung','kt_vieclam.idtacgia','=','kt_nguoidung_tuyendung.idnguoidung')->where('congkhai','>','0');
        },'c')->select('c.*','oc_hinhanh.url')->leftJoin('oc_hinhanh','oc_hinhanh.idhinh','=','c.idhinhanh')->orderBy('c.idvieclam','DESC')->paginate(8);
         $i=0;
        foreach ($tb as $row){
                                    $id = $row->idvieclam;
                                    $idtacgia = $row->idtacgia;
                                    $tb[$i]=$row;
                                    $query1 = DB::select("select count(*) as chuaduyet from kt_dangkyviec where idvieclam = '$id' and duyet = 0");
                                    $chuaduyet = 0;
                                    foreach ($query1 as $row1) {
                                             $chuaduyet = $row1->chuaduyet;
                                    }
                                    $tb[$i]->chuaduyet = $chuaduyet;
                                    $query1 = DB::select("select count(*) as dadangky from kt_dangkyviec where idvieclam = '$id' and duyet = 1");
                                    $dadangky = 0;
                                    foreach ($query1 as $row1) {
                                            $dadangky = $row1->dadangky;
                                    }
                                    $tb[$i]->dadangky = $dadangky;
                                    if (empty($row->tendonvi)) {
                                        $tendonvi = "";
                                        $query1 = DB::select("select ten from oc_nguoidung where idnguoidung = '$idtacgia' and kichhoat = 1");
                                        foreach ($query1 as $row1) {
                                            $tendonvi = $row1->ten;
                                            }
                                        $tb[$i]->tendonvi = $tendonvi;
                                    }
                                    
                                    $i++;
            }
            return $tb;
    }
    function soviecxong(){
        $tb = $this->select(DB::raw('count(idtacgia) as soviecxong'),'idtacgia')->where('congkhai','>','2')->groupBy('idtacgia')->get();
        return $tb;
    }
    function soviecchuaxong(){
        $tb = $this->select(DB::raw('count(idtacgia) as soviecchuaxong'),'idtacgia')->where('congkhai','=','1')->groupBy('idtacgia')->get();
        return $tb;
    }
    function test(){
        $list = array();

        $query1 = DB::select("select count(idvieclam) as tong from kt_vieclam where congkhai > 0 ");
            foreach ($query1 as $row1) {
                foreach ($row1 as $row2) {
                    $tong = $row2['tong'];
                }
            }
        $tb = DB::table(function($query){
            $query->select('kt_vieclam.*','kt_nguoidung_tuyendung.tendonvi')->from('kt_vieclam')->leftJoin('kt_nguoidung_tuyendung','kt_vieclam.idtacgia','=','kt_nguoidung_tuyendung.idnguoidung')->where('congkhai','>','0');
        },'c')->select('c.*','oc_hinhanh.url')->leftJoin('oc_hinhanh','oc_hinhanh.idhinh','=','c.idhinhanh')->orderBy('c.idvieclam','DESC')->paginate(6);
        $i=0;
        foreach ($tb as $row){
                                    $id = $row->idvieclam;
                                    $list[$i]=$row;
                                    $query1 = DB::select("select count(*) as chuaduyet from kt_dangkyviec where idvieclam = '$id' and duyet = 0");
                                    $chuaduyet = 0;
                                    foreach ($query1 as $row1) {
                                             $chuaduyet = $row1->chuaduyet;
                                    }
                                    $list[$i]->chuaduyet = $chuaduyet;
                                    $query1 = DB::select("select count(*) as dadangky from kt_dangkyviec where idvieclam = '$id' and duyet = 1");
                                    $dadangky = 0;
                                    foreach ($query1 as $row1) {
                                            $dadangky = $row1->dadangky;
                                    }
                                     $list[$i]->dadangky = $dadangky;
                                    $i++;
            }
            return $list;
    }
}

