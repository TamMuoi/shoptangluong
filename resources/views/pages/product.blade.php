@extends('master-layout')
@section('title')
    @isset($cate)
        {{ $cate->name }}
    @else
        Tất Cả Sản Phẩm
    @endisset
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
                    <div class="d-flex">



                        <div class="select-show">
                            <a id="menu" onclick="menu" class="btn"><i class="fas fa-th grid"></i></a>
                            <a id="danhsach" onclick="danhsach" class="btn"><i class=" fas fa-bars list ml-3"></i></a>
                        </div>

                    </div>
                    <div class="chose d-flex">
                        <div>
                            <span>hiển thị</span>
                            <select id="hienthi" onchange="hienthisanpham(this)">
                                <option >--Hiển thị--</option>
                                <option value="0">0</option>
                                <option value="8">8</option>
                                <option value="16">16</option>
                                <option value="32">32</option>
                            </select>

                        </div>
                        <div>
                            <span>sắp xếp theo</span>
                            <select onchange="sapxep(this)">
                                <option value="pay,desc">Bán Chạy Nhất</option>
                                <option value="price_sale,desc">Giá, Tăng Dần</option>
                                <option value="price_sale,asc">Giá, Giảm Dần</option>
                                <option value="name,desc">Thứ tự, A-Z</option>
                                <option value="name,asc">Thứ tự, Z-A</option>
                                <option value="id,asc">Cũ Nhất</option>
                                <option value="id,desc">Mới Nhất</option>

                            </select>
                        </div>
                        <script>
                            function hienthisanpham(obj) {
                                //alert(obj.value);
                                @isset($cate->id)
                                    var cate_id= {{ $cate->id }};
                                @else
                                    var cate_id= "";
                                @endisset

                                var agrs = {
                                    url: "{{ url('showproduct/') }}", // gửi ajax đến file result.php
                                    type: "post", // chọn phương thức gửi là post
                                    dataType: "text", // dữ liệu trả về dạng text
                                    data: { // Danh sách các thuộc tính sẽ gửi đi
                                        _token: '{{ csrf_token() }}',
                                        collections: null,
                                        cate: cate_id,
                                        number: obj.value,
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
                            };
                            function sapxep(obj) {
                                var x= obj.value.split(',');
                                @isset($cate->id)
                                    var cate_id= {{ $cate->id }};
                                @else
                                    var cate_id= "";
                                @endisset
                                //alert(cate_id);

                                var agrs = {
                                    url: "{{ url('sapxep/') }}", // gửi ajax đến file result.php
                                    type: "post", // chọn phương thức gửi là post
                                    dataType: "text", // dữ liệu trả về dạng text
                                    data: { // Danh sách các thuộc tính sẽ gửi đi
                                        _token: '{{ csrf_token() }}',
                                        collections: null,
                                        cate: cate_id,
                                        value: x[0],
                                        method: x[1],
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
