<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kt_binhluan_vieclam extends Model
{
    protected $table = 'kt_binhluan_vieclam';
    public $timestamps = false;
    function tb_binhluan($idvieclam)
    {
    	$result = array();
    	$tb = $this->get();
    	foreach ($tb as $row) {
    		if (md5($row['idvieclam'])==$idvieclam) {
    			$result[] = $row;
    		}
    	}
    	return $result;
    }
}
