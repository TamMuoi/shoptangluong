@extends('master-layout')
@section('title')
    Sản phẩm Khuyến mãi
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 product-page d-flex flex-column">
                @isset($cate)
                    <h4 class="text-uppercase mt-3 ">{{ $cate->name }}</h4>
                @else
                    <h4 class="text-uppercase mt-3 ">Tất cả sản phẩm</h4>
                @endisset

                <div class="product-menu d-flex justify-content-between">
                    <div class="d-flex"

                        <span class="mx-4 mt-2"></span>


                        <div class="select-show">
                            <a id="menu" onclick="menu" class="btn"><i class="fas fa-th grid"></i></a>
                            <a id="danhsach" onclick="danhsach" class="btn"><i class=" fas fa-bars list ml-3"></i></a>
                        </div>

                    </div>
                    <div class="chose d-flex">
                        <div>
                            <span>KHuyến Mại từ</span>
                            <select id="saledown" onchange="selectsale(this)">
                                <option >--Từ--</option>
                                @for($i =10; $i<=100; $i+=10)
                                <option value="{{ $i }}">{{$i."%"}}</option>
                                @endfor
                            </select>
                        </div>
                        <div id="saleuphide" class="hide">
                            <span>Tới</span>
                            <select id="saleup" name="skill_level_up">
                            </select>
                            <button class="fa fa-search" onclick="sale()" style="padding: 3px;"></button>
                        </div>
                        <script>
                            function selectsale(obj) {

                                var hide= document.querySelector('#saleuphide');



                                var html='';

                                var x=parseInt(obj.value) +10;
                                for(var i=x; i<=100; i=i+10){
                                    html +='<option value="'+i+'">'+i+'%</option>'
                                }

                                document.getElementById('saleup').innerHTML = html;
                                hide.classList.remove('hide');
                            };
                            function sale() {
                                //alert(cate_id);

                                var agrs = {
                                    url: "{{ url('sale') }}", // gửi ajax đến file result.php
                                    type: "post", // chọn phương thức gửi là post
                                    dataType: "text", // dữ liệu trả về dạng text
                                    data: { // Danh sách các thuộc tính sẽ gửi đi
                                        _token: '{{ csrf_token() }}',
                                        saledown: $('#saledown').val(),
                                        saleup: $('#saleup').val(),

                                    },
                                    success: function (result) {
                                        // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                                        // đó vào thẻ div có id = result
                                        $('#sanpham').html(result);
                                        $("#links").hide() ;
                                    }
                                };

                                // Truyền object vào để gọi ajax
                                $.ajax(agrs);
                            }

                        </script>

                    </div>
                </div>
                <div class="row xapsep" id="sanpham">
                    @foreach($products as $value)
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
                <div class="show-more text-center mb-3" id="links">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/danhsach.js"></script>
    <script type="text/javascript" src="lib/jquery.min.js"></script>
    <script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/carousel.js"></script>
    <script type="text/javascript" src="js/menu-mobile.js"></script>
    @endsection
