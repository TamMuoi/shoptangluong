@extends('admincp.index')
@section('content')


<h1>
        Danh sách slider...
    </h1>
    <br>
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif
    
    <div class="table-data__tool">
    <a class="btn btn-success" href="{{url('admincp/slider/addslider')}}">Thêm slider</a>
    </div>
    <br>
    <table class="dataTables_filter table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th class="col-md-3">Ảnh slider</th>
                <th class="col-md-3">Logo</th>
                <th class="col-md-3">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slider as $value)
                <tr>    
                    <td>
                        <img width="250px" height="120px" src="{{asset('assets/img').'/'.$value->image}}"> 
                    </td>
                    <td>
                        <img width="250px" height="120px" src=""> 
                    </td>
                    <td>
                        <a type="button" class="fa fa-edit btn btn-default btn btn-success" href="{{url('admincp/slider/edit').'/'.$value->id}}" title="Sửa"></a>
                        <a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="{{url('admincp/slider/delete').'/'.$value->id}}" onclick="return confirmAction()" title="Xóa">Xóa</a>
                    </td>
                </tr>    
            @endforeach
            
        </tbody>
    
    </table>
    <script language="JavaScript">
        function confirmAction() {
            return confirm("Bạn có chắc chắn k ?")
        }
        
    
    </script>

    @endsection