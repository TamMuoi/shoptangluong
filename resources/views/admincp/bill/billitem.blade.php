@extends('admincp.index')
@section('title')
   Chi tiết Đơn Hàng
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('css/bill.css') }}">
<h1>
        Chi tiết Đơn Hàng...
    </h1>
    <br>
    <div class="billitem">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                <span><b>Tên Khách Hàng:</b> {{ $bill->name }}</span><br>
                <span><b>Email Khách Hàng:</b> {{ $bill->email }}</span><br>
                <span><b>Số Điện thoại Khách Hàng:</b> {{ $bill->phone }}</span><br>
                <span><b>Địa Chỉ Khách Hàng:</b> {{ $bill->address }}</span><br>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6">
                <span><b>Ngày Tạo:</b> {{ date('d/m/Y',strtotime($bill->day)) }}</span><br>
                <span><b>Phương Thức Thành Toán:</b> {{ $bill->pay }}</span><br>

            </div>

        </div>
        <hr>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên Sản Phẩm</th>
                <th>Màu</th>
                <th>Size</th>
                <th>Đơn Giá</th>
                <th>Số Lượng</th>
                <th>Thành Tiền</th>
            </tr>
            </thead>
            <tbody>
                @foreach($items as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->color }}</td>
                        <td>{{ $item->size }}</td>
                        <td>{{ number_format($item->price).' VNĐ' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->money).' VNĐ' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <span><b>Tổng Tiền:</b> {{ number_format($bill->total).' VNĐ' }}</span><br>
        </div><br>
        <hr>
        @if($bill->status==0)
        <div class="actionbill" style="text-align: center">
            <a class="btn btn-success" href="{{ url('admincp/bill/confirm/'.$bill->id) }}">Xác Nhận</a>
        </div>
        @endif
    </div>

@endsection