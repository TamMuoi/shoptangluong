<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;

class ajaxController extends Controller
{
    //
    public function selectsize($id){
        //dd('hihi');
        $size = DB::table('color_size')
            ->select('size.id','size.name')
            ->join('size', 'size.id', '=', 'color_size.size_id')
            ->where([
                ['color_size.detail_id', $id],
                ['color_size.quantity','>',0]
            ])
            ->get();
        $html="";
        //dd($size);
        foreach ($size as $value) {
            $html .= '<button class="btn has-color" onclick="selectsize('.$value->id.')">'.$value->name.'</button>';
        }
        echo $html;
    }
    public function selectcolor($colorid, $productid){

        $product = DB::table('product_details')
            ->select('product_details.image')
            ->where([
                ['product_id', '=', $productid],
                ['color_id', '=', $colorid]
            ])
            ->first();

        $images = explode(',', $product->image);
        //$html='';
        $html = '<ol class="carousel-indicators">';
        foreach ($images as $key => $image){
            if($key==0){
                $html .= '<li data-target="#product-carousel" data-slide-to="0" class="active" style="background-image: url('.asset('images/products/'.$image).');"></li>';
            }
            elseif($image!=''){
                $html .= '<li data-target="#product-carousel" data-slide-to="'.$key.'" class="" style="background-image: url('.asset('images/products/'.$image).');"></li>';

            }
        }
        $html.= '</ol>';
        //dd($html);
        $html .='<div id="product-carousel" class="carousel slide" data-ride="carousel">';
        foreach ($images as $key => $image){
            if($key==0){

                $html .= '<div class="carousel-item active">';
                $html .= '<div class="img-zoom-container xzoom zoom-box">';
                $html .= '<img class="xzoom-'.$key.'" src="'.asset('images/products/'.$image).'" xoriginal="'.asset('images/products/'.$image).'" width="" alt="">';
                $html.= '<script type="text/javascript">';
                    $html.='$(function () {';
                        $html.='$(".xzoom-'.$key.'").xzoom()';
                    $html.='});';
                $html.='</script>';
                $html .= '</div>';
                $html .= '</div>';
            }
            elseif($image!=''){
                $html .= '<div class="carousel-item">';
                $html .= '<div class="img-zoom-container xzoom zoom-box">';
                $html .= '<img class="xzoom-'.$key.'" src="'.asset('images/products/'.$image).'" xoriginal="'.asset('images/products/'.$image).'" width="300" alt="">';
                $html.= '<script type="text/javascript">';
                $html.='$(function () {';
                $html.='$(".xzoom-'.$key.'").xzoom()';
                $html.='});';
                $html.='</script>';
                $html .= '</div>';
                $html .= '</div>';
            }
        }
        $html .='</div>';
        $html .='<a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">';
        $html .='<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        $html .='<span class="sr-only">Previous</span>';
        $html .='</a>';
        $html .='<a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">';
        $html .='<span class="carousel-control-next-icon" aria-hidden="true"></span>';
        $html .='<span class="sr-only">Next</span>';
        $html .='</a>';
        echo $html;

    }

    public function quantity(Request $request){

        $quantity = DB::table('color_size')
            ->select('color_size.quantity')
            ->join('product_details', 'product_details.id', '=', 'color_size.detail_id')
            ->where([
                ['product_details.product_id', $request->product],
                ['product_details.color_id', $request->color],
                ['color_size.size_id', $request->size],
            ])->first();
        if($quantity==null){
            echo 0;
        }
        else {
            echo $quantity->quantity;
        }
    }


