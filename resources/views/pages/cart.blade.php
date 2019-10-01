@extends('master-layout')
@section('titile')
    Giỏ hàng của bạn
@endsection
@section('content')
<div class="container">
    <h5 class="text-uppercase">Giỏ hàng của tôi</h5>
    <div class="row">
        <div class="col-md-8 cart-sp">
            <div class="cart-top">
                <span>sản phẩm</span>
            </div>
            @foreach($cart as $value)
                <div class="cart-content">
                    <img src="{{ asset('images/products/'.$value->attributes->image ) }}" alt="">
                    <div class="cart-rigt">
                        <span>{{ $value->name }}</span>
                        <span>Giá: {{ number_format($value->price)." VNĐ" }} </span>
                        <span>Size : {{ $value->attributes->sizename }}</span>
                        <span>Màu : {{ $value->attributes->colorname }}</span>
                        <div class="d-flex komuonlamnua">
                            <input type="hidden" id="conlaiquantity{{ $value->id }}" value="{{ $value->attributes->conlai }}">
                            <input type="hidden" id="oldquantity{{ $value->id }}" value="{{ $value->quantity }}">
                            <input type="hidden" id="idquantity{{ $value->id }}" value="{{ $value->id }}">
                            <input class="form-control text-center" id="quantity{{ $value->id }}" value="{{ $value->quantity }}" type="number" onchange="updatecate(this)">

                            <a class="ml-3 mt-2" href="{{ url('deletecart/'.$value->id) }}" onclick=" return deletecart({{ $value->id }})"><i class="far fa-trash-alt ml-3 mt-2"></i></a>
                            <div id="errorsale" style="color: red"></div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="cart-top">
                <span>Tổng số</span>
            </div>
            <div class="cart-gia d-flex justify-content-center">
                <span id="tongtien">{{ number_format($tong)." VNĐ" }}</span>
            </div>
            <div class="container border-line">

                </div>

                <a href="{{ url('thanhtoan') }}"><button class="thanhtoan">thanh toán</button></a>

        </div>
    </div>

</div>
    <script>
        function updatecate(obj) {
            var x= document.getElementById('errorsale');
            if(obj.value<1){
                x.innerHTML= 'Bạn không thể chọn số lượng nhỏ hơn 1';
                obj.value=parseInt($('#old'+obj.id).val());
            }
            else if(obj.value > parseInt($('#conlai'+obj.id).val())){
                x.innerHTML= 'Sản phẩm còn lại không đủ!';
                obj.value=parseInt($('#old'+obj.id).val());
            }
            else{
                x.innerHTML= '';
            }
            var thaydoi = parseInt(obj.value) - parseInt($('#old'+obj.id).val());
            var agrs = {
                url: "{{ url('updatecart') }}", // gửi ajax đến file result.php
                type: "post", // chọn phương thức gửi là post
                dataType: "text", // dữ liệu trả về dạng text
                data: { // Danh sách các thuộc tính sẽ gửi đi
                    _token: '{{ csrf_token() }}',
                    id: $('#id'+obj.id).val(),
                    quantity: thaydoi,
                },
                success: function (result) {
                    // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                    // đó vào thẻ div có id = result
                    $('#old'+obj.id).val(parseInt($('#old'+obj.id).val())+thaydoi);
                    document.getElementById('tongtien').innerHTML= result;
                }
            };

            // Truyền object vào để gọi ajax
            $.ajax(agrs);
            return false;
        }
        function deletecart(id) {
            var x= confirm('Bạn có chắc không?');
          /*  if(x==true){

            }
            else{
                alert('haha');
            }*/
        }
    </script>

@endsection
