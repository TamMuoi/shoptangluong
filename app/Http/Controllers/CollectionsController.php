<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionsController extends Controller
{
    //

    public function index(){

        $data['collections'] = DB::table('collections')
            ->orderBy('status', 'desc')
            ->orderBy('id', 'desc')->get();

        return view('admincp.collections.list', $data);
    }

    public function store(Request $request){

        $input=$request->all();


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_collections_" . $name;
            while (file_exists('images/collections/' . $avatar)) {
                $Hinh = str_random(4) . "_collections_" . $name;
            }
            $file->move('images/collections/', $avatar);
            $file_name = $avatar;
        }
        else{
            $file_name = 'collections.jpg';
        }

        DB::table('collections')->insert([
           'name' => $input['name'],
           'slug' => $this->slug($input['name']),
           'image' => $file_name,
        ]);

        return redirect()->back()->with('thongbao', 'Thêm Mới Bộ Sưu Tập thành công');
    }

    public function update(Request $request, $id){
        //dd($request->all());
        $input=$request->all();


        if ($request->hasFile('image')) {
            $old = DB::table('collections')->find($id);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_collections_" . $name;
            while (file_exists('images/collections/' . $avatar)) {
                $Hinh = str_random(4) . "_collections_" . $name;
            }
            $file->move('images/collections/', $avatar);
            if($old->image!='collections.jpg' && file_exists('images/collections/' . $old->image)){
                unlink('images/collections/' . $old->image);
            }
            $file_name = $avatar;
        }
        else{
            $file_name = $input['old-file'];
        }

        DB::table('collections')->where('id', $id)->update([
            'name' => $input['name'],
            'slug' => $this->slug($input['name']),
            'image' => $file_name,
        ]);

        return redirect()->back()->with('thongbao', 'Sửa Bộ Sưu Tập thành công');
    }

    public function destroy($id){
        $images = DB::table('product_details')
            ->select('product_details.image')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->where('products.collections_id', $id)
            ->get();
        foreach ($images as $value){
            $pictures=explode(',',$value->image);
            foreach ($pictures as $pic){
                if($pic !='' && file_exists('images/products/' . $pic)){
                    unlink('images/products/' . $pic);
                }
            }
        }
        DB::table('collections')->where('id', $id)->delete();
        return redirect()->back()->with('thongbao', 'xóa bộ sưu tập thành công!');
    }

    public function setactive($id, $value){
        DB::table('collections')->where('id', $id)->update([
            'status' => $value
        ]);
        return redirect()->back();
    }
}
