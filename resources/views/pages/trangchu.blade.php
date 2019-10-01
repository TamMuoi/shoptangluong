@extends('master-layout')
@section('title')
    Thời trang Phụ Nữ
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('css/linhnguyen.css') }}">
    <script src="{{ asset('js/jquery.popup.js') }}"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://giaiphapthuonghieu.vn/miniapps/popuponload/jquery.popup.js"></script>
    <script type="text/javascript" >
        jQuery(window).load(function() {
            jQuery.noConflict();
            if(document.cookie.indexOf("adf")==-1) {
                document.cookie= "popunder1=adf";
                jQuery('#myModal').linhnguyen(jQuery('#myModal').data());
            }
        });
    </script>
    <div id="myModal" class="linhnguyen-modal">
        <img src="http://2.bp.blogspot.com/-eLSsK_4fUzg/Uk9dEo40_4I/AAAAAAAABfM/LcB3n6svA_s/s1600/popup-faceseo.jpg" />
        <a class="close-linhnguyen-modal">X</a>
    </div>
    <section class="section-1 container-fluid owl-carousel owl-theme">
    @foreach($sliders as $key => $slider)
    @if($key==0)
    <div class="item">
        <img src="{{asset('assets/img/'.$slider->image)}}" alt="">
        <div class="title-banner">
            <span>SALE 100%</span>
           <!--  <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti veritatis laborum fuga, velit!</span> -->
        </div>
    </div>
    @elseif($key==1)
    <div class="item">
        <img src="{{asset('assets/img/'.$slider->image)}}" alt="">
    </div>
    @else
    <div class="item">
        <img src="{{asset('assets/img/'.$slider->image)}}" alt="">
        <div class="product-banner">
            <div class="row">
                @foreach($product_hots as $product)
                <div class="col-md-3 ">
                    <div class="banner-item">
                        <div class="banner-item-img">
                            <img src="{{ asset('images/products/'.$product->image) }}" alt="">
                        </div>
                        <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->name }}</a>
                        <span>{{ number_format($product->sale)." VNĐ" }}</span>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-md-3 ">
                            <div class="banner-item">
                                <div class="banner-item-img">
                                    <img src="images/product-4.jpg" alt="">
                                </div>
                                <a href="#">váy font end</a>
                                <span>244.000 Đ</span>
                            </div>


                        </div>
                        <div class="col-md-3 ">
                            <div class="banner-item">
                                <div class="banner-item-img">
                                    <img src="images/product-2.jpg" alt="">
                                </div>
                                <a href="#">váy font end</a>
                                <span>244.000 Đ</span>
                            </div>


                        </div>
                        <div class="col-md-3 ">
                            <div class="banner-item">
                                <div class="banner-item-img">
                                    <img src="images/product-3.jpg" alt="">
                                </div>
                                <a href="#">váy font end</a>
                                <span>244.000 Đ</span>
                            </div>


                        </div>--}}
            </div>
        </div>
    </div>
    @endif
    @endforeach
