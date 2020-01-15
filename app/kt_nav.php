<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class kt_nav extends Model
{
	protected $table = 'kt_nav';
	public $timestamps = false;
   	function get_nav(){
   		$a =array();
   		$nav = $this->get();
   		foreach ($nav as $row) {
   			$a[] = $row;
   		}
   		
   		return $a;
   	}

}