    public function addcart(Request $request){

        session_start();
        //dd($request->all());
        $input=$request->all();

        $product= DB::table('products')->find($input['id']);
        $size= DB::table('size')->find($input['size']);
        $color= DB::table('color')->find($input['color']);
        $quantity = DB::table('color_size')
            ->select('color_size.quantity')
            ->join('product_details', 'product_details.id', '=', 'color_size.detail_id')
            ->where([
                ['product_details.product_id', $product->id],
                ['product_details.color_id', $color->id],
                ['color_size.size_id', $size->id],
            ])->first();
        //dd($product);

        /* echo "<pre>";
           print_r($product);
         echo "</pre>";

         die();*/
        \Cart::add(array(
            array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->sale,
                'quantity' => $input['quantity'],
                'attributes' => array(
                    'conlai' => $quantity->quantity,
                    'sizeid' => $size->id,
                    'sizename' => $size->name,
                    'colorid' => $color->id,
                    'colorname' => $color->name,
                    'image' => $product->image

                )

            ),
        ));

//        dd(\Cart::getContent());
    }
    public function updatecart(Request $request){
        $input=$request->all();

//        dd($input['quantity']);

        \Cart::update($input['id'], array(
            'quantity' => $input['quantity'], // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        $cart = \Cart::getContent();
        $tong=0;
        foreach ($cart as $value){
            $tong += $value->quantity*$value->price;
        }
        echo number_format($tong).' VNĐ';
    }

    public function deletecart($id){
        \Cart::remove($id);

        return redirect()->route('cart');
    }


    /*
     * color
     * */

    public function editcolor($productid, $colorid){
        $colors= DB::table('product_details')
            ->where([
                ['product_id','=',$productid],
                ['color_id','=',$colorid],
            ])
            ->first();
        $sizes = DB::table('size')
            ->where(DB::raw('(select count(*) from color_size WHERE color_size.size_id=size.id AND detail_id='.$colors->id.')'),'=', 0)
            ->get();
        $sizehas=DB::table('color_size')
            ->select('size.id','size.name', 'color_size.quantity')
            ->join('size','size.id', '=', 'color_size.size_id')
            ->where('detail_id', $colors->id)
            ->get();
        $images = explode(',', $colors->image);
       //dd($sizes);


        $html="<div id='color-child-has-".$colorid."' style='border: black dotted 1px; border-radius: 10px'>";

        $html.="<div style='text-align: right'><a onclick='deletecolorhas(".$colorid.")'><i class='fa fa-times' ></i></a> </div>";
        $html.="<h4>Thêm màu</h4>";
        $html.="<hr>";
        $html.="<input name='color-has-".$colorid."' class='form-control' type='hidden' value='".$colorid."'>";
        foreach ($images as $key => $image) {
            if($image!='') {
                $html.= "<input name='old-file-has-".$colorid."-".$key."' type='hidden' value='".$image."'>";
                $html .= "<input name='file-has-".$colorid."-".$key."' id='file-".$key."-" . $colorid . "' class='form-control' type='file' onchange='fileValidation(this)'>";
                $html .= "<div id='imagePreviewfile-".$key."-" . $colorid . "'>";
                $html .= "<img style='width:200px;' src='" . asset('images/products/' . $image) . "'/>";
                $html .= "</div>";
            }
        }
        $html.="<h5>Chọn Size:</h5>";
        $html.="<select id='has-".$colorid."' onchange='chonsize(this)' required>";
        foreach($sizes as $value){
            $html.="<option value='".$value->id."'>".$value->name."</option>";
        }
        $html.="</select>";
        $html.="<hr>";

        $html.="<div id='soluonghas-".$colorid."'>";
        foreach($sizehas as $keysize => $size){
            $html.='<h5>'.$size->name.'</h5>';
            $html.='<input type="hidden" id="size-name-has-'.$colorid.'-'.$keysize.'" name="size-name-has-'.$colorid.'-'.$keysize.'" value="'.$size->id.'">';
            $html.='<input type="hidden" id="quantity-has-'.$colorid.'-'.$keysize.'" name="quantity-has-'.$colorid.'-'.$keysize.'" min="1" max="100" value="'.$size->quantity.'">';
        }
        $html.="</div>";
        if(isset($keysize)) {
            $number = $keysize + 1;
        }
        else{
            $number=0;
        }
        $html.="<input name='sizenumber-has-".$colorid."' id='sizenumberhas-".$colorid."' class='form-control' type='hidden' value='". $number."'>";

        $html.="</div>";
        echo $html;
    }
    public function deletecolor($productid, $colorid){
        $colors= DB::table('product_details')
            ->where([
                ['product_id','=',$productid],
                ['color_id','=',$colorid],
            ])
            ->first();
        $images = explode(',', $colors->image);
        foreach ($images as $key => $image) {
            if($image!='' && file_exists('images/products/' . $image)) {
                    unlink('images/products/' . $image);
            }
        }
        DB::table('product_details')
            ->where([
                ['product_id','=',$productid],
                ['color_id','=',$colorid],
            ])
            ->delete();
    }

    public function showproduct(Request $request){
        //dd($request->all());
        if($request->collections!=null){
            $products = DB::table('products')
                ->orderBy('id', 'desc')
                ->where('collections_id',$request->collections)
                ->limit($request->number)->get();
        }
        else if($request->cate!=null) {
            $products = DB::table('products')
                ->orderBy('id', 'desc')
                ->where('category_id',$request->cate)
                ->limit($request->number)->get();
        }else{
            $products = DB::table('products')
                ->orderBy('id', 'desc')
                ->limit($request->number)->get();
        }
        //$products = DB::table('products')->orderBy('id', 'desc')->limit($number)->get();
        //dd($products);
        $html="";
        foreach ($products as $value){
            $html.="<div class='col-md-3  col-sm-6 col-6 new-product' id='vv'>";
            $html.="<div class='product-img'>";
            $html.="<img src='".asset('images/products/'.$value->image)."' alt='' style='height: 310px;'>";
            $html.="<div class='over-lay d-flex flex-column justify-content-center'>";
            $html.="<a href=''><i class='far fa-heart'></i></a>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>Mua ngay</a>";
            $html.="</div>";
            $html.="</div>";
            $html.="<div class='info-product d-flex flex-column justify-content-center'>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>".$value->name."</a>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>Mã hàng : ". $value->code."</a>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>".number_format($value->sale)." VNĐ</a>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>Mua ngay</a>";
            $html.="</div>";
            $html.="</div>";
        }
        echo $html;
    }

    public function sapxep(Request $request){
        //dd($request->all());
        if($request->collections!=null){
            $products = DB::table('products')
                ->orderBy($request->value, $request->method)
                ->where('collections_id',$request->collections)
                ->limit(8)->get();
        }
        else if($request->cate!=null) {
            $products = DB::table('products')
                ->orderBy($request->value, $request->method)
                ->where('category_id',$request->cate)
                ->limit(8)->get();
        }else{
            $products = DB::table('products')
                ->orderBy($request->value, $request->method)
                ->limit(8)->get();
        }
        //dd($products);
        $html="";
        foreach ($products as $value){
            $html.="<div class='col-md-3  col-sm-6 col-6 new-product' id='vv'>";
            $html.="<div class='product-img'>";
            $html.="<img src='".asset('images/products/'.$value->image)."' alt='' style='height: 310px;'>";
            $html.="<div class='over-lay d-flex flex-column justify-content-center'>";
            $html.="<a href=''><i class='far fa-heart'></i></a>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>Mua ngay</a>";
            $html.="</div>";
            $html.="</div>";
            $html.="<div class='info-product d-flex flex-column justify-content-center'>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>".$value->name."</a>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>Mã hàng : ". $value->code."</a>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>".number_format($value->sale)." VNĐ</a>";
            $html.="<a href='".url( 'sanpham/'.$value->slug )."'>Mua ngay</a>";
            $html.="</div>";
            $html.="</div>";
        }
        echo $html;

    }

    public function sale(Request $request){
        //dd($request->all());
        $products = DB::table('products')->get();
        $html="";
        foreach ($products as $value){
            $sale= 100-($value->sale/$value->price)*100;
            if($sale>=$request->saledown && $sale<=$request->saleup){
                $html.="<div class='col-md-3  col-sm-6 col-6 new-product' id='vv'>";
                $html.="<div class='product-img'>";
                $html.="<img src='".asset('images/products/'.$value->image)."' alt='' style='height: 310px;'>";
                $html.="<div class='over-lay d-flex flex-column justify-content-center'>";
                $html.="<a href=''><i class='far fa-heart'></i></a>";
                $html.="<a href='".url( 'sanpham/'.$value->slug )."'>Mua ngay</a>";
                $html.="</div>";
                $html.="</div>";
                $html.="<div class='info-product d-flex flex-column justify-content-center'>";
                $html.="<a href='".url( 'sanpham/'.$value->slug )."'>".$value->name."</a>";
                $html.="<a href='".url( 'sanpham/'.$value->slug )."'>Mã hàng : ". $value->code."</a>";
                $html.="<a href='".url( 'sanpham/'.$value->slug )."'>".number_format($value->sale)." VNĐ</a>";
                $html.="<a href='".url( 'sanpham/'.$value->slug )."'>Mua ngay</a>";
                $html.="</div>";
                $html.="</div>";
            }
        }
        echo $html;
    }
}
