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
}
