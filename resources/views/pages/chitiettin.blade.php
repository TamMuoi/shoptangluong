@extends('master-layout')
@section('title')
    {{ $new->title }}
@endsection
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 product-page d-flex flex-column">
                    <h4 class="text-uppercase mt-3 ">{{ $new->title }}</h4>

                    <div class="tintuc-item">
                        <span>{{ $new->created_at }}</span>
                        <hr>
                        <div><b>{{ $new->summary }}</b></div>
                        <br>
                        <div>{!! $new->content !!}</div>
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
                            <h5>Tag:</h5>
                            @foreach($tags as $tag)
                                <a class="chip pink lighten-4"><i class="fa fa-tags"></i>{{ $tag->name }}</a>
                            @endforeach
                        </div>

                    </div>
                {{--
                <div class="tintuc-item">
                    <a href="#">cuộc sống</a>
                    <span>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus dolor aperiam, alias
                        beatae, enim eius est dolorum sunt assumenda, quasi placeat officiis quibusdam exercitationem id
                        doloribus? Eos possimus voluptates quasi! Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Maiores beatae tempora nemo dicta, harum inventore velit quos nisi fugit deserunt placeat
                        obcaecati dolor illum non rerum reprehenderit voluptatum, ex odit.
                    </span>
                    <span>
                        GMT + 7 , 21 / 07 / 2019 , Hà Nội
                    </span>
                    <img src="images/new1.jpg" alt="">
                    <div class="show-more text-center mt-3">
                        <a href="#">Xem thêm</a>
                    </div>
                </div>
                <div class="tintuc-item">
                    <a href="#">Du lich 2019 </a>
                    <span>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus dolor aperiam, alias
                        beatae, enim eius est dolorum sunt assumenda, quasi placeat officiis quibusdam exercitationem id
                        doloribus? Eos possimus voluptates quasi! Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Maiores beatae tempora nemo dicta, harum inventore velit quos nisi fugit deserunt placeat
                        obcaecati dolor illum non rerum reprehenderit voluptatum, ex odit.
                    </span>
                    <span>
                        GMT + 7 , 21 / 07 / 2019 , Hà Nội
                    </span>
                    <img src="images/new1.jpg" alt="">
                    <div class="show-more text-center mt-3">
                        <a href="#">Xem thêm</a>
                    </div>
                </div>
                <div class="tintuc-item">
                    <a href="#">Thời trang 2019 </a>
                    <span>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus dolor aperiam, alias
                        beatae, enim eius est dolorum sunt assumenda, quasi placeat officiis quibusdam exercitationem id
                        doloribus? Eos possimus voluptates quasi! Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Maiores beatae tempora nemo dicta, harum inventore velit quos nisi fugit deserunt placeat
                        obcaecati dolor illum non rerum reprehenderit voluptatum, ex odit.
                    </span>
                    <span>
                        GMT + 7 , 21 / 07 / 2019 , Hà Nội
                    </span>
                    <img src="images/new1.jpg" alt="">
                    <div class="show-more text-center mt-3">
                        <a href="#">Xem thêm</a>
                    </div>
                </div>--}}


            </div>


        </div>

    </div>
</div>

<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>

@endsection
