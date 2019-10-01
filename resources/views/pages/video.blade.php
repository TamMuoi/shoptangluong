@extends('master-layout')
@section('title')
    Video về chúng tôi
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 product-page d-flex flex-column">
                <h4 class="text-uppercase mt-3 ">Video về chúng tôi</h4>

                <div class="row xapsep">
                    <div class="col-12 video  " id="vv">
                      {!! $introduce->video !!}

                    </div>


                </div>
                @if($introduce->youtube=='null')
                   <div class="show-more text-center mb-3">
                       <a target="_blank" href="{{ $introduce->youtube }}">Xem thêm</a>
                   </div>
                @endif
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="js/danhsach.js"></script>
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
@endsection
