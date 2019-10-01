@extends('master-layout')
@section('title')
    @isset($collections)
        {{ $collections->name }}
    @else
        Tất Cả Sản Phẩm
    @endisset
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 product-page d-flex flex-column">
                    @isset($collections)
                        <h4 class="text-uppercase mt-3 ">{{ $collections->name }}</h4>
                    @else
                        <h4 class="text-uppercase mt-3 ">Tất cả Bộ sưu Tập</h4>
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
                                                <option>--hiển thị--</option>
                                                <option value="0">0</option>
                                                <option value="8">8</option>
                                                <option value="16">16</option>
                                                <option value="32">32</option>
                                            </select>
                                            <script>
                                                 function hienthisanpham(obj) {
                                                     //alert(obj.value);
                                                     @isset($collection->id)
                                                        var collection_id= {{ $collections->id }};
                                                     @else
                                                        var collection_id= "";
                                                     @endisset

                                                     var agrs = {
                                                             url: "{{ url('showproduct/') }}", // gửi ajax đến file result.php
                                                             type: "post", // chọn phương thức gửi là post
                                                             dataType: "text", // dữ liệu trả về dạng text
                                                             data: { // Danh sách các thuộc tính sẽ gửi đi
                                                                 _token: '{{ csrf_token() }}',
                                                                 collections: collection_id,
                                                                 cate: null,
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
                                                 }
                                                 function sapxep(obj) {
                                                     var x= obj.value.split(',');
                                                     @isset($collection->id)
                                                        var collection_id= {{ $collections->id }};
                                                     @else
                                                         var collection_id= "";
                                                     @endisset
                                                     //alert(collection_id);

                                                     var agrs = {
                                                         url: "{{ url('sapxep/') }}", // gửi ajax đến file result.php
                                                         type: "post", // chọn phương thức gửi là post
                                                         dataType: "text", // dữ liệu trả về dạng text
                                                         data: { // Danh sách các thuộc tính sẽ gửi đi
                                                             _token: '{{ csrf_token() }}',
                                                             collections: collection_id,
                                                             cate: null,
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
                                        <div>
                                            <span>sắp xếp theo</span>
                                            <select onchange="sapxep(this)">
                                                <option>--sắp xếp theo--</option>
                                                <option value="pay,desc">Bán Chạy Nhất</option>
                                                <option value="sale,desc">Giá, Tăng Dần</option>
                                                <option value="sale,asc">Giá, Giảm Dần</option>
                                                <option value="name,desc">Thứ tự, A-Z</option>
                                                <option value="name,asc">Thứ tự, Z-A</option>
                                                <option value="id,asc">Cũ Nhất</option>
                                                <option value="id,desc">Mới Nhất</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div >
                                    <div class="container">
        <div class="row noibatsp">
        
                    <div class="col-md-3 col-sm-6 product">
                        <a href="{{ url('bosuutap/thu-dong') }}" class="over-lay"></a>
                        <img src="{{asset('images/collections/a6IB_collections__07A6547b.jpg')}}" alt="">
                        <strong class="title-bst">THU - ĐÔNG</strong>
                        <p class="time-bst"> <i class="far fa-clock"></i>
                            <span> 16:32</span>
                            <span> 02/09/2018</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6 product">
                        <a href="{{ url('bosuutap/thu-dong') }}" class="over-lay"></a>
                        <img src="{{asset('images/collections/g8a9_collections__07A6711a.jpg')}}" alt="">
                        <strong class="title-bst">THU - ĐÔNG</strong>
                        <p class="time-bst"> <i class="far fa-clock"></i>
                            <span> 16:32</span>
                            <span> 02/09/2018</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6 product">
                        <a href="{{ url('bosuutap/thu-dong') }}" class="over-lay"></a>
                        <img src="{{asset('images/collections/lYCa_collections_48393724_2019302078361597_6044789207782653952_n.jpg')}}" alt="">
                        <strong class="title-bst">THU - ĐÔNG</strong>
                        <p class="time-bst"> <i class="far fa-clock"></i>
                            <span> 16:32</span>
                            <span> 02/09/2018</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6 product">
                        <a href="{{ url('bosuutap/thu-dong') }}" class="over-lay"></a>
                        <img src="{{asset('images/collections/6o7q_collections_56457745_2078306345794503_5636796052288831488_n.jpg')}}" alt="">
                        <strong class="title-bst">THU - ĐÔNG</strong>
                        <p class="time-bst"> <i class="far fa-clock"></i>
                            <span> 16:32</span>
                            <span> 02/09/2018</span>
                        </p>
                    </div>
           
        </div>
    </div>
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
