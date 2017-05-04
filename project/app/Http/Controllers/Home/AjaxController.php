<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AjaxController extends Controller
{
	public function index()
    {
        
    	return view('Home.person.address');
    }

    public function doget(Request $request)
    {
    	
    	$list = DB::table('district')->where('upid',$request->input('upid'))->get();
    	echo json_encode($list);
    }

    public function dopost(Request $request)
    {
    	$list = DB::table('district')->where('upid',$request->input('upid'))->get();
    	echo json_encode($list);
    }
}
