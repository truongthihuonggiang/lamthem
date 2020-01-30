<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class kt_vieclam extends Model
{
    protected $table = 'kt_vieclam';
    public $timestamps = false;
    function get_kt_vieclam(){
    	$tb_vieclam = DB::select('select * from kt_vieclam order by ngaydang DESC limit 10');
    	return $tb_vieclam;
    }
    function get_id_vieclam($idvieclam){
    	$row_id = $this->where('idvieclam',$idvieclam)->get();
    	var_dump( $row_id);
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
}
