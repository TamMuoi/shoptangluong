@extends('admincp.index')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Loại sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(session('thongbao'))
                    <script>
                        alert('{{ session('thongbao') }}');

                    </script>
                @endif
                <table class="table table-bordered" id="dbtbl" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($producttype as $key => $value)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->slug }}</td>
                            <td>{{ $value->proname ?? '' }}</td>
                            <td>
                                @if($value->active==1) {{ "Hiển thị" }} @else {{ "Không hiển thị" }} @endif
                            </td>
                            <td>
                                <a class="fa btn btn-default" title="{{ " Sửa ".$value->name }}" href="{{url('admincp/producttype/edit/'.$value->id)}}" type="button"><i class="fas fa-edit"></i></a>
                                <button data-id="{{$value->id}}" title="{{ " Xoá ".$value->name }}" class="fa btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{ $producttype->links() }}</div>
            </div>
        </div>
    </div>
    <script>
        $('.btn-danger').click(function(){
            if(confirm('Bạn có muốn xoá loại sản phẩm ?')){
                var _this = $(this);
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('destroy.producttype') }}",
                    data:{
                        _token : $('[name="_token"]').val(),
                        id:id //id trên nối với id request trong controller
                    },
                    success: function(response){
                        _this.parent().parent().remove();
                        // alert(response);
                    }
                })
            }
        });
    </script>
@endsection