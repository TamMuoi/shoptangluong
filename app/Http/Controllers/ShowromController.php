<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowromController extends Controller
{
    //
    public function index(){
        $data['showrom']= DB::table('showrom')->orderBy('id', 'desc')->get();
        return view('admincp.showrom.list', $data);
    }

    public function store(Request $request){
        //dd($request->all());
        DB::table('showrom')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()->back()->with('thongbao', 'Thêm Chi nhánh thành công!');
    }
    public function update(Request $request, $id){
        DB::table('showrom')->where('id', $id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()->back()->with('thongbao', 'Sửa Chi nhánh thành công!');
    }
    public function destroy($id){
        DB::table('showrom')->where('id', $id)->delete();
        return redirect()->back()->with('thongbao', 'Xóa Chi nhánh thành công!');
    }
}
