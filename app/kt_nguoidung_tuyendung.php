<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class kt_nguoidung_tuyendung extends Model
{
    protected $table = 'kt_nguoidung_tuyendung';
    public $timestamps = false;
    public function get_nguoidung_tuyendung(){
    	$tb = $this->join('oc_vi','kt_nguoidung_tuyendung.idnguoidung','oc_vi.idsohuu')->orderBy('oc_vi.sotien','DESC')->paginate(10);
    	return $tb;
    }
    
    function dstuyendung(){
    	// select * from kt_nguoidung_tuyendung a inner join oc_vi b on a.idnguoidung = b.idsohuu order by b.sotien desc 
    	$tb = $this->join('oc_vi','kt_nguoidung_tuyendung.idnguoidung','oc_vi.idsohuu')->orderBy('oc_vi.sotien','DESC')->paginate(10);
    	return $tb;
    }
    public function top3_tuyendung(){
        $tb = $this->join('oc_vi','kt_nguoidung_tuyendung.idnguoidung','oc_vi.idsohuu')->orderBy('oc_vi.sotien','DESC')->limit(3)->get();
        return $tb;
    }
    public function get_chitiettuyendung($idtuyendung){
        $list = array();
        $chitiettuyendung  = DB::select(" select * from kt_nguoidung_tuyendung where idnguoidung = '$idtuyendung' ");
        $i=0;
        foreach ($chitiettuyendung as $row) {
            $list[$i] = $row;
            $soviecxong =  DB::select("select count(b.idvieclam) as soviecxong from kt_vieclam b where b.idtacgia = '$idtuyendung' and b.congkhai > 2");
            $list[$i]->soviecxong = 0;
            foreach ($soviecxong as $row1) {
                $list[$i]->soviecxong = $row1->soviecxong;
            }
            //////////tim viec hai long /////////////////
            $list[$i]->soviechailong = 0;
            $soviechailong =  DB::select("select count(a.idvieclam) as soviechailong from kt_danhgia_vieclam_tuyendung a  where a.iddanhgia = '$idtuyendung' and a.loai = 2 and hailong = 1");
            foreach ($soviechailong as $row1) {
                $list[$i]->soviechailong = $row1->soviechailong;
            }
            ////////////tim viec bi tocao///////////////
            $list[$i]->soviectocao = 0;
            $soviectocao =  DB::select("select count(a.idvieclam) as soviectocao from kt_danhgia_vieclam_tuyendung a  where a.iddanhgia = '$idtuyendung' and a.loai = 2 and hailong = 2");
            foreach ($soviectocao as $row1) {
                $list[$i]->soviectocao = $row1->soviectocao;
            }
            ////////////songuoitheogioi///////////////
            $list[$i]->sotheogioi = 0;
            $sotheogioi =  DB::select("select count(idnguoidung) as sotheogioi from kt_nguoidung_theogioi  where idtheogioi = '$idtuyendung' and giatri = '1'");
            foreach ($sotheogioi as $row1) {
                $list[$i]->sotheogioi = $row1->sotheogioi;
            }
            /////////tim theo gioi viec/////////////
            $list[$i]->theogioi = 0;
            $theogioi =  DB::select("select giatri from kt_nguoidung_theogioi where idtheogioi = '$idtuyendung' and idnguoidung = '$idnguoidung'");
            foreach ($theogioi as $row1) {
                $list[$i]->theogioi = $row1->giatri;
            }
            //////lay diem hien thi/////////////////
            $list[$i]->diem = 0;
            $diem = DB::select("select sotien as diem from oc_vi where idvi = '$idtuyendung'");
            foreach ($theogioi as $row1) {
                $list[$i]->diem = $row1->sotien;
            }
        }
    }
}