</section>
<section class="section-2">
    <div class="container">
        <div class="row noibatsp">
        
                    <div class="col-md-3 col-sm-6 product">
                        <a href="{{ url('bosuutap/ngangu') }}" class="over-lay"></a>
                        <img src="{{asset('images/collections/bstthudong.jpg')}}" alt="">
                        <strong class="title-bst">THU - ĐÔNG</strong>
                        <p class="time-bst"> <i class="far fa-clock"></i>
                            <span> 18:00</span>
                            <span> 29/09/2019</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6 product">
                        <a href="{{ url('bosuutap/ngangu') }}" class="over-lay"></a>
                        <img src="{{asset('images/collections/bstxuanthu.jpg')}}" alt="">
                        <strong class="title-bst">XUÂN - THU</strong>
                        <p class="time-bst"> <i class="far fa-clock"></i>
                            <span> 19:00</span>
                            <span> 29/09/2019</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6 product">
                        <a href="{{ url('bosuutap/ngangu') }}" class="over-lay"></a>
                        <img src="{{asset('images/collections/AcWQ_collections_coll5.jpg')}}" alt="">
                        <strong class="title-bst">HÈ - THU</strong>
                        <p class="time-bst"> <i class="far fa-clock"></i>
                            <span> 20:00</span>
                            <span> 29/09/2019</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6 product">
                        <a href="{{ url('bosuutap/ngangu') }}" class="over-lay"></a>
                        <img src="{{asset('images/collections/2e2j_collections_coll2.jpg')}}" alt="">
                        <strong class="title-bst">XUÂN - HẠ</strong>
                        <p class="time-bst"> <i class="far fa-clock"></i>
                            <span> 16:32</span>
                            <span> 02/09/2019</span>
                        </p>
                    </div>
           
        </div>
    </div>
    <div class="container border-line">
        <span> # hàng mới về </span>
    </div>
    <div class="container">
        <div class="row sanphammoi">
            @foreach($product_news as $product)
                <div class="col-md-3 col-sm-6 col-6 new-product">
                    <div class="product-img">
                        <img src="{{asset('images/products/'.$product->image)}}" class="img1" alt="" width="208px" height="406px">
                        <div class="over-lay d-flex flex-column justify-content-center">
                            @guest
                                <a data-toggle="modal" data-target="#loginModal" ><i class="far fa-heart"></i></a>
                            @else
                              {{--@if($product->user_id)--}}
                            @endguest
                            <a href="{{ url('sanpham/'.$product->slug) }}">Mua ngay</a>
                        </div>
                    </div>


                    <div class="info-product d-flex flex-column justify-content-center">
                        <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->name }}</a>
                        <a href="{{ url('sanpham/'.$product->slug) }}">Mã hàng : {{ $product->code }}</a>
                        <a href="{{ url('sanpham/'.$product->slug) }}">{{ number_format($product->sale).' VNĐ' }}</a>
                    </div>
                </div>

            @endforeach
         {{--
            <div class="col-md-3 col-sm-6 col-6 new-product">
                <div class="product-img">
                    <img src="{{asset('images/products/'.$product->image)}}" alt="" width="208px" height="406px">
                    <div class="over-lay d-flex flex-column justify-content-center">
                        <a href=""><i class="far fa-heart"></i></a>
                        <a href="{{ url( 'chitietsanpham' )}}">Mua ngay</a>
                    </div>
                </div>


                <div class="info-product d-flex flex-column justify-content-center">
                    <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->name }}</a>
                    <a href="{{ url('sanpham/'.$product->slug) }}">Mã hàng : {{ $product->code }}</a>
                    <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->sale }}</a>
                </div>
            </div>

            @endforeach
            {{--
            <div class="col-md-3 col-sm-6 col-6 new-product">
                <div class="product-img">
                    <img src="{{asset('')}}images/product-3.jpg" alt="">
            <div class="over-lay d-flex flex-column justify-content-center">
                <a href=""><i class="far fa-heart"></i></a>
                <a href="{{ url( 'chitietsanpham' )}}">Mua ngay</a>
            </div>
        </div>


        <div class="info-product d-flex flex-column justify-content-center">
            <a href="#">váy đầm trẻ</a>
            <a href="#">Mã hàng : 1234jdfk12</a>
            <a href="#">440,000 Đ</a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 new-product">
        <div class="product-img">
            <img src="{{asset('')}}images/product-3.jpg" alt="">
            <div class="over-lay d-flex flex-column justify-content-center">
                <a href=""><i class="far fa-heart"></i></a>
                <a href="{{ url( 'chitietsanpham' )}}">Mua ngay</a>
                
            </div>
        </div>


        <div class="info-product d-flex flex-column justify-content-center">
            <a href="#">váy đầm trẻ</a>
            <a href="#">Mã hàng : 1234jdfk12</a>
            <a href="#">440,000 Đ</a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 new-product">
        <div class="product-img">
            <img src="{{asset('')}}images/product-3.jpg" alt="">
            <div class="over-lay d-flex flex-column justify-content-center">
                <a href=""><i class="far fa-heart"></i></a>
                <a href="{{ url( 'chitietsanpham' )}}">Mua ngay</a>
            </div>
        </div>


        <div class="info-product d-flex flex-column justify-content-center">
            <a href="#">váy đầm trẻ</a>
            <a href="#">Mã hàng : 1234jdfk12</a>
            <a href="#">440,000 Đ</a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 new-product">
        <div class="product-img">
            <img src="{{asset('')}}images/product-3.jpg" alt="">
            <div class="over-lay d-flex flex-column justify-content-center">
                <a href=""><i class="far fa-heart"></i></a>
                <a href="{{ url( 'chitietsanpham' )}}">Mua ngay</a>
            </div>
        </div>


        <div class="info-product d-flex flex-column justify-content-center">
            <a href="#">váy đầm trẻ</a>
            <a href="#">Mã hàng : 1234jdfk12</a>
            <a href="#">440,000 Đ</a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 new-product">
        <div class="product-img">
            <img src="{{asset('')}}images/product-3.jpg" alt="">
            <div class="over-lay d-flex flex-column justify-content-center">
                <a href=""><i class="far fa-heart"></i></a>
                <a href="{{ url( 'chitietsanpham' )}}">Mua ngay</a>
            </div>
        </div>


        <div class="info-product d-flex flex-column justify-content-center">
            <a href="#">váy đầm trẻ</a>
            <a href="#">Mã hàng : 1234jdfk12</a>
            <a href="#">440,000 Đ</a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 new-product">
        <div class="product-img">
            <img src="{{asset('')}}images/product-3.jpg" alt="">
            <div class="over-lay d-flex flex-column justify-content-center">
                <a href=""><i class="far fa-heart"></i></a>
                <a href="{{ url( 'chitietsanpham' )}}">Mua ngay</a>
            </div>
        </div>


        <div class="info-product d-flex flex-column justify-content-center">
            <a href="#">váy đầm trẻ</a>
            <a href="#">Mã hàng : 1234jdfk12</a>
            <a href="#">440,000 Đ</a>
        </div>
    </div>--}}

    </div> <!-- end sanphammoi -->
    <div class="show-more text-center mb-3">
        <a href="{{ url('loaisanpham/all') }}">Xem thêm</a>
    </div>
    </div>
