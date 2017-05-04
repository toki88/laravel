<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        $id = session('users')->uid;
        $data = DB::table('book_lists')
                    ->select()
                    ->where([
                        ['state',4],
                        ['uid',$id],
                        ])
                    ->get()->all();
        $message = DB::table('book_lists')
                        ->select()
                        ->where([
                        ['state',5],
                        ['uid',$id],
                        ])
                        ->get()->all();
                return view('Home.person.change',['message'=>$message,'data'=>$data,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function record($id)
    {
        $list_friends = DB::table('flinks')->get();

        $list_config = DB::table('config')->where('display', '1')->get()->first();
        // dd(33333333);
        $data = DB::table('book_lists')->where('lid',$id)->select()->get()->first();
        // $check = $data->check;
        // $a = explode(';',$check);
        // array_pop($a);
        
        // dd($a);
        return view('Home.person.record',['data'=>$data,'list_friends'=>$list_friends,'list_config'=>$list_config]);
    }

}
