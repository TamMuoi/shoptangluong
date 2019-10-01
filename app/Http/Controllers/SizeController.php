<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    //
    public function index(){

        $data['sizes'] = DB::table('size')->get();

        return view('admincp.size.list', $data);
    }
    public function store(Request $request){
        $input = $request->all();
        DB::table('size')->insert([
           'name' =>  $input['name']
        ]);
        return redirect()->back()->with('thongbao', 'tạo mới size thành công');
    }
    public function update(Request $request, $id){
        $input = $request->all();
        DB::table('size')->where('id', $id)->update([
            'name' =>  $input['name']
        ]);
        return redirect()->back()->with('thongbao', 'Sửa size thành công');
    }
    public function destroy($id){
        DB::table('size')->where('id', $id)->delete();
        return redirect()->back()->with('thonbao', 'xóa size thành công');
    }
    public function setactive($id, $value){
        DB::table('size')->where('id', $id)->update([
            'status' =>  $value
        ]);
        return redirect()->back();
    }

}
