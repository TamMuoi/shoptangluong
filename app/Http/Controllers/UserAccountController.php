<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAccountController extends Controller
{
    //
    public function index(){
        $data['users'] = DB::table('users')->orderBy('id', 'desc')->get();
        /*dd($data['users']);*/

        return view('admincp.account.users.list', $data);
    }
    public function create(){

        return view('admincp.account.users.create');

    }
    public function edit($id){

       $data['user'] = DB::table('users')->where('id', $id)->first();
//       dd($data['user']);
        return view('admincp.account.users.edit', $data);

    }
    public function store(Request $request){

        $this->validate($request,[
            'email'		=>'unique:users,email',
        ]);
        $input= $request->all();
        $birth = $input['year'].'-'.$input['month'].'-'.$input['day'];
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_avatar_" . $name;
            while (file_exists('images/avatar/' . $avatar)) {
                $Hinh = str_random(4) . "_avatar_" . $name;
            }
            $file->move('images/avatar/', $avatar);
            $file_name = $avatar;
        }
        else{
            if($input['gender']==0){
                $file_name='male.png';
            }
            else{
                $file_name='female.png';
            }
        }

        DB::table('users')->insert([
            'name' => $input['name'],
            'birth' => $birth,
            'avatar' => $file_name,
            'gender' => $input['gender'],
            'email' => $input['email'],
            'status' => 1,
            'password' => bcrypt($input['password_confirmation'])
        ]);

        return redirect('admincp/useraccount')->with('thongbao', 'create acount success');
    }
    public function update(Request $request, $id){
        /*$this->validate($request,[
            'email'		=>'unique:users,email',
        ]);*/
        $input= $request->all();

        if ($request->hasFile('avatar')) {
            $old= DB::table('users')->find($id);
//            dd($old->avatar);
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_avatar_" . $name;
            while (file_exists('images/avatar/' . $avatar)) {
                $Hinh = str_random(4) . "_avatar_" . $name;
            }
            $file->move('images/avatar/', $avatar);
           if($old->avatar!='male.png' && $old->avatar!='female.png' && file_exists('images/avatar/' . $old->avatar)){
               unlink('images/avatar/' . $old->avatar);
               }
            $file_name = $avatar;
        }
        else{
           $file_name = $input['old-file'];
        }
        if($input['password']==null){
            DB::table('users')->where('id', $id)->update([
                'name' => $input['name'],
                'birth' => $input['birth'],
                'avatar' => $file_name,
                'gender' => $input['gender'],
                'email' => $input['email'],
                'status' => 1,
            ]);

            return redirect('admincp/useraccount')->with('thongbao', 'update acount without change password success');
        }
        else{
            DB::table('users')->where('id', $id)->update([
                'name' => $input['name'],
                'birth' => $input['birth'],
                'avatar' => $file_name,
                'gender' => $input['gender'],
                'email' => $input['email'],
                'status' => 1,
                'password' => $input['password_confirmation']
            ]);

            return redirect('admincp/useraccount')->with('thongbao', 'update acount with change password success');
        }
    }

    public function active($id, $status){
        DB::table('users')->where('id', $id)->update([
            'status' => $status,
        ]);

        return redirect()->back();
    }
    public function destroy($id){
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back()->with('thongbao', 'Xóa tài khoản user thành công');
    }
}
