@extends('admincp.index')
@section('title')
    Danh sách Bài Viết Tuyển dụng
@endsection
@section('content')


<h1>
        Danh sách Bài Viết Tuyển dụng...
    </h1>
    <br>
    @if(session('thongbao'))
        <script>
            alert('{{ session('thongbao') }}');
    
        </script>
    @endif
    <div class="table-data__tool">
    <a class="btn btn-success" href="{{url('admincp/recruitment/create')}}">Thêm Tin Tuyển dụng</a>
    </div>
    <br>
    <table class=" table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Tiêu Đề</th>
                <th>Ảnh</th>
                <th>Mức Lương</th>
                <th>Vị trí</th>
                <th>Giờ Làm</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($recruitments as $key => $value)
                <tr>    
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->title }}</td>
                    <td><img src="{{ asset('images/recruitment/'.$value->image) }}" width="100px"></td>
                    <td>{{ number_format($value->salary).' VNĐ' }}</td>
                    <td>{{ $value->position }}</td>
                    <td>
                        @if($value->work_time==0)
                            PartTime
                        @else
                            FullTime
                        @endif
                    </td>
                    <td>
                        <a type="button" class="fa fa-edit btn btn-default btn btn-success" href="{{ url('admincp/recruitment/edit/'.$value->id) }}" title="Sửa"></a>
                        <a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="{{ url('admincp/recruitment/delete/'.$value->id) }}" onclick="return confirmAction()" title="Xóa">Xóa</a>
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

    @endsection