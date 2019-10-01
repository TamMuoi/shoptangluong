<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Darryldecode\Cart\Cart;

class Controller_1 extends Controller
{
    public function __construct()
    {
         $cate_news=DB::table('cate_news')->get();
         View::share('cate_news', $cate_news);
         $new_post = DB::table('news')->orderBy('id', 'desc')->limit(4)->get();
         View::share('new_posts', $new_post);
         $cate_products = DB::table('cate_products')->where('status', '=',1)->orderBy('id', 'desc')->get();
         View::share('cate_products', $cate_products);
         $products = DB::table('products')->orderBy('id','desc')->get();
         View::share('headerproducts', $products);
         $collection = DB::table('collections')->where('status', '=',1)->get();
         View::share('headcollections', $collection);
         View::share('all_products', DB::table('products')->get());
         View::share('introduce', DB::table('introduce')->first());
         View::share('likes', DB::table('product_likes')->get());
         View::share('soluong', '1');

     }

     public  function get_trangchu(){
         $data['sliders']=DB::table('sliders')->limit(3)->orderBy('id','desc')->get();
         $data['product_hots']=DB::table('products')
          /*   ->select('products.*', 'product_likes.user_id')
             ->leftJoin('product_likes', 'product_likes.product_id', '=', 'products.id')*/
             ->limit(4)->orderBy('price','asc')->get();
         $data['product_news']=DB::table('products')
            /* ->select('products.*', 'product_likes.user_id')
             ->leftJoin('product_likes', 'product_likes.product_id', '=', 'products.id')*/
             ->limit(50)->orderBy('id','desc')->get();
         //dd($data['product_hots']);

         
         return view('pages.trangchu', $data);
     }
     /*
      * sản phẩm
      * */
    public  function get_chitietsanpham($slug){
        $data['product']=DB::table('products')
            ->where('slug', $slug)->first();
        $data['colors'] = DB::table('product_details')
            ->select('color.id as colorid','product_details.id as detailid', 'color.name')
            ->join('color', 'color.id', '=', 'product_details.color_id')
            ->where('product_details.product_id',$data['product']->id)
            ->get();
        $data['lienquan'] = DB::table('products')
            ->where('category_id',  $data['product']->category_id)->limit(5)->get();
        $data['product_hot']=DB::table('products')
            ->limit(4)->orderBy('pay','desc')->first();
//        dd($data['product']);

        return view('pages.chitietsanpham', $data);
    }
    public function showrom(){
        $data['showroms'] = DB::table('showrom')->orderBy('id', 'desc')->get();
        return view('pages.showrom', $data);
    }

