<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    //
    public function index()
    {
    	    	$list_friends = DB::table('flinks')->get();

    	$list_config = DB::table('config')->where('display', '1')->get()->first();
    	return view('Admin.index',['list_friends'=>$list_friends,'list_config'=>$list_config]);
    }
}
