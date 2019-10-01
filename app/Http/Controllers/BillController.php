<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    //
    public function index(){
        $data['bills'] = DB::table('carts')->orderBy('status', 'asc')->orderBy('id', 'desc')->get();

        return view('admincp.bill.list', $data);
    }
    public function item($id){
        $data['bill']= DB::table('carts')
            ->select('carts.*','payment_methods.name as pay')
            ->join('payment_methods', 'payment_methods.id','=', 'carts.payment_method_id')
            ->where('carts.id',$id)->first();
        $data['items']=DB::table('cart_details')
            ->select('cart_details.*','size.name as size', 'color.name as color')
            ->join('size', 'size.id','=', 'cart_details.size')
            ->join('color', 'color.id','=', 'cart_details.color')

            ->where('cart_id', $id)->get();
//        dd($data['items']);

        return view('admincp.bill.billitem',$data);
    }

    public function confirm($id){
        DB::table('carts')->where('id', $id)->update([
           'status'=>1,
        ]);
        return redirect('admincp/bill');
    }
    public function view($value){

        $data['bills'] = DB::table('carts')->orderBy('status', 'asc')->orderBy('id', 'desc')->get();
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


        switch ($value){
            case 'day':
                $data['time']= 86400;
                break;
            case 'mon':
                $data['time']= $day*86400;
        }


        return view('admincp.bill.list', $data);
    }
}
