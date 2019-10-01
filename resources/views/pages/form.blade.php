@extends('master-layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-1 form-muahang">
            <form class="form-thanhtoan" action="{{ route('postthanhtoan') }}" method="post">
                @csrf
                <input name="tong" type="hidden" value="{{ $tong }}">
                <input name="code" type="hidden" value="{{ str_random(6) }}">
                <div class="form-row">
                    @guest
                        <div class="form-group col-md-12">
                            <label for="Họ và Tên">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Họ và Tên" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Số Điện Thoại">Email</label>
                            <input type="email" class="form-control" id="phone" name="email" required placeholder="Số điện thoại" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Số Điện Thoại">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" required placeholder="Số điện thoại" />
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="Địa chỉ">Address</label>
                            <input type="text" class="form-control" required id="address" name="address"
                                   placeholder="235 Hoàng Quốc Việt , Từ Liêm , Hà Nội" />
                        </div>
                    @else
                        <div class="form-group col-md-12">
                            <label for="Họ và Tên">Email</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Họ và Tên" value="{{ Auth::user()->name }}">
                            <input type="hidden" class="form-control" id="userid" name="userid" required placeholder="Họ và Tên" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Số Điện Thoại">Email</label>
                            <input type="email" class="form-control" id="phone" name="email" required placeholder="Số điện thoại" value="{{ Auth::user()->email }}" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Số Điện Thoại">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" required placeholder="Số điện thoại" value="{{ Auth::user()->phone }}">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="Địa chỉ">Address</label>
                            <input type="text" class="form-control" id="address" required name="address"
                                   placeholder="235 Hoàng Quốc Việt , Từ Liêm , Hà Nội" value="{{ Auth::user()->address }}">
                        </div>
                    @endguest

                <div class="form-group">
                    @foreach($pays as $pay)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" required name="payment_methods" value="{{ $pay->id }}">
                        <label class="form-check-label" for="1">
                            {{ $pay->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Đặt hàng</button>
            </form>
            {{--<div class="xacnhan">
                <div>
                    <i class="fas fa-check-circle mt-2"></i>
                    <span>Đơn hàng của bạn đã đươc xác nhận</span>
                </div>
                <div class="tt-donhang">
                    <span>Họ và tên : </span>
                    <span>Số Điên Thoại :</span>
                    <span>Địa chỉ : 235 hoàn quốc việt từ liên hà nội việt nam</span>
                    <span>hình thức thanh toán</span>
                    <span>thanh toán khi nhận hàng</span>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ url('cauhoi') }}" style="font-size : 13px; margin-top : 20px" href="#">Bạn cần hỗ trợ
                        ??</a>

                    <a href="{{ url('trang-chu') }}" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
                </div>


            </div>--}}
        </div>
        <div class="col-md-4 thanhtoan-sp">
          {{--  <div class="thanhtoan-left d-flex justify-content-between    ">
                <div>
                    <img src="images/product-4.jpg" alt="">
                    <span> đầm ren đuôi cá</span>
                </div>

                <div class="name-sp">
                    <span> 1,999,999 Đ</span>
                </div>
            </div>--}}
            <div class="container border-line">

            </div>
            <div class="total-pay d-flex justify-content-between">
                <span>Tổng</span>
                <span>{{ number_format($tong)." VNĐ" }}</span>
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
