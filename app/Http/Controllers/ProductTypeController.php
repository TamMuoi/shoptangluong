<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttype = DB::table('product_type')
        ->select('product_type.*','cate_products.name as proname')
        ->join('cate_products','product_type.cate_id','=','cate_products.id')
        ->orderBy('id','desc')
        ->paginate(5);

        return view('admincp.producttype.list',compact('producttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('cate_products')->get();
//        dd($category);
        return view('admincp.producttype.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3'
        ],
        [
            'name.required'=>'Vui lòng không để trống.',
            'name.min' => 'Vui lòng nhập trên 3 từ.',
        ]);
        DB::table('product_type')->insert([
            'name'=>$request->name,
            'slug'=>$this->slug($request->name),
            'active'=>$request->status,
            'cate_id'=>$request->idCategory,
        ]);
        return redirect()->route('list.producttype')->with('thongbao','Tạo loại sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = DB::table('product_type')->find($id);
        $cateproduct = DB::table('cate_products')->get();
//        dd($producttype);
        return view('admincp.producttype.edit',compact('producttype','cateproduct'));
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
    public function destroy(Request $request)
    {
        DB::table('product_type')->where('id',$request->id)->delete();
    }
}
