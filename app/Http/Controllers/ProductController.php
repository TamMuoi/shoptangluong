<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products']=DB::table('products')
            ->select('products.*', 'cate_products.name as cate','collections.name as collection', DB::raw('(SELECT Sum(quantity) FROM color_size INNER JOIN product_details ON product_details.id=color_size.detail_id WHERE product_details.product_id=products.id) as quantity'))
            ->join('cate_products','cate_products.id', '=', 'products.category_id')
            ->join('collections','collections.id', '=', 'products.collections_id')
            ->get();
        //dd($data['products']);

        return view('admincp.product.list', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cates'] = DB::table('cate_products')->get();
        $data['collections'] = DB::table('collections')->get();
        $data['sizes'] = DB::table('size')->get();
        $data['colors'] = DB::table('color')->get();

        return view('admincp.product.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $input= $request->all();
        $sale= $input['price']-($input['price']*$input['sale'])/100;
        //dd($sale);
        if ($request->hasFile('file-0-0')) {
            $file = $request->file('file-0-0');
            $name = $this->name_image($file->getClientOriginalName());
            $avatar = str_random(4) . "_product_" . $name;
            while (file_exists('images/products/' . $avatar)) {
                $Hinh = str_random(4) . "_product_" . $name;
            }
            $file->move('images/products/', $avatar);
            $file_name1 = $avatar;
        }
        DB::table('products')->insert([
            'name' => $input['name'],
            'slug' => $this->slug($input['name']),
            'code' => $input['code'],
            'describe'=> $input['describe'],
            'price'=> $input['price'],
            'sale'=> $sale,
            'category_id' => $input['cate'],
            'collections_id' => $input['collections'],
            'image' => $file_name1,
            'created_at' =>now()
        ]);

        $product= DB::table('products')->where('name', $input['name'])->orderBy('id', 'desc')->first();

        for($i=1; $i<=$input['color-number']; $i++){
            if(isset($input['color'.$i])) {

                $file_name="";
                for($k=1; $k<=3; $k++) {
                    if ($request->hasFile('file-'.$i.'-'.$k)) {
                        $file = $request->file('file-'.$i.'-'.$k);
                        $name = $this->name_image($file->getClientOriginalName());;
                        $avatar = str_random(4) . "_product_" . $name;
                        while (file_exists('images/products/' . $avatar)) {
                            $Hinh = str_random(4) . "_product_" . $name;
                        }
                        $file->move('images/products/', $avatar);
                        $file_name .= $avatar.',';
                    }
                }
                //dd($file_name);
                DB::table('product_details')->insert([
                    'product_id'=> $product->id,
                    'color_id' => $input['color'.$i],
                    'image' => $file_name
                ]);
                $details = DB::table('product_details')->where('image', $file_name)->orderBy('id', 'desc')->first();

                if(isset($input['sizenumber'.$input['color'.$i]])) {
                    for ($j = 1; $j <= $input['sizenumber' . $input['color'.$i]]; $j++) {
                        DB::table('color_size')->insert([
                            'detail_id' => $details->id,
                            'size_id' => $input['size-name-' . $input['color'.$i] . '-' . $j],
                            'quantity' => $input['quantity-' . $input['color'.$i] . '-' . $j]
                        ]);
                    }
                }
            }
        }
      return redirect()->route('list.product')->with('thongbao','Thêm Mới Sản Phẩm thành Công');


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
        $data['product'] = DB::table('products')->find($id);
        $data['sale'] = 100-($data['product']->sale/$data['product']->price)*100;
        $data['cates'] = DB::table('cate_products')->get();
        $data['collections'] = DB::table('collections')->get();
        $data['sizes'] = DB::table('size')->get();
        $data['colors'] = DB::table('color')
            ->where(DB::raw('(select count(*) from product_details WHERE product_details.color_id=color.id AND product_id='.$id.')'),'=', 0)
            ->get();
        //dd($data['colors']);
        //

        $data['hascolors'] = DB::table('product_details')
            ->select('product_details.id','product_details.color_id' ,'product_details.image', 'color.name')
            ->join('color', 'color.id','=', 'product_details.color_id')
            ->where('product_details.product_id',$id)
            ->get();
       /* foreach ($data['hascolors'] as $value){
            $data['sizes']= DB::table('color_size')->where('detail_id',$value->id)->get();
        }*/
        //dd($data['sizes']);
        return view('admincp.product.edit', $data);
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
        //dd($request->all());
        $input= $request->all();


        //
        $sale= $input['price']-($input['price']*$input['sale'])/100;
        //dd($sale);
        if ($request->hasFile('file-0-0')) {
            $old = DB::table('products')->find($id);
            $file = $request->file('file-0-0');
            $name = $this->name_image($file->getClientOriginalName());
            $avatar = str_random(4) . "_product_" . $name;
            while (file_exists('images/products/' . $avatar)) {
                $Hinh = str_random(4) . "_product_" . $name;
            }
            $file->move('images/products/', $avatar);
            if($old->image !='' && file_exists('images/products/' . $old->image)){
                unlink('images/products/' . $old->image);
            }
            $file_name1 = $avatar;
        }
        else{
            $file_name1= $input['old-image'];
        }

        DB::table('products')->where('id', $id)->update([
            'name' => $input['name'],
            'slug' => $this->slug($input['name']),
            'describe'=> $input['describe'],
            'price'=> $input['price'],
            'sale'=> $sale,
            'category_id' => $input['cate'],
            'collections_id' => $input['collections'],
            'image' => $file_name1,
            'updated_at' =>now()
        ]);



        if($input['color-number']!=0){
            for($i=1; $i<=$input['color-number']; $i++){
                if(isset($input['color'.$i])) {

                    $file_name="";
                    for($k=1; $k<=3; $k++) {
                        if ($request->hasFile('file-'.$i.'-'.$k)) {
                            $file = $request->file('file-'.$i.'-'.$k);
                            $name = $this->name_image($file->getClientOriginalName());
                            $avatar = str_random(4) . "_product_" . $name;
                            while (file_exists('images/products/' . $avatar)) {
                                $Hinh = str_random(4) . "_product_" . $name;
                            }
                            $file->move('images/products/', $avatar);
                            $file_name .= $avatar.',';
                        }
                    }
                    //dd($file_name);
                    DB::table('product_details')->insert([
                        'product_id'=> $id,
                        'color_id' => $input['color'.$i],
                        'image' => $file_name
                    ]);
                    $details = DB::table('product_details')->where('image', $file_name)->orderBy('id', 'desc')->first();

                    if(isset($input['sizenumber'.$input['color'.$i]])) {
                        for ($j = 0; $j < $input['sizenumber' . $input['color'.$i]]; $j++) {
                            DB::table('color_size')->insert([
                                'detail_id' => $details->id,
                                'size_id' => $input['size-name-' . $input['color'.$i] . '-' . $j],
                                'quantity' => $input['quantity-' . $input['color'.$i] . '-' . $j]
                            ]);
                        }
                    }
                }
            }
        }

        $hascolor = DB::table('product_details')->where('product_id', $id)->get();


        if($input['has-color-select']!=0){
            foreach ($hascolor as $has) {
                if (isset($input['color-has-' . $has->color_id])) {

                    $detail_img = "";
                    for ($i = 0; $i <= 2; $i++) {
                        if ($request->hasFile('file-has-' . $has->color_id . '-' . $i)) {
                            $old = DB::table('products')->find($id);
                            $file = $request->file('file-has-' . $has->color_id . '-' . $i);
                            $name = $this->name_image($file->getClientOriginalName());
                            $avatar = str_random(4) . "_product_" . $name;
                            while (file_exists('images/products/' . $avatar)) {
                                $Hinh = str_random(4) . "_product_" . $name;
                            }
                            $file->move('images/products/', $avatar);
                            if ($input['old-file-has-' . $has->color_id . '-' . $i] != '' && file_exists('images/products/' . $input['old-file-has-' . $has->color_id . '-' . $i])) {
                                unlink('images/products/' . $input['old-file-has-' . $has->color_id . '-' . $i]);
                            }
                            $detail_img .= $avatar . ",";
                        } else {
                            $detail_img .= $input['old-file-has-' . $has->color_id . '-' . $i] . ",";
                        }
                    }
                    DB::table('product_details')
                        ->where([
                            ['product_id', '=', $id],
                            ['color_id', '=', $input['color-has-' . $has->color_id]]
                        ])
                        ->update([
                            'image' => $detail_img
                        ]);


                    DB::table('color_size')
                        ->join('product_details', 'product_details.id', '=', 'color_size.detail_id')
                        ->where([
                            ['product_details.product_id', '=', $id],
                            ['product_details.color_id', '=', $input['color-has-' . $has->color_id]]
                        ])->delete();

                    for ($i = 0; $i < $input['sizenumber-has-' . $has->color_id]; $i++) {
                        DB::table('color_size')->insert([
                            'detail_id' => $has->id,
                            'size_id' => $input['size-name-has-' . $has->color_id . '-' . $i],
                            'quantity' => $input['quantity-has-' . $has->color_id . '-' . $i],
                        ]);
                    }
                }
            }

        }

        return redirect()->route('list.product')->with('thongbao','Sửa Sản Phẩm thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = DB::table('product_details')
            ->select('product_details.image')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->where('products.id', $id)
            ->get();
        foreach ($images as $value){
            $pictures=explode(',',$value->image);
            foreach ($pictures as $pic){
                if($pic !='' && file_exists('images/products/' . $pic)){
                    unlink('images/products/' . $pic);
                }
            }
        }
        DB::table('products')->where('id', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa sản phẩm thành công!');
        //
    }
}
