@extends('master-layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-1 form-muahang">
            <div class="xacnhan2">
                <div>
                    <i class="fas fa-check-circle mt-2"></i>
                    <span>Đơn hàng của bạn đã đươc xác nhận</span>
                </div>
                <div class="tt-donhang" style="border : 0.5px solid black; border-radius: 10px;">
                    <span>Họ và tên : {{ $cartid->name }}</span>
                    <span>Email : {{ $cartid->email }}</span>
                    <span>Số Điên Thoại : {{ $cartid->phone }}</span>
                    <span>Địa chỉ : {{ $cartid->address }}</span>
                    <span>hình thức thanh toán</span>
                    <span>{{ $cartid->pay }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ url('cauhoi') }}" style="font-size : 13px; margin-top : 20px" href="#">Bạn cần hỗ trợ
                        ??</a>

                    <a href="{{ url('trang-chu') }}" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
                </div>


            </div>
        </div>
        <div class="col-md-4 thanhtoan-sp">
            <div class="thanhtoan-left d-flex justify-content-between    ">
                {{--<div>
                    <img src="images/product-4.jpg" alt="">
                    <span> đầm ren đuôi cá</span>
                </div>
--}}
               {{-- <div class="name-sp">
                    <span> 1,999,999 Đ</span>
                </div>--}}
            </div>
            <div class="container border-line">

            </div>
            <div class="total-pay d-flex justify-content-between">
                <span>Tổng</span>
                <span>{{ number_format($cartid->total)." VNĐ" }}</span>
            </div>
            <div class="container border-line">

            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    var button = document.getElementById("click");
    var box2= document.querySelector(".xacnhan");
    var box = document.querySelector(".form-thanhtoan");
    var tt = true;
    button.addEventListener('click', function () {
        if (tt === true) {
            box.classList.add('form-thanhtoan2');
            box2.classList.add('xacnhan2');
            box.classList.remove('form-thanhtoan');
            box.classList.remove('xacnhan');
        }
        else{
            console.log('hihi')
        }

    });

</script>
@endsection
