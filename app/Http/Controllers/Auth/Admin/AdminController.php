<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth:admins')->only('index');
    // }
    public function index()
    {

        $data['countbill'] = DB::table('carts')->where('status', 0)->count();
        $data['countproducts'] = DB::table('products')->count();
        $data['countusers'] = DB::table('users')->where('status', 1)->count();
        $data['countcontacts'] = DB::table('contacts')->where('status', 0)->count();
        $data['contacts'] = DB::table('contacts')->where('status', 0)->get();

        $cart = DB::table('carts')->get();
        $now = getdate();
        switch ($now['mon']){
            case 2:
                $day=28;
                break;
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                $day=31;
                break;
            default:
                $day=30;
                break;
        }
        //dd($day);

        $data['countday']=0;
        $data['cartday']=0;
        $data['countmon']=0;
        $data['cartmon']=0;
        $data['countall']=0;
        $data['cartall']=0;
        foreach ($cart as $value) {
            if (strtotime(now()) - strtotime($value->day) <= 86400){
                $data['countday'] += $value->total;
                $data['cartday']++;
            }
            if (strtotime(now()) - strtotime($value->day) <= 86400*$day){
                $data['countmon'] += $value->total;
                $data['cartmon']++;
            }
            $data['countall'] += $value->total;
            $data['cartall']++;
        }
        //dd($data);

        return view('admincp.home', $data);
    }
}
