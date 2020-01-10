<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    public function index($page){
    	return view('pages.'.$page,['page'=>$page]);
    }
}
