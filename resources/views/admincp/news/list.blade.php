@extends('admincp.index')
@section('title')
    Danh sách Bài Viết
@endsection
@section('content')


<h1>
        Danh sách Bài Viết...
    </h1>
    <br>
    @if(session('thongbao'))
        <script>
            alert('{{ session('thongbao') }}');
    
        </script>
    @endif
    <div class="table-data__tool">
    <a class="btn btn-success" href="{{url('admincp/news/create')}}">Thêm Tin Tức</a>
    </div>
    <br>
    <table class=" table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Tiêu Đề</th>
                <th>Mô Tả</th>
                <th>Image</th>
                <th>Thể Loại</th>

                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($news as $key => $value)
                <tr>    
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ substr($value->summary, 0, 200).'...' }}</td>
                    <td><img src="{{ asset('images/news/'.$value->image) }}" width="100px"></td>
                    <td>{{ $value->cate }}</td>
                    <td>
                        <a type="button" class="fa fa-edit btn btn-default btn btn-success" href="{{ url('admincp/news/edit/'.$value->id) }}" title="Sửa"></a>
                        <a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="{{ url('admincp/news/delete/'.$value->id) }}" onclick="return confirmAction()" title="Xóa">Xóa</a>
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