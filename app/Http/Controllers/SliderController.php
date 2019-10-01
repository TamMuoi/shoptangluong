<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SliderController extends Controller
{
    //them slider
    public function addSlider(){
        return view('admincp.slider.add_slider');
    }
    public function postSlider(Request $request){
        $this->validate($request,[
            
            'image'=>'required',
            // 'logo'=>'required',
            // 'title'=>'required'
        ],
        [
            'image.required'=>'Vui lòng không để trống ảnh slider.',
            // 'logo.required'=>'Vui lòng không để trống',
            // 'title.required'=>'Vui lòng không để trống'
        ]);
        //image
        if ($request->hasFile('image')) {

            $file = $request->file('image');//lay anh tu form input
            $name = $file->getClientOriginalName();//lay ten anh
            $thumnail = str_random(4) . "_image_" . $name; //them muoi vao de anh kg trung nhau
            //neu ton tai roi thi chay muoi
            while (file_exists('assets/img/' . $thumnail)) {
                $thumnail;
            }
            
            $file->move('assets/img/', $thumnail); //place luu anh
            
            $file_name = $thumnail; // ten anh dc luu
    
        }else{
            $file_name = "";
        }
        //logo
        if ($request->hasFile('logo')) {

            $files = $request->file('logo');//lay anh tu form input
            $names = $files->getClientOriginalName();//lay ten anh
            $thumnails = str_random(4) . "_image_" . $names; //them muoi vao de anh kg trung nhau
            //neu ton tai roi thi chay muoi
            while (file_exists('assets/img/' . $thumnails)) {
                $thumnails;
            }
            
            $files->move('assets/img/', $thumnails); //place luu anh
            
            $file_names = $thumnails; // ten anh dc luu
    
        }else{
            $file_names = "";
        }
        
        DB::table('sliders')->insert([
            'image'=>$file_name,
            'logo'=>$file_names,
            // 'title'=>$request->title
        ]);
        return redirect()->route('listslider')->with('thongbao','Đăng ảnh slider thành công.');
    }

    //list slider
    public function listSlider(){
        $data['slider'] = DB::table('sliders')->orderBy('id','desc')->get();
        return view('admincp.slider.list_slider',$data);
    }
    //delete
    public function deleteSlider($id){
        $slider = DB::table('sliders')->where('id',$id)->first();
        if($slider->image !="" && file_exists('assets/img/' . $slider->image)){
            unlink('assets/img/'.$slider->image);
        };
        DB::table('sliders')->where('id',$id)->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
    }

    //edit
    public function editSlider($id){
        $data['slider'] = DB::table('sliders')->where('id',$id)->get();
        // dd($data['slider']);
        return view('admincp.slider.edit_slider',$data);
    }
    public function postEditSlider(Request $request, $id){
        $oldIMG = DB::table('sliders')->find($id);
        // dd($oldIMG);
        
        //image
        if ($request->hasFile('image')) {
            
            $file = $request->file('image');//lay anh tu form input
            $name = $file->getClientOriginalName();//lay ten anh
            $thumnail = str_random(4) . "_image_" . $name; //them muoi vao de anh kg trung nhau
            //neu ton tai roi thi chay muoi
            while (file_exists('assets/img/' . $thumnail)) {
                $thumnail;
            }
            
            $file->move('assets/img/', $thumnail); //place luu anh
            
            $file_name = $thumnail; // ten anh dc luu
            
    
        }else{
            $file_name = $request->old_file;
        }
        //logo
        if ($request->hasFile('logo')) {

            $files = $request->file('logo');//lay anh tu form input
            $names = $files->getClientOriginalName();//lay ten anh
            $thumnails = str_random(4) . "_image_" . $names; //them muoi vao de anh kg trung nhau
            //neu ton tai roi thi chay muoi
            while (file_exists('assets/img/' . $thumnails)) {
                $thumnails;
            }
            
            $files->move('assets/img/', $thumnails); //place luu anh
            
            $file_names = $thumnails; // ten anh dc luu
    
        }else{
            // if($oldIMG->logo)
            $file_names = $request->old_files;
        }
        
        DB::table('sliders')->where('id',$id)->update([
            'image'=>$file_name,
            'logo'=>$file_names
        ]);
        return redirect()->route('listslider')->with('thongbao','Sửa ảnh slider thành công.');
    }
}