</section>
<section class="section-3 container-fluid my-4">
    @foreach($sliders as $key => $slider)
        @if($key==0)
                <img src="{{asset('assets/img/'.$slider->image)}}" alt="">
        @endif
    @endforeach
             {{--   <div class="ss3-content">
                    <span>Chương trình khuyến mãi 20 / 10 / 2019</span>
                    <span>Giảm giá 20% - 02% từ 01/10 - 20/10</span>
                </div>
                <div class="show-more" style="margin-top : 20px;">
                        <a href="">Xem ngay</a>
                </div>--}}
        {{--<div class="col-md-6 ss3-img">
                <img src="{{asset('')}}images/banner-3.jpg" alt="">
                <div class="ss3-content">
                    <span>Bộ sưu tập đông hè 2019</span>
                    <span>Giảm giá 20% - 02% từ 01/10 - 20/10</span>



                </div>
                <div class="show-more" style="margin-top : 20px;">
                        <a href="">Xem ngay</a>
                </div>
        </div>--}}
</section>

<div class="container border-line">
    <span> # Xu hướng thời trang </span>
</div>
<section class="section-4">
    <div class="container fashion owl-carousel owl-theme">
        @foreach($product_hots as $product)
        <div class="item new-product">
            <div class="product-img">
                <img src="{{asset('images/products/'.$product->image)}}" alt="" width="208px" height="406px">
                <div class="over-lay d-flex flex-column justify-content-center">
                    @guest
                        <a data-toggle="modal" data-target="#loginModal" ><i class="far fa-heart"></i></a>
                    @else
                        <a href="" style="color: red"><i class="far fa-heart"></i></a>
                    @endguest

                    <a href="{{ url('sanpham/'.$product->slug) }}">Mua ngay</a>
                    <a href="{{ url('sanpham/'.$product->slug) }}">Xem ngay</a>
                </div>
            </div>
            <div class="info-product d-flex flex-column justify-content-center">
                <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->name }}</a>
                <a href="{{ url('sanpham/'.$product->slug) }}">Mã hàng : {{ $product->code }}</a>
                <a href="{{ url('sanpham/'.$product->slug) }}">{{ number_format($product->sale).' VNĐ' }}</a>
            </div>
        </div>

        @endforeach
        {{--<div class="item new-product">
            <div class="product-img">
                <img src="{{asset('')}}images/product-3.jpg" alt="">
        <div class="over-lay d-flex flex-column justify-content-center">
            <a href=""><i class="far fa-heart"></i></a>
            <a href="">Mua ngay</a>
            <a href="#">Xem ngay</a>
        </div>
    </div>
    <div class="info-product d-flex flex-column justify-content-center">
        <a href="#">váy đầm trẻ</a>
        <a href="#">Mã hàng : 1234jdfk12</a>
        <a href="#">440,000 Đ</a>
    </div>
    </div>
    <div class="item new-product">
        <div class="product-img">
            <img src="{{asset('')}}images/product-3.jpg" alt="">
            <div class="over-lay d-flex flex-column justify-content-center">
                <a href=""><i class="far fa-heart"></i></a>
                <a href="">Mua ngay</a>
                <a href="#">Xem ngay</a>
            </div>
        </div>
        <div class="info-product d-flex flex-column justify-content-center">
            <a href="#">váy đầm trẻ</a>
            <a href="#">Mã hàng : 1234jdfk12</a>
            <a href="#">440,000 Đ</a>
        </div>
    </div>
    <div class="item new-product">
        <div class="product-img">
            <img src="{{asset('')}}images/product-3.jpg" alt="">
            <div class="over-lay d-flex flex-column justify-content-center">
                <a href=""><i class="far fa-heart"></i></a>
                <a href="">Mua ngay</a>
                <a href="#">Xem ngay</a>
            </div>
        </div>
        <div class="info-product d-flex flex-column justify-content-center">
            <a href="#">váy đầm trẻ</a>
            <a href="#">Mã hàng : 1234jdfk12</a>
            <a href="#">440,000 Đ</a>
        </div>
    </div>
    <div class="item new-product">
        <div class="product-img">
            <img src="{{asset('')}}images/product-3.jpg" alt="">
            <div class="over-lay d-flex flex-column justify-content-center">
                <a href=""><i class="far fa-heart"></i></a>
                <a href="">Mua ngay</a>
                <a href="#">Xem ngay</a>
            </div>
        </div>
        <div class="info-product d-flex flex-column justify-content-center">
            <a href="#">váy đầm trẻ</a>
            <a href="#">Mã hàng : 1234jdfk12</a>
            <a href="#">440,000 Đ</a>
        </div>
    </div>--}}
    </div>
