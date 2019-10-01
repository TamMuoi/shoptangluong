@extends('master-layout')
@section('title')
    Tuyển dụng
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 product-page d-flex flex-column">
                <h4 class="text-uppercase mt-3 ">tuyển dụng</h4>
                <div class="row">
                    <div class="col-12">
                        @foreach($recruitments as $value)
                        <div class="tuyendung-box">
                            <img src="{{ asset('images/recruitment/'.$value->image) }}" alt="">
                            <div class="tt-tuyendung">

                                    <span>{{ $value->title }}</span>
                                    <span><i class="fas fa-map-marker-alt"></i>236 Hoàng Quốc Việt</span>
                                    <a href="{{ url('tuyendung'.$value->slug) }}">Xem ngay</a>
                            </div>
                        </div>
                        @endforeach
                       {{-- <div class="tuyendung-box">
                                <img src="images/product-1.jpg" alt="">
                                <div class="tt-tuyendung">
                                        <span> Bán hàng part time 22h - 6h </span>
                                        <span><i class="fas fa-map-marker-alt"></i>236 Hoàng Quốc Việt</span>
                                        <a href="{{ url('tuyendungdetaits') }}">Xem ngay</a>
                                </div>
                            </div>
                            <div class="tuyendung-box">
                                    <img src="images/product-1.jpg" alt="">
                                    <div class="tt-tuyendung">
                                            <span> Bán hàng part time 22h - 6h </span>
                                            <span><i class="fas fa-map-marker-alt"></i>236 Hoàng Quốc Việt</span>
                                            <a href="{{ url('tuyendungdetaits') }}">Xem ngay</a>
                                    </div>
                                </div>--}}

                    </div>



                </div>
                <div class="show-more text-center mb-3">
                   {{ $recruitments->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="js/danhsach.js"></script>
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
@endsection
