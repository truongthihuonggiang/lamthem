<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kt_vieclam;
use App\kt_loaicongviec;
use App\oc_nguoidung;
use App\kt_nav;
use App\kt_binhluan_vieclam;
use App\kt_nguoidung_tuyendung;
use View;
use Illuminate\Support\Facades\DB;


class Mycontroller extends Controller
{
    public function test(){
        $kt_nguoidung_tuyendung =  new kt_vieclam;
        $tb = $kt_nguoidung_tuyendung->chitietvieclam(7142);
        //var_dump($tb);
               foreach ($tb as $row) {
                   echo $row->tendonvi;
               }
         //echo $id;
    }
}
