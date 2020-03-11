<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class kt_binhluan_vieclam extends Model
{
    protected $table = 'kt_binhluan_vieclam';
    public $timestamps = false;
    function tb_binhluan($idvieclam)
    {
        $tb = DB::select("select a.* , b.ten from kt_binhluan_vieclam a left join oc_nguoidung b on a.idnguoidung = b.idnguoidung where a.congkhai = 1 and idvieclam = '$idvieclam'");
    	return $tb;
    }
}
