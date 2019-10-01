@extends('master-layout')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div class="container gioithieu d-flex flex-column">
    <h4 class="text-left text-uppercase">Giới thiệu</h4>
    <span>{!! $introduce->content !!}</span>

    {{-- <span>Công ty chúng tôi luôn mang đến giá trị tốt nhất cho bạn</span>
    <span>
        Nội dung Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias accusantium ipsam, voluptates
        officiis sequi
        sit. Ullam, consequuntur! Alias et impedit saepe vel quidem ab temporibus, expedita consequuntur aliquam ullam
        dicta.

    </span>
    <a href="#" class="my-2 text-uppercase ">Hệ thống cửa hàng của chúng tôi</a>
    <div class="cuahang">
        <ul>
            <li>Cơ sở chính</li>
            <li>Địa chỉ : 34 , Phạm văn đồng , hà nội </li>
            <li>SDT : 01223423255 </li>
        </ul>
        <ul>
            <li>Của hàng số 1</li>
            <li>Địa chỉ : 34 , Phạm văn đồng , hà nội </li>
            <li>SDT : 01223423255 </li>
        </ul>
        <ul>
            <li>Của hàng số 2</li>
            <li>Địa chỉ : 34 , Phạm văn đồng , hà nội </li>
            <li>SDT : 01223423255 </li>
        </ul>

    </div>--}}
</div>
<div class="container"> 
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
          @foreach ($sliders as $key=>$slider)
          {{-- {{dd($sliders)}} --}}
            <div class="item @if ($key==0)
                active
            @endif" >
                <img src="{{asset('assets/img/'.$slider->image)}}" style="width:100%;">
            </div>
          @endforeach
        {{-- <div class="item active">
          <img src="http://wowslider.com/sliders/demo-77/data1/images/field175959_1920.jpg" alt="Los Angeles" style="width:100%;">
        </div>
  
        <div class="item">
          <img src="http://wowslider.com/sliders/demo-77/data1/images/field175959_1920.jpg" alt="Chicago" style="width:100%;">
        </div>
      
        <div class="item">
          <img src="http://wowslider.com/sliders/demo-77/data1/images/field175959_1920.jpg" alt="New york" style="width:100%;">
        </div> --}}
      </div>
  
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  
@endsection
