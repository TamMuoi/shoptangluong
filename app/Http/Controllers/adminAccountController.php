<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminAccountController extends Controller
{
    //
    public function index(){
        $data['admins'] = DB::table('admins')->orderBy('id', 'desc')->get();

        return view('admincp.account.admin.list', $data);
    }

    public function create(){
        return view('admincp.account.admin.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'		=>'unique:users,email',
        ]);
        $input=$request->all();
        DB::table('admins')->insert([
           'name' => $input['name'],
           'email' => $input['email'],
           'status' => 1,
           'password' => bcrypt($input['password_confirmation'])
        ]);
        return redirect('admincp/adminaccount')->with('thongbao', 'create acount success');
    }
    public function update(Request $request, $id){

        $input= $request->all();
        if($input['password_confirmation']==''){
            DB::table('admins')->where('id', $id)->update([
                'name' => $input['name'],
                'email' => $input['email'],
            ]);
            return redirect()->back()->with('thongbao', 'update acount without change password success');

        }
        else{
            DB::table('admins')->where('id', $id)->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password_confirmation'])
            ]);
            return redirect()->back()->with('thongbao', 'update acount with change password success');

        }

    }

    public function active($id, $status){
        DB::table('admins')->where('id', $id)->update([
            'status' => $status,
        ]);

        return redirect()->back();
    }
    public function destroy($id){
        DB::table('admins')->where('id', $id)->delete();
        return redirect()->back()->with('thongbao', 'Đã xóa tài khoản Amdin thành công');
    }
}
