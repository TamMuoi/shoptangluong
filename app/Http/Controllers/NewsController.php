<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    //
    public function index(){
        $data['news'] = DB::table('news')
            ->select('news.*', 'cate_news.name as cate')
            ->join('cate_news', 'cate_news.id','=', 'news.cate_id')
            ->orderBy('id', 'desc')->get();
         return view('admincp.news.list', $data);
    }
    public function create(){
        $data['cates'] = DB::table('cate_news')->get();
        return view('admincp.news.create', $data);
    }
    public function edit($id){
        $data['news'] = DB::table('news')->find($id);
        $data['cates'] = DB::table('cate_news')->get();
        $tags=DB::table('tagnews')->where('news_id', $id)->get();
        $kq='';
        foreach($tags as $tag){
            $kq .= $tag->name.',';
        }
        $data['tags']= $kq;
        return view('admincp.news.edit', $data);
    }

    public function store(Request $request){
        $request->validate([
            'content' => 'required',
        ]);
        $input= $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_news_" . $name;
            while (file_exists('images/news/' . $avatar)) {
                $Hinh = str_random(4) . "_news_" . $name;
            }
            $file->move('images/news/', $avatar);
            $file_name = $avatar;
        }
        else{
                $file_name='news.png';
        }

        DB::table('news')->insert([
           'title' => $input['name'],
           'slug' => $this->slug($input['name']),
            'summary' => $input['summary'],
            'content' => $input['content'],
            'image' => $file_name,
            'cate_id' => $input['cate'],
            'created_at' =>now()
        ]);

        $news=DB::table('news')->where('title', '=', $input['name'])->orderBy('id', 'desc')->first();

        $tags = explode(',',$input['tags']);
        foreach($tags as $tag)
        {
            DB::table('tagnews')->insert([
                'name' => $tag,
                'news_id' => $news->id
            ]);
        }

        return redirect('/admincp/news')->with('thongbao', "Thêm Tin Thành Công");

    }

    public function update(Request $request, $id){
        $old=DB::table('news')->find($id);
        $request->validate([
            'content' => 'required',
        ]);
        $input= $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_news_" . $name;
            while (file_exists('images/news/' . $avatar)) {
                $Hinh = str_random(4) . "_news_" . $name;
            }
            $file->move('images/news/', $avatar);
            if($old->image!='news.png' && file_exists('images/news/' . $old->image)){
                unlink('images/news/' . $old->image);
            }
            $file_name = $avatar;
        }
        else{
            $file_name=$input['old-image'];
        }

        DB::table('news')->where('id', $id)->update([
            'title' => $input['name'],
            'slug' => $this->slug($input['name']),
            'summary' => $input['summary'],
            'content' => $input['content'],
            'image' => $file_name,
            'cate_id' => $input['cate'],
            'created_at' =>now()
        ]);

        DB::table('tagnews')->where('news_id', $id)->delete();
        $tags = explode(',',$input['tags']);
        foreach($tags as $tag)
        {
            DB::table('tagnews')->insert([
                'name' => $tag,
                'news_id' => $id
            ]);
        }

        return redirect('/admincp/news')->with('thongbao', "Sửa Tin Thành Công");
    }
    public function destroy($id){
        $old = DB::table('news')->find($id);
        if($old->image!='news.png' && file_exists('images/news/' . $old->image)){
            unlink('images/news/' . $old->image);
        }
        DB::table('news')->where('id', $id)->delete();
        return redirect('/admincp/news')->with('thongbao', "Xóa Tin Thành Công");
    }
}
