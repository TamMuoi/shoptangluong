@extends('admincp.index')
@section('title')
   Danh sách Danh Mục
@endsection
@section('content')
    <style>
        .inputadmin{
            background: white;
            border: none;
        }

    </style>
    <div class="card shadow mb-4">
        {{--<div class="card-header py-3">--}}
            {{--<h6 class="m-0 font-weight-bold text-primary">Category</h6>--}}
        {{--</div>--}}

        <div class="bs-example4" data-example-id="simple-responsive-table">
            <h1>Danh sách Danh Mục</h1>
            <div class="table-data__tool">
                <button class="btn btn-success" id="btadd"  onclick="addcate()">Thêm danh mục</button>
                <button class="btn btn-danger" id="bthuy"  onclick="huycate()">Hủy</button>
                <div id="addcate" class="hide">
                    <hr>
                    <form action="{{ route('store.cateproduct') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <h3>Tên Danh Mục:</h3>
                            </div>
                            <div class="col-md-7">

                                <input class="form-control" id="catename" required type="text" name="name" />
                                @if($errors->first('name')!=null)
                                    <script>
                                        alert("{{ $errors->first('name') }}");
                                    </script>
                                @endif
                                <select class="form-control" name="status">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input class="btn btn-success" type="submit" name="submit" value="Thêm"/>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>
                <script>
                    function addcate() {
                        $('#btadd').hide();
                        $('#bthuy').show();
                        var add = document.querySelector("#addcate");

                        add.classList.remove("hide");
                    }
                    function huycate() {
                        $('#btadd').show();
                        $('#bthuy').hide();
                        $('#catename').val('');
                        var add = document.querySelector("#addcate");

                        add.classList.add("hide");
                    }
                </script>
            </div>
            <br>
            <div class="table-responsive">
                @if(session('thongbao'))
                    <script>
                        alert('{{ session('thongbao') }}');
                    </script>
                @endif
                <table class="table table-bordered table-hover" id="dbtbl" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Active</th>
                        <th>Sản phẩm đã bán</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($cateproduct as $key => $value)
                        <tr>
                            <form action="{{ url('admincp/cateproduct/edit/'.$value->id) }}" method="post">
                                @csrf
                            <td>{{ $key+1 }}</td>
                            <td><input name="name" type="text" class="inputadmin" id="name{{$value->id}}" value="{{ $value->name }}" readonly/></td>
                            <td>{{ $value->slug }}</td>
                            <td>
                                @if($value->status==1) {{ "Hiển thị" }} @else {{ "Không hiển thị" }} @endif
                            </td>
                            <td>{{ $value->total_product }}</td>
                            <td>
                                {{--<a class="fa btn btn-default" title="{{ " Sửa ".$value->name }}" href="{{url('admincp/cateproduct/edit/'.$value->id)}}" type="button"><i class="fas fa-edit"></i></a>--}}
                               <button type="submit" class=" btn btn-success hide" id="submit{{ $value->id }}" title="Sửa Danh Mục"><i class="fas fa-pencil-alt"></i></button>
                                <a class="fa fa-edit  btn btn-primary" id="sua{{ $value->id }}"  onclick="sua({{ $value->id }})"></a>
                                <button type="reset"  class=" btn btn-danger hide"  id="reset{{ $value->id }}" onclick=" return huy({{ $value->id }})"><i class="fas fa-window-close"></i></button>
                                @if($value->status==0)
                                    <a data-id="{{$value->id}}" href="{{ url('admincp/cateproduct/setactive/'.$value->id.'/1') }}" title="{{ " Xoá ".$value->name }}" class="fa btn btn-primary">Hiển thị</a>
                                    <a data-id="{{$value->id}}" href="{{ url('admincp/cateproduct/destroy/'.$value->id) }}" title="{{ " Xoá ".$value->name }}" class="fa btn btn-danger" onclick="return confirm('xóa danh mụ sẽ xóa tất cả các sản phẩm trong danh mục đó! bạn có muốn tiếp tục?')">Xóa</a>
                                @else
                                    <a data-id="{{$value->id}}" href="{{ url('admincp/cateproduct/setactive/'.$value->id.'/0') }}" title="{{ " Xoá ".$value->name }}" class="fa btn btn-danger">Không Hiển thị</a>
                                @endif

                            </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Active</th>
                        <th>Sản phẩm đã bán</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#bthuy').hide();
        });
        function sua(id){
            var name = document.querySelector("#name"+id);
            var submit = document.querySelector("#submit"+id);
            var reset = document.querySelector("#reset"+id);
            var sua = document.querySelector("#sua"+id);


            name.removeAttribute('readonly');
            name.classList.remove('inputadmin');
            name.classList.add('form-control');
            reset.classList.remove('hide');
            submit.classList.remove('hide');
            sua.classList.add('hide');
        }
        function huy(id){
            var name = document.querySelector("#name"+id);
            var submit = document.querySelector("#submit"+id);
            var reset = document.querySelector("#reset"+id);
            var sua = document.querySelector("#sua"+id);

            $('#name'+id).prop('readonly', true);
            name.classList.add('inputadmin');
            name.classList.remove('form-control');
            reset.classList.add('hide');
            submit.classList.add('hide');
            sua.classList.remove('hide');
            return true;
        }
      /*  $('.btn-danger').click(function(){
            if(confirm('Bạn có muốn xoá danh mục sản phẩm ?')){
                var _this = $(this);
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'get',
                    url: "{{--{{ route('destroy.cateproduct') }}--}}",
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
        });*/
    </script>
@endsection