</section>
<div class="container border-line">
    <span> # Tin tức nổi bật </span>
</div>
<section class="section-4">
        <div class="container fashion owl-carousel owl-theme">
            @foreach($new_posts as $key =>$value)
            <div class=" item product">
                <div class="tinnoibat">
                    <img src="{{asset('images/news/'.$value->image)}}" class="img_new" alt="">
                    <div class="over-lay">
                    </div>
                </div>

                <div class="product-info d-flex flex-column text-center">
                    <a href="{{ url('tintuc/'.$value->slug) }}">{{ $value->title }}</a>
                    <a href="{{ url('tintuc/'.$value->slug) }}">{{ $value->summary }}</a>
                    <a href="{{ url('tintuc/'.$value->slug) }}">Xem ngay</a>

                </div>


            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="container border-line">
    {{-- <span> # Thông tin nổi bật </span> --}}
</div>
<div class="section-5">
    <div class="container contact owl-carousel owl-theme">
        <div class="item">
            <img src="{{asset('')}}images/logo-contact-1.png" alt="">
        </div>
        <div class="item">
            <img src="{{asset('')}}images/logo-contact-2.png" alt="">
        </div>
        <div class="item">
            <img src="{{asset('')}}images/logo-contact-4.png" alt="">
        </div>
        <div class="item">
            <img src="{{asset('')}}images/logo-contact-5.png" alt="">
        </div>

    </div>
</div>
<script type="text/javascript" src="{{asset('')}}lib/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('')}}lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{asset('')}}js/carousel.js"></script>
@endsection
