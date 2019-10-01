@extends('master-layout')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 product-page d-flex flex-column">
                <h4>Có {{ $count }} kết quả với từ khóa: {{ $key }}</h4>
                <hr>
            @if($countproducts!=0)

                <div class="product-menu d-flex justify-content-between">
                    <div class="d-flex"



                        <div class="select-show">
                            <a id="menu" onclick="menu" class="btn"><i class="fas fa-th grid"></i></a>
                            <a id="danhsach" onclick="danhsach" class="btn"><i class=" fas fa-bars list ml-3"></i></a>
                        </div>

                    </div>
                </div>
            <h5>Có {{ $countproducts }} Sản phẩm với từ khóa: {{ $key }}</h5>
            <hr>
                <div class="row xapsep" id="sanpham">

                    @foreach($searchproducts as $value)
                    <div class="col-md-3  col-sm-6 col-6 new-product " id="vv">
                        <div class="product-img">
                            <img src="{{asset('images/products/'.$value->image)}}" alt="" style="height: 310px;">
                            <div class="over-lay d-flex flex-column justify-content-center">
                                <a href=""><i class="far fa-heart"></i></a>
                                <a href="{{ url( 'sanpham/'.$value->slug )}}">Mua ngay</a>
                            </div>

                        </div>
                        <div class="info-product d-flex flex-column justify-content-center">
                            <a href="{{url( 'sanpham/'.$value->slug )}}">{{ $value->name }}</a>
                            <a href="{{url( 'sanpham/'.$value->slug )}}">Mã hàng : {{ $value->code }}</a>
                            <a href="{{url( 'sanpham/'.$value->slug )}}">{{ number_format($value->sale)." VNĐ" }}</a>
                            <a href="{{url( 'sanpham/'.$value->slug )}}">Mua ngay</a>
                        </div>
                    </div>
                 @endforeach
                </div>
            @endif
            @if($countnews!=0)
                <h5>Có {{ $countnews }} Bài Viết với từ khóa: {{ $key }}</h5>
                <hr>
            <div class="row">
                @foreach($searchnews as $new)
                    <div class="tintuc-item col-6">
                        <a href="{{ url('tintuc/'.$new->slug) }}">{{ $new->title }}</a>
                        <span>{{ $new->summary }}</span>
                        <span>{{ $new->created_at }}</span>
                        <img src="{{ asset('images/news/'.$new->image) }}" alt="">
                        <div class="show-more text-center mt-3">
                            <a href="{{ url('tintuc/'.$new->slug) }}">Xem thêm</a>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
            @if($countrecruitments !=0)
                <h5>Có {{ $countrecruitments }} tin tuyển dụng với từ khóa: {{ $key }}</h5>
                <hr>
                <div class="row">
                    @foreach($searchcruitments as $new)
                        <div class="tintuc-item col-6">
                            <a href="{{ url('tintuc/'.$new->slug) }}">{{ $new->title }}</a>
                            <span>{{ $new->summary }}</span>
                            <span>{{ $new->created_at }}</span>
                            <img src="{{ asset('images/news/'.$new->image) }}" alt="">
                            <div class="show-more text-center mt-3">
                                <a href="{{ url('tintuc/'.$new->slug) }}">Xem thêm</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        </div>
    </div>
    <script type="text/javascript" src="js/danhsach.js"></script>
    <script type="text/javascript" src="lib/jquery.min.js"></script>
    <script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/carousel.js"></script>
    <script type="text/javascript" src="js/menu-mobile.js"></script>
    @endsection
