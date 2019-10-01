<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class catenewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['catenews'] = DB::table('cate_news')->orderBy('id', 'desc')->get();
        //
        return view('admincp.news.cates.list', $data);
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

        $input=$request->all();

        DB::table('cate_news')->insert([
           'name' => $input['name'],
           'slug' => $this->slug($input['name'])
        ]);
        return redirect()->back()->with('thongbao', "tạo Mới danh mục tin thành công");
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
        $input=$request->all();

        DB::table('cate_news')->where('id', $id)->update([
            'name' => $input['name'],
            'slug' => $this->slug($input['name'])
        ]);
        return redirect()->back()->with('thongbao', "Sửa danh mục tin ".$input['name']." thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('cate_news')->where('id', $id)->delete();
        return redirect()->back()->with('thongbao', "Xóa danh mục tin thành công");
        //
    }
}
