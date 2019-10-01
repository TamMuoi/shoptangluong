@extends('admincp.index')
@section('title')
    Danh sách Đơn Hàng
@endsection
@section('content')


<h1>
        Danh sách Đơn Hàng...
    </h1>
    <br>
    @if(session('thongbao'))
        <script>
            alert('{{ session('thongbao') }}');
    
        </script>
    @endif

    <br>
    <table class=" table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Khách hàng</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Phương thức thanh toán</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @isset($time)
                @foreach ($bills as $key => $value)
                    @if (strtotime(now()) - strtotime($value->day) <= $time)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->payment_method_id }}</td>
                        <td>{{ number_format($value->total).' VNĐ' }}</td>
                        <td>{{ $value->day }}</td>
                        <td>
                            @if($value->status==1)
                                Đã xử lý
                            @else
                                Chưa Xử lý
                            @endif
                        </td>
                        <td>
                            <a type="button" class="fa fa-eye btn btn-default btn btn-primary" href="{{ url('admincp/bill/item/'.$value->id) }}" title="Xem Chi Tiết">Xem Chi tiết</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            @else
                @foreach ($bills as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->payment_method_id }}</td>
                        <td>{{ number_format($value->total).' VNĐ' }}</td>
                        <td>{{ $value->day }}</td>
                        <td>
                            @if($value->status==1)
                                Đã xử lý
                            @else
                                Chưa Xử lý
                            @endif
                        </td>
                        <td>
                            <a type="button" class="fa fa-eye btn btn-default btn btn-primary" href="{{ url('admincp/bill/item/'.$value->id) }}" title="Xem Chi Tiết">Xem Chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            @endisset

            
        </tbody>
        {{--<script>--}}
            {{--function setactive(id,status) {--}}

                {{--alert('{{ url('admincp/useraccount/setactive/') }}'+'/'+id+'/'+status);--}}
                {{--/*$.get('{{ url('admincp/useraccount/setactive/') }}'+'/'+id+'/'+status, function (data) {--}}
                    {{--location.reload();--}}
                    {{--//alert('hihi');--}}
                {{--});--}}
            {{--}--}}
        {{--</script>--}}
    
    </table>
    <script language="JavaScript">
        function confirmAction() {
            return confirm("Bạn có chắc chắn không?")
        }
    </script>

    @endsection