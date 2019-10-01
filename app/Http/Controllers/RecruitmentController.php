<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitmentController extends Controller
{
    //

    public function index(){

        $data['recruitments'] = DB::table('recruitments')->orderBy('id', 'desc')->get();

        return view('admincp.recruitment.list',$data);
    }

    public function create(){
        return view('admincp.recruitment.create');
    }

    public function edit($id){
        $data['recruitment'] = DB::table('recruitments')->find($id);
        $tags=DB::table('tag_recruitment')->where('recruitment_id',$id)->get();
        $tagname ="";
        foreach ($tags as $tag){
            $tagname .= $tag->name.',';
        }
        $data['tags']= $tagname;
        return view('admincp.recruitment.edit',$data);
    }
    public function store(Request $request)
    {
        //dd($request->all());

        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_recruitment_" . $name;
            while (file_exists('images/recruitment/' . $avatar)) {
                $Hinh = str_random(4) . "_recruitment_" . $name;
            }
            $file->move('images/recruitment/', $avatar);
            $file_name = $avatar;
        } else {
            $file_name = 'recruitment.png';
        }

        DB::table('recruitments')->insert([
            'title' => $input['title'],
            'slug' => $this->slug($input['title']),
            'code' => $input['code'],
            'begin_time' => $input['begin_time'],
            'end_time' => $input['end_time'],
            'image' => $file_name,
            'content' => $input['content'],
            'salary' => $input['salary'],
            'position' => $input['position'],
            'work_time' => $input['work_time'],
        ]);
        $item = DB::table('recruitments')->where('code', $input['code'])->orderBy('id', 'desc')->first();
        $tags = explode(',', $input['tags']);
        foreach ($tags as $tag) {
            if ($tag != ''){
                DB::table('tag_recruitment')->insert([
                    'name' => $tag,
                    'recruitment_id' =>$item->id
                ]);
            }
        }
       return redirect('/admincp/recruitment')->with('thongbao', "Thêm Tin Thành Công");
    }

    public function update(Request $request, $id){

        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_recruitment_" . $name;
            while (file_exists('images/recruitment/' . $avatar)) {
                $Hinh = str_random(4) . "_recruitment_" . $name;
            }
            $file->move('images/recruitment/', $avatar);
            if($input['old-file']!=''&& $input['old-file']!='recruitment.png' && file_exists('images/recruitment/' . $input['old-file'])){
                unlink('images/recruitment/' . $input['old-file']);
                }

            $file_name = $avatar;
        } else {
            $file_name = $input['old-file'];
        }

        DB::table('recruitments')->where('id', $id)->update([
            'title' => $input['title'],
            'slug' => $this->slug($input['title']),
            'begin_time' => $input['begin_time'],
            'end_time' => $input['end_time'],
            'image' => $file_name,
            'content' => $input['content'],
            'salary' => $input['salary'],
            'position' => $input['position'],
            'work_time' => $input['work_time'],
        ]);

             DB::table('tag_recruitment')->where('recruitment_id',$id)->delete();
        $tags = explode(',', $input['tags']);
        foreach ($tags as $tag) {
            if ($tag != ''){
                DB::table('tag_recruitment')->insert([
                    'name' => $tag,
                    'recruitment_id' =>$id
                ]);
            }
        }
        return redirect('/admincp/recruitment')->with('thongbao', "Sửa Tin tuyển dụng Thành Công");
    }

    public function destroy($id){
        DB::table('recruitments')->where('id', $id)->delete();
        return redirect('/admincp/recruitment')->with('thongbao', "Xóa Tin tuyển dụng Thành Công");

    }
}
