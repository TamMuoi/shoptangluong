@extends('admincp.index')
@section('title')
    Danh sách Sản phẩm
@endsection
@section('content')

    <div class="bs-example4" data-example-id="simple-responsive-table">
    <h1>
        Danh sách Sản Phẩm...
    </h1>
    <br>
    <div class="table-data__tool">
        <a class="btn btn-success" href="{{ route('create.product') }}">Thêm Sản phẩm</a>
    </div>
    <br>
    <table class=" table table-bordered table-hover" id="dbtbl">
        <thead>
        <tr>
            <th>Mã Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Bộ Sưu Tập</th>
            <th>Giá Niêm yết</th>
            <th>Giá khuyến Mại</th>
            <th>Số Lượng còn lại</th>
            <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $key => $value)
            <tr>
                <td>{{ $value->code }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->cate }}</td>
                <td>{{ $value->collection }}</td>
                <td>{{ number_format($value->price)."VNĐ"}}</td>
                <td>{{ number_format($value->sale)."VNĐ"}}</td>
                <td>{{ $value->quantity}}</td>
                <td>
                    <a type="button" class="fa fa-edit btn btn-default btn btn-success" href="{{ url('admincp/product/edit/'.$value->id) }}" title="Sửa"></a>
                    <a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="{{ url('admincp/product/delete/'.$value->id) }}" onclick="return confirm('hành dộng sẽ xóa sản phẩm! bạn có muốn tiếp tục?')" title="Xóa">Xóa</a>
                </td>
            </tr>
        @endforeach

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
    </div>

@endsection