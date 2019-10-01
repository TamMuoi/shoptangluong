<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function loginuser(Request $request){
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
        // Đăng nhập
        if (Auth::guard('web')->attempt(
            ['email' => $request->email,
                'password'=>$request->password,
                'status' => 1,
            ],
            $request->remember
        )){
            return redirect()->back()->with('thongbao', 'Xin chào '.Auth::user()->name);
        }else {
            return redirect()->back()->with('thongbao', 'Login Failed');
        }
    }


    public function createuser(Request $request){

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

        if (Auth::guard('web')->attempt(
            ['email' => $request->email,
                'password'=>$request->password,
                'status' => 1,
            ],
            $request->remember
        )){
            return redirect()->back()->with('thongbao', 'Xin chào '.$input['name']);
        }else {
            return redirect()->back()->with('thongbao', 'Login Failed');
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        // chuyển hướng về trang login của admin
        return redirect()->back()->with('thongbao', 'Đăng xuát thành công!');
    }

}
