@extends('admincp.index')
@section('title')
    Màu Sắc
@endsection
@section('content')
<style>
    .inputadmin{
        background: white;
        border: none;
    }

    .an{
        display: none;
    }
</style>
<div class="bs-example4" data-example-id="simple-responsive-table">
<h1>
        Danh sách Màu Sắc...
    </h1>
    <br>
    @if(session('thongbao'))
        <script>
            alert('{{ session('thongbao') }}');

        </script>
    @endif
    <div class="table-data__tool">
    <button class="btn btn-success" id="btadd"  onclick="addcate()">Thêm Màu sắc</button>
    <button class="btn btn-danger" id="bthuy"  onclick="huycate()">Hủy</button>
        <div id="addcate" class="hide">
            <hr>
            <form action="{{ route('store.color') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <h3>Tên Màu Sắc:</h3>
                    </div>
                    <div class="col-md-7">

                        <input class="form-control" id="catename" required type="text" name="name" />
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
    <table class=" table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th>#</th>
                <th >Name</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($colors as $key => $value)

                    <tr>
                        <form name="create{{$value->id}}" action="{{ url('admincp/color/edit/'.$value->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <td>{{ $key+1 }}</td>
                        <td>
                            <input type="text" name="name" id="name{{ $value->id }}" value="{{ $value->name }}" required class="inputadmin" readonly  style=" width:100% "/>

                        </td>
                        <td>
                            @if($value->status==1)
                                Hiện
                            @else
                                Ẩn
                            @endif
                        </td>
                        <td>
                            <input type="submit" name="sua" value="Sửa" class="btn btn-success hide" id="submit{{ $value->id }}" >
                            <input type="reset" value="Hủy" class="btn btn-danger hide" id="reset{{ $value->id }}" onclick="return huy({{ $value->id }})">
                            <a type="button" id="edit{{$value->id}}" class="fa fa-edit btn btn-default btn btn-success" href="#" title="Sửa" onclick="sua({{ $value->id }})"></a>
                            @if($value->status==1)
                                <a class="btn btn-danger" href="{{ url('admincp/color/setactive/'.$value->id.'/0') }}" title="Ẩn danh mục {{ $value->name }}" onclick="return confirm('hành động sẽ hiển thị màu này! bạn có muốn tiếp tục?')">Ẩn</a>
                            @else
                                <a class="btn btn-success" href="{{ url('admincp/color/setactive/'.$value->id.'/1') }}" title="Hiện danh mục {{ $value->name }}" onclick="return confirm('hành động sẽ hiển thị màu này! bạn có muốn tiếp tục?')">Hiện</a>
                                <a class="btn btn-danger" href="{{ url('admincp/color/delete/'.$value->id) }}" title="Xóa danh mục {{ $value->name }}" onclick="return confirm('hành động sẽ xóa màu này! bạn có muốn tiếp tục?')">Xóa</a>
                            @endif

                        </td>
                        </form>
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
        $(document).ready(function () {
            $('#bthuy').hide();
        });
        function confirmAction() {
            return confirm("Bạn có chắc chắn không ?");

        }
        function sua(id) {
            var name = document.querySelector("#name"+id);
            var submit = document.querySelector("#submit"+id);
            var reset = document.querySelector("#reset"+id);
            var edit = document.querySelector("#edit"+id);

            name.classList.remove("inputadmin");
            name.classList.add("form-control");
            name.removeAttribute('readonly');
            submit.classList.remove('hide');
            reset.classList.remove('hide');
            edit.classList.add('hide');
        }
        function huy(id) {
            var r = confirm("WARNING! You have unsaved changes that may be lost!");
            if (r == true) {
                var name = document.querySelector("#name"+id);
                var submit = document.querySelector("#submit"+id);
                var reset = document.querySelector("#reset"+id);
                var edit = document.querySelector("#edit"+id);

                name.classList.add("inputadmin");
                name.classList.remove("form-control");

                $('.inputadmin').prop('readonly', true);
                submit.classList.add('hide');
                reset.classList.add('hide');
                edit.classList.remove('hide');

            }else {
                return false;
            }


        }
        function lengthPasswword(obj) {
            var x = obj.value;
            if (x.length < 8) {
                document.getElementById('length'+obj.id).style.display = 'block';
                document.getElementById('length'+obj.id).innerHTML = '<span>Password length must be greater than or equal to 8 characters</span>';
            } else {
                document.getElementById('length'+obj.id).style.display = 'none';
            }
        }
        function confirmPasswword(id) {
            var y = document.getElementById('password'+id);
            var x = document.getElementById('password-confirm'+id);
            if (x.value != y.value) {
                document.getElementById('error'+x.id).style.display = 'block';
                document.getElementById('error'+x.id).innerHTML = '<span>Confirm Pass word ís not correct</span>';
            } else {
                document.getElementById('error'+x.id).style.display = 'none';
            }
        }
        
    
    </script>
</div>
    @endsection