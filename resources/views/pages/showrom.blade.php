@extends('master-layout')
@section('title')
    Hệ thống Showrom
@endsection
@section('content')
<div class="container gioithieu d-flex flex-column">
    <a href="#" class="my-2 text-uppercase ">Hệ thống cửa hàng của chúng tôi</a>
    <div class="cuahang">
        @foreach($showroms as $value)
        <ul>
            <li><b>{{ $value->name }}</b></li>
            <li>Địa chỉ : {{ $value->address }}</li>
            <li>SĐT : {{ $value->phone }} </li>
        </ul>
            <hr>
       @endforeach

    </div>
</div>

@endsection
