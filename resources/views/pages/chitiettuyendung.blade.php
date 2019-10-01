@extends('master-layout')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 product-page d-flex flex-column">
                <h4 class="text-uppercase mt-3 ">{{ $recruitment->title }}</h4>
                <div class="row">
                    <div class="col-12">
                        <span>{{ $recruitment->begin_time }} <b>to</b> {{$recruitment->end_time }}</span>
                        <hr>
                        <div><b>Vị trí: </b> {{ $recruitment->position }}</div>

                        <div><b>Mức Lương: </b> {{ number_format($recruitment->salary)." VNĐ" }}</div>
                        <div><b>Giờ làm việc: </b>
                            @if($recruitment->work_time==1)
                                FullTime
                            @else
                                PartTime
                            @endif
                        </div>
                        <hr>
                        <div>{!! $recruitment->content !!}</div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                                @if(isset($pre))
                                    <a href="{{url('')}}/tintuc/{{ $pre->slug }}" title=""><i class="fas fa-sign-out-alt"></i>Tin Trước</a>
                                @endif
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4" style="text-align: center;">
                                <a href="{{url('')}}/loaitin/all" title="">Tất cả tin tức</a>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4" style="text-align: right;">
                                @if(isset($next))
                                    <a href="{{url('')}}/tintuc/{{ $next->slug }}" title=""><i class="fas fa-sign-in-alt"></i>Tin sau</a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div><a href="">Liên hệ ngay</a></div>
                            <h5>Tag:</h5>
                            @foreach($tags as $tag)
                                <a class="chip pink lighten-4"><i class="fa fa-tags"></i>{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <hr>

                    </div>



                </div>
                <div class="show-more text-center mb-3">

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
