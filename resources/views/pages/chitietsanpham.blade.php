@extends('master-layout')
@section('title')
    {{ $product->name }}
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('xzoom/xzoom.css') }}">
    <style>
        .quantity{
            width: 100%;
            text-align: center;
            background: none;
            border: none;
            color: white;
        }
        * {box-sizing: border-box;}

        .img-zoom-container {
        position: relative;
        }

        .img-zoom-lens {
        position: absolute;
        border: 1px solid #d4d4d4;
        /*set the size of the lens:*/
        width: 40px;
        height: 40px;
        }

        .img-zoom-result {
        border: 1px solid #d4d4d4;
        /*set the size of the result div:*/
        width: 300px;
        height: 300px;
        }

    </style>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 product-page d-flex flex-column">
                <h4 class="text-uppercase my-3 ">Sản phẩm chi tiết</h4>

                <div class="responve-caroulsel">
                   {{-- <div class="col-md-5">
                    <div class="carousel-item active">
                        <img src="{{asset('images/products/'.$product->image)}}" alt="">
                    </div>
                    </div>--}}


                     <div class="col-md-5" id="imageproduct">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="img-zoom-container xzoom zoom-box">
                                        <img id="myimage" class="xzoom-1" src="{{asset('images/products/'.$product->image)}}" xoriginal="{{asset('images/products/'.$product->image)}}" width="300" height="">
                                    <script>
                                        $(function () {
                                            $('.xzoom-1').xzoom();
                                        });
                                    </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                   {{-- <form action="#" method="post" name="">
                        @csrf
                        <input type="hidden" name="productid" value="{{ $product->id }}" />--}}
{{--
                    <div class="flex-column img-zoom-result" id="myresult" style="display: none; margin-left: 50%; color:blue; position: absolute;z-index: 999;">
--}}
                    <div style="z-index:0; position: inherit;">
                        <h4>{{ $product->name }}</h4>
                        <span class="gia">{{ number_format($product->sale)." VNĐ" }}</span>
                        <input id="sale" type="hidden" value="{{ $product->sale }}"><br>
                        <span class="">Sale :  {{ 100-($product->sale/$product->price)*100 }}%</span><br>
                        <b>Giá cũ :</b> <p class="" style="  text-decoration: line-through;">{{ number_format($product->price)." VNĐ" }}</p>
                        <span>Mã hàng : {{ $product->code }}</span>
                        
                        <div class="form-group mt-3" >
                            <label for="1">Màu sắc:</label>
                            @foreach($colors as $color)
                            <button class="btn has-color" id="color{{$color->colorid}}" onclick="selectcolor({{ $color->colorid }})">{{ $color->name }}</button>
                            @endforeach
                            <input id="productcolor" type="hidden" value="0">
                                    <script>
                                        function selectcolor(colorid){
                                            var x= document.querySelector('.active-color');
                                            if(x!=null) {
                                                x.classList.remove('active-color');
                                            }
                                            var chosesize= document.querySelector('#chosesize');
                                            $.get('{{ url('selectsize/') }}/' + colorid, function (data) {
                                                $("#sizeproduct").html(data)
                                                chosesize.classList.remove('hide');
                                            });
                                           $.get('{{ url('selectcolor/') }}/' + colorid + '/{{ $product->id }}', function (data) {
                                               $("#product-carousel").html(data);
                                           });
                                           $('#productcolor').val(colorid);
                                           document.querySelector('#color'+colorid).classList.add('active-color');
                                        };
                                    </script>
                                {{--<option>Green</option>--}}
                            <div id="chosesize" class="hide">
                            <label for="1">Kích cỡ:</label>
                            <div id="sizeproduct" >
                            </div>
                                <p style="color: red" id="hetsize"></p>
                                <input id="selectsize" type="hidden" value="0">
                                <input id="quantitynow" type="hidden" value="0">
                            <script>
                                function selectsize(sizeid) {
                                        {{--alert('{{ $product->id }}');--}}
                                   var quantity = document.querySelector('#quantityselect');
                                    var error = document.querySelector('#errorquantity');
                                    //$('#quantitynow').val(obj.value);
                                    var agrs = {
                                        url: "{{ url('quantity') }}", // gửi ajax đến file result.php
                                        type: "post", // chọn phương thức gửi là post
                                        dataType: "text", // dữ liệu trả về dạng text
                                        data: { // Danh sách các thuộc tính sẽ gửi đi
                                            _token: '{{ csrf_token() }}',
                                            product: '{{ $product->id }}',
                                            color: $('#productcolor').val(),
                                            size: sizeid,
                                        },
                                        success: function (result) {
                                            //$('#errorquantity').html(result);
                                            if(result!=0) {
                                                quantity.classList.remove('hide');
                                                error.classList.remove('alert');
                                                error.classList.remove('alert-danger');
                                                error.innerHTML = '';
                                                $('#quantitynow').val(result);
                                                document.getElementById('quantity').value = 1;
                                                document.getElementById('total').innerHTML = '{{ number_format($product->sale) }}' + ' VNĐ';
                                                $('#hetsize').html('');
                                            }
                                            else{
                                                $('#quantitynow').val(result);
                                                $('#hetsize').html('<p style="color: red">Size này đã tạm thời hết hàng!</p>');
                                                quantity.classList.add('hide');
                                            }
                                        }
                                    };
                                    $.ajax(agrs);$('#selectsize').val(sizeid);
                                }
                            </script>
                            </div>
                        </div>
                        

                        <div id="quantityselect" class="hide">
                            @csrf
                            <h6>Số lượng</h6>
                            <input name="quantity" class="form-control" id="quantity" type="number" value="1" onchange="cost(this)">
                            <script>

                                function cost(obj) {
                                    var error = document.querySelector('#errorquantity');
                                    //alert($('#quantitynow').val());
                                    if(obj.value <1){
                                        error.classList.remove('hide');
                                        error.classList.add('alert');
                                        error.classList.add('alert-danger');
                                        error.innerHTML='bạn không thể chọn số lượng nhỏ hơn 1';
                                        obj.value= 1;
                                    }
                                    else if(obj.value > $('#quantitynow').val() ) {
                                        error.classList.remove('hide');
                                        error.classList.add('alert');
                                        error.classList.add('alert-danger');
                                        error.innerHTML='Sản phảm trong kho không đủ!';
                                        obj.value= $('#quantitynow').val();
                                    }else{
                                        error.classList.add('hide');
                                        var total = parseInt(obj.value) * parseInt($('#sale').val());
                                        document.getElementById('total').innerHTML = total.toLocaleString() + ' VNĐ';
                                    }
                                }
                            </script>
                            <h6>
                                Số tiền :   <span id="total"> {{ number_format($product->sale). " VNĐ" }}</span>
                            </h6>
                        </div>
                        <div id="errorquantity"></div>
                    </div>

                </div>
                <hr>
                <div class="form-group mt-3">
                    <label for="1">Mô tả:</label>
                    <div class="describe">
                        {{ $product->describe }}
                    <hr>
                    </div>
                </div>
                <div id="errorcart"></div>
                <div class="show-more text-center mb-3" id="actionaddcart">
                    <button class="btn btn-outline-success" onclick="addcart()">Thêm vào giỏ hàng</button>
                </div>
                <div id="addcartsuccess" style="text-align: center" class="hide">
                    <a class="btn btn-outline-primary" href="{{ url('trang-chu') }}">Tiếp tục mua sắm</a>
                    <a class="btn btn-outline-success" href="{{ url('cart') }}">Tới giỏ hàng</a>
                </div>

                <script>
                    function addcart() {
                        //alert($('#productcolor').val());
                        var errorcart= document.querySelector('#errorcart');
                        var actionaddcart= document.querySelector('#actionaddcart');
                        var done= document.querySelector('#addcartsuccess');
                        errorcart.classList.add('alert');
                        if($('#productcolor').val() === '0'){
                            errorcart.classList.remove('alert-success');
                            errorcart.classList.add('alert-danger');
                            errorcart.innerHTML='Bạn chưa chọn Màu!';
                        }
                        else if($('#selectsize').val() === '0'){
                            errorcart.classList.remove('alert-success');
                            errorcart.classList.add('alert-danger');
                            errorcart.innerHTML='Bạn chưa chọn size!';
                        }
                        else {
                            var agrs = {
                                url: "{{ url('addcart') }}", // gửi ajax đến file result.php
                                type: "post", // chọn phương thức gửi là post
                                dataType: "text", // dữ liệu trả về dạng text
                                data: { // Danh sách các thuộc tính sẽ gửi đi
                                    _token: '{{ csrf_token() }}',
                                    id: {{ $product->id }},
                                    color: $('#productcolor').val(),
                                    size: $('#selectsize').val(),
                                    quantity: $('#quantity').val(),
                                },
                                success: function (result) {
                                    // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                                    // đó vào thẻ div có id = result
                                    errorcart.classList.remove('alert-danger');
                                    errorcart.classList.add('alert-success');
                                    errorcart.innerHTML='Thêm vào giỏ hàng thành công!';
                                    done.classList.remove('hide');
                                    actionaddcart.classList.add('hide');

                                }
                            };

                            // Truyền object vào để gọi ajax
                            $.ajax(agrs);
                        }
                    }
                </script>
                <div class="container border-line">
                    <span> # Sản phẩm liên quan </span>
                </div>
                <div class="sp-lienquan owl-carousel owl-theme">
                @foreach($lienquan as $product)
                        <div class="item">
                            <div class="over-lay d-flex flex-column justify-content-center">
                                <a href=""><i class="far fa-heart"></i></a>
                                <a href="">Mua ngay</a>
                            </div>
                            <img src="{{asset('images/products/'.$product->image)}}" alt="" width="208px" height="280px">
                            <div class="info-product d-flex flex-column justify-content-center">
                                <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->name }}</a>
                                <a href="{{ url('sanpham/'.$product->slug) }}">Mã hàng : {{ $product->code }}</a>
                                <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->sale }} VNĐ</a>
                            </div>
                        </div>

                @endforeach
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content text-center ">
            <div class="row">
                <div class="col-4 modal-img">
                    <img src="images/product-2.jpg" alt="">
                </div>
                <div class="col-8 modal-title d-flex flex-column">
                    <span>Bạn vừa thêm sản phẩm vào giỏ hàng</span>
                    <div class="modal-link">
                            <a href="{{ url('trang-chu') }}">Tiếp tục mua sắm</a>
                            <a href="{{ url('cart') }}">Tới giỏ hàng</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
    <script type="text/javascript" src="{{asset('xzoom/xzoom.min.js')}}"></script>
{{-- zoom  --}}

