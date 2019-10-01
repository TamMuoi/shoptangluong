<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    //
    public function index(){

        $data['colors'] = DB::table('color')->get();

        return view('admincp.color.list', $data);
    }
    public function store(Request $request){
        $input = $request->all();
        DB::table('color')->insert([
            'name' =>  $input['name']
        ]);
        return redirect()->back()->with('thongbao', 'tạo mới màu thành công');
    }
    public function update(Request $request, $id){
        $input = $request->all();
        DB::table('color')->where('id', $id)->update([
            'name' =>  $input['name']
        ]);
        return redirect()->back()->with('thongbao', 'Sửa màu thành công');
    }
    public function destroy($id){
        DB::table('color')->where('id', $id)->delete();
        return redirect()->back()->with('thongbao', 'Xóa màu thành công!');
    }
    public function setactive($id, $value){
        DB::table('color')->where('id', $id)->update([
            'status' =>  $value
        ]);
        return redirect()->back();
    }
}
