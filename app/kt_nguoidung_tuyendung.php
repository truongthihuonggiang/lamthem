<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kt_nguoidung_tuyendung extends Model
{
    protected $table = 'kt_nguoidung_tuyendung';
    public $timestamps = false;
    public function get_nguoidung_tuyendung(){
    	$tb = $this->paginate(6);
    	return $tb;
    }
}