    /*
     * tin tức
     * */
    public function get_loaitin($slug){
        if($slug=='all'){
            $data['news'] = DB::table('news')->orderBy('id', 'desc')->paginate('4');
        }
        else {
            $data['cates'] = DB::table('cate_news')->where('slug', $slug)->first();
            $data['news'] = DB::table('news')->where('cate_id', $data['cates']->id)->paginate('4');
        }

        return view('pages.loaitin', $data);
    }
    public function get_tin($slug){
        $max = DB::table('news')->max('id');
        $min = DB::table('news')->min('id');

        $data['new'] = DB::table('news')
            ->select('news.*', 'cate_news.name as cate')
            ->join('cate_news','cate_news.id','news.cate_id')
            ->where('news.slug', $slug)->first();
        if($data['new']->id<$max) {
            $next = $data['new']->id;
            do {
                $next++;
                $data['next'] = DB::table('news')->where('id', $next)->first();
            } while ($data['next'] == null);
        }
        if($data['new']->id>$min) {
            $pre = $data['new']->id;

            do {
                $pre--;
                $data['pre'] = DB::table('news')->where('id', $pre)->first();
            } while ($data['pre'] == null);
        }
        $data['new'] = DB::table('news')->where('slug', $slug)->first();
        $data['pre'] = DB::table('news')->where('id', $data['new']->id-1)->first();
        $data['next'] = DB::table('news')->where('id', $data['new']->id+1)->first();
        $data['tags'] = DB::table('tagnews')->where('news_id', $data['new']->id)->limit(10)->get();
        return view('pages.chitiettin', $data);

    }
    /*
     * user
     * */
    public function profile($id){
        $data['user'] = DB::table('users')->where('id', $id)->first();
//        dd($data['user']);
        return view('pages.profile', $data);

    }
    public function changeinfor(Request $request, $id){
//        dd($request->all());
        $input= $request->all();

        if ($request->hasFile('avataruser')) {
            $old= DB::table('users')->find($id);
//            dd($old->avatar);
            $file = $request->file('avataruser');
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
        DB::table('users')->where('id', $id)->update([
            'name' => $input['username'],
            'birth' => $input['birthuser'],
            'avatar' => $file_name,
            'gender' => $input['genderuser'],
            'email' => $input['emailuser'],
        ]);

        return redirect()->back()->with('thongbao', 'update acount without change password success');
    }
    public function checkpass($id, $value){
        $user=DB::table('users')->find($id);

        if (password_verify($value,$user->password)) {

        }else{
            echo 'Mật khẩu cũ không đúng!';
        }
    }
    public function changepass(Request $request, $id){
        $input=$request->all();

            DB::table('users')->where('id', $id)->update([
                'password' => bcrypt($input['repass']),
            ]);
            return redirect()->back()->with('thongbao','Change password success');
    }

    public  function get_form(){
        $data['cart'] = \Cart::getContent();

        $data['tong']=0;
        foreach ($data['cart'] as $value){
            $data['tong'] += $value->quantity*$value->price;
        }
        $data['pays'] = DB::table('payment_methods')->get();
        $data['pays'] = DB::table('payment_methods')->get();

        return view('pages.form', $data);
    }

    public function postthanhtoan(Request $request){
        $carts = \Cart::getContent();

        $input = $request->all();
        //dd($request->all());
        DB::table('carts')->insert([
           'code' => $input['code'],
           'name' => $input['name'],
           'email' => $input['email'],
           'phone' => $input['phone'],
           'address' => $input['address'],
           'payment_method_id' => $input['payment_methods'],
           'total' => $input['tong'],
           'day' => now(),
        ]);

        $cartid = DB::table('carts')
            ->select('carts.*', 'payment_methods.name as pay')
            ->join('payment_methods', 'payment_methods.id','=', 'carts.payment_method_id')
            ->where('code', $input['code'])->first();
        foreach ($carts as $value){
            DB::table('cart_details')->insert([
                'cart_id' => $cartid->id,
                'name' => $value->name,
                'color' => $value->attributes->colorid,
                'size' => $value->attributes->sizeid,
                'price' => $value->price,
                'quantity' => $value->quantity,
                'money' => $value->price*$value->quantity,
            ]);
        }
        foreach ($carts as $value) {
            $quantity = DB::table('color_size')
                ->select('color_size.quantity')
                ->join('product_details', 'product_details.id', '=', 'color_size.detail_id')
                ->where([
                    ['product_details.product_id', $value->id],
                    ['product_details.color_id', $value->attributes->colorid],
                    ['color_size.size_id', $value->attributes->sizeid],
                ])->first();
            DB::table('color_size')
                ->join('product_details', 'product_details.id', '=', 'color_size.detail_id')
                ->where([
                    ['product_details.product_id', $value->id],
                    ['product_details.color_id', $value->attributes->colorid],
                    ['color_size.size_id', $value->attributes->sizeid],
                ])->update([
                    'quantity' => $quantity->quantity-$value->quantity,
                ]);
        }

        if(isset($input['userid'])){
            DB::table('users')->where('id', $input['userid'])->update([
               'address' =>  $input['address'],
               'phone' =>  $input['phone'],
            ]);
        }

        \Cart::clear();
    return \view('pages.xacnhan', compact('cartid'));


    }
    public function createuser(Request $request){
        dd($request->all());
    }

    public  function get_product($slug){

        if($slug== 'all'){
            $data['products'] = DB::table('products')->orderBy('id', 'desc')->paginate(12);
        }
        else {
            $data['cate'] = DB::table('cate_products')->where('slug', $slug)->first();
            $data['products'] = DB::table('products')
                ->select('products.*')
                ->join('cate_products', 'cate_products.id','=', 'products.category_id')
                ->where('cate_products.slug',  $slug)
                ->orderBy('products.id', 'desc')->paginate(12);

        }

    	return view('pages.product', $data);
    }
    public  function get_bosuutap($slug){
        if($slug== 'all'){
            $data['products'] = DB::table('products')->orderBy('id', 'desc')->paginate(12);
            $data['collections'] = null;
        }
        else {
            $data['collections'] = DB::table('collections')->where('slug', $slug)->first();
            $data['products'] = DB::table('products')
                ->select('products.*')
                ->join('collections', 'collections.id','=', 'products.collections_id')
                ->where('collections.slug',  $slug)
                ->orderBy('products.id', 'desc')->paginate(12);

        }
    	return view('pages.bosuutap', $data);
    }

    public function search(Request $request){
        //dd($request->all());
        $data['key'] =$request->name;
        $data['countproducts'] = DB::table('products')->where('name', 'like', '%'.$request->name."%")->count();
        $data['countnews'] = DB::table('news')
            ->join('tagnews', 'tagnews.news_id', '=','news.id')
            ->where('tagnews.name', 'like', '%'.$request->name."%")->count();
        $data['countrecruitments'] = DB::table('recruitments')
            ->join('tag_recruitment', 'tag_recruitment.recruitment_id', '=','recruitments.id')
            ->where('tag_recruitment.name', 'like', '%'.$request->name."%")->count();
        $data['count']= $data['countproducts'] + $data['countnews'] +$data['countrecruitments'];

        $data['searchproducts'] = DB::table('products')->where('name', 'like', '%'.$request->name."%")->get();
        $data['searchnews'] = DB::table('news')
            ->join('tagnews', 'tagnews.news_id', '=','news.id')
            ->where('tagnews.name', 'like', '%'.$request->name."%")->get();
        $data['searchrecruitments'] = DB::table('recruitments')
            ->join('tag_recruitment', 'tag_recruitment.recruitment_id', '=','recruitments.id')
            ->where('tag_recruitment.name', 'like', '%'.$request->name."%")->get();
        //dd($data['recruitments']);

        return view('pages.search', $data);
    }
    public  function get_gioithieu(){
        $data['sliders']=DB::table('sliders')->limit(3)->orderBy('id','desc')->get();
        $data['introduce'] = DB::table('introduce')->orderBy('id','desc')->first();
    	return view('pages.gioithieu',$data);
    }
    public  function get_lienhe(){
        $data['showroms'] = DB::table('showrom')->orderBy('id', 'desc')->get();
    	return view('pages.lienhe', $data);
    }
    public  function get_cauhoi(){
        $data['showroms'] = DB::table('showrom')->orderBy('id', 'desc')->get();
        $data['payments'] = DB::table('payment_methods')->orderBy('id', 'desc')->get();

        return view('pages.cauhoi', $data);
    }
    public  function get_tintuc(){
    	return view('pages.tintuc');
    }

    public  function get_tinkhuyenmai(){
    	return view('pages.tinkhuyenmai');
    }

    public  function get_tinthoitrang(){
    	return view('pages.tinthoitrang');
    }

    public  function get_tinsukien(){
    	return view('pages.tinsukien');
    }
    public  function get_huongdan(){
    	return view('pages.huongdan');
    }
    public  function get_giohang(){
    	return view('pages.giohang');
    }

    public  function get_cart(){
        $data['cart'] = \Cart::getContent();

        $data['tong']=0;
        foreach ($data['cart'] as $value){
            $data['tong'] += $value->quantity*$value->price;
        }
//                dd($data['tong']);
    	return view('pages.cart', $data);
    }

    public  function get_dangky(){
    	return view('pages.dangky');
    }
    public  function get_dangnhap(){
    	return view('pages.dangnhap');
    }
    public  function get_sale(){

        $data['products'] = DB::table('products')
            ->select('products.*')
            ->join('cate_products', 'cate_products.id','=', 'products.category_id')
            ->orderBy('products.id', 'desc')->paginate(12);
        return view('pages.sale', $data);
    }
    public  function get_video(){
        return view('pages.video');
    }
    public  function get_tuyendung(){

        $data['recruitments'] = DB::table('recruitments')->orderBy('id', 'desc')->paginate(6);
        return view('pages.tuyendung', $data);
    }
    public function chitiettuyendung($slug){
        $max = DB::table('recruitments')->max('id');
        $min = DB::table('recruitments')->min('id');

        $data['recruitment'] = DB::table('recruitments')->where('slug', $slug)->first();

        if($data['recruitment']->id<$max) {
            $next = $data['recruitment']->id;
            do {
                $next++;
                $data['next'] = DB::table('news')->where('id', $next)->first();
            } while ($data['$recruitment'] == null);
        }
        if($data['recruitment']->id>$min) {
            $pre = $data['recruitment']->id;

            do {
                $pre--;
                $data['pre'] = DB::table('news')->where('id', $pre)->first();
            } while ($data['pre'] == null);
        }

        $data['pre'] = DB::table('recruitments')->where('id', $data['recruitment']->id-1)->first();
        $data['next'] = DB::table('recruitments')->where('id', $data['recruitment']->id+1)->first();
        $data['tags'] = DB::table('tag_recruitment')->where('recruitment_id', $data['recruitment']->id)->limit(10)->get();

        return view('pages.chitiettuyendung', $data);

    }
    public  function get_tuyendungdetaits(){
        return view('pages.tuyendungdetais');
    }


    public function lienhe(Request $request){
        $input=$request->all();

        DB::table('contacts')->insert([
           'name' => $input['name_message'],
           'email' => $input['email_message'],
           'phone' => $input['phone_message'],
           'content' => $input['content_message'],
            'created_at' => now()
        ]);

        return redirect()->back()->with('thongbao', 'Cảm ơn bạn đã để lại lời nhắn! chúng tôi sẽ phản hôi trong thời gian sớm nhất!');
    }
}