<script>
    function imageZoom(imgID, resultID) {
      var img, lens, result, cx, cy;
      img = document.getElementById(imgID);
      result = document.getElementById(resultID);

      /*create lens:*/
      lens = document.createElement("DIV");
      lens.setAttribute("class", "img-zoom-lens");
      /*insert lens:*/
      img.parentElement.insertBefore(lens, img);
      /*calculate the ratio between result DIV and lens:*/
      cx = result.offsetWidth / lens.offsetWidth;
      cy = result.offsetHeight / lens.offsetHeight;
      /*set background properties for the result DIV:*/
      result.style.backgroundImage = "url('" + img.src + "')";
      result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
      /*execute a function when someone moves the cursor over the image, or the lens:*/
      lens.addEventListener("mousemove", moveLens);
      img.addEventListener("mousemove", moveLens);
      /*and also for touch screens:*/
      lens.addEventListener("touchmove", moveLens);
      img.addEventListener("touchmove", moveLens);
      function moveLens(e) {
          var a = document.querySelector('#'+resultID);
          a.classList.add('d-flex');
        var pos, x, y;
        /*prevent any other actions that may occur when moving over the image:*/
        e.preventDefault();
        /*get the cursor's x and y positions:*/
        pos = getCursorPos(e);
        /*calculate the position of the lens:*/
        x = pos.x - (lens.offsetWidth / 2);
        y = pos.y - (lens.offsetHeight / 2);
        /*prevent the lens from being positioned outside the image:*/
        if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
        if (x < 0) {x = 0;}
        if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
        if (y < 0) {y = 0;}
        /*set the position of the lens:*/
        lens.style.left = x + "px";
        lens.style.top = y + "px";
        /*display what the lens "sees":*/
        result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
      }
      function getCursorPos(e) {
        var a, x = 0, y = 0;
        e = e || window.event;
        /*get the x and y positions of the image:*/
        a = img.getBoundingClientRect();
        /*calculate the cursor's x and y coordinates, relative to the image:*/
        x = e.pageX - a.left;
        y = e.pageY - a.top;
        /*consider any page scrolling:*/
        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return {x : x, y : y};
      }
    }
    </script>
    <script>
    // Initiate zoom effect:
    imageZoom("myimage", "myresult");
    </script>
@endsection
