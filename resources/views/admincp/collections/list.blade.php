@extends('admincp.index')
@section('title')
    Bộ Sưu Tập
@endsection
@section('content')
<style>
    .inputadmin{
        background: white;
        border: none;
    }
</style>
<div class="bs-example4" data-example-id="simple-responsive-table">
<h1>
        Danh sách Bộ Sưu Tập...
    </h1>
    <br>
    <div class="table-data__tool">
    <button class="btn btn-success" id="btadd"  onclick="addcate()">Thêm Bộ Sưu Tập</button>
    <button class="btn btn-danger" id="bthuy"  onclick="huycate()">Hủy</button>
        <div id="addcate" class="hide">
            <hr>
            <form action="{{ route('store.collections') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <h3>Tên Danh Mục:</h3>
                    </div>
                    <div class="col-md-7">

                        <input class="form-control" id="catename" required type="text" name="name" />
                        <input class="form-control" type="file" id="avatar0" name="image" required onchange="fileValidation(0)"/>
                        <div id="imagePreview0">
                        </div>
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
                $('#avatar0').val('');
                $('#imagePreview0').html('');
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
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($collections as $key => $value)

                    <tr>
                        <form name="create{{$value->id}}" action="{{ url('admincp/collections/edit/'.$value->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <td>{{ $key+1 }}</td>
                        <td><input type="text" name="name" id="name{{ $value->id }}" value="{{ $value->name }}" required class="inputadmin" readonly  style=" width:100%; "/></td>
                        <td>
                            <input name="old-file" id="old{{ $value->id }}" type="hidden" value="{{ $value->image }}">
                            <div id="imagePreview{{ $value->id }}">

                            <img src="{{ asset('images/collections/'.$value->image) }}" width="200px"/>
                            </div>
                            <input class="form-control hide" type="file" id="avatar{{ $value->id }}" name="image" onchange="fileValidation({{ $value->id }})"/>
                        </td>
                        <td>
                                @if($value->status==1) {{ "Hiển thị" }} @else {{ "Không hiển thị" }} @endif
                            </td>

                        <td>
                            <input type="submit" name="sua" value="Sửa" class="btn btn-success hide" id="submit{{ $value->id }}" >
                            <input type="reset" value="Hủy" class="btn btn-danger hide" id="reset{{ $value->id }}" onclick="return huy({{ $value->id }})">
                            <a type="button" id="edit{{$value->id}}" class="fa fa-edit btn btn-default btn btn-success" href="#" title="Sửa" onclick="sua({{ $value->id }})"></a>
                            @if($value->status==0)
                                <a data-id="{{$value->id}}" href="{{ url('admincp/collections/setactive/'.$value->id.'/1') }}" title="{{ " Xoá ".$value->name }}" class="fa btn btn-danger" onclick="return confirm('hành động sẽ hiển thị bộ sưu tập này! bạn có muốn tiếp tục?')">Hiển thị</a>
                                <a data-id="{{$value->id}}" href="{{ url('admincp/collections/delete/'.$value->id) }}" title="{{ " Xoá ".$value->name }}" class="fa btn btn-danger" onclick="return confirm('hành động sẽ Xóa bộ sưu tập này! bạn có muốn tiếp tục?')">Xóa</a>
                            @else
                                <a data-id="{{$value->id}}" href="{{ url('admincp/collections/setactive/'.$value->id.'/0') }}" title="{{ " Xoá ".$value->name }}" class="fa btn btn-danger" onclick="return confirm('hành động sẽ ẩn bộ sưu tập này! bạn có muốn tiếp tục?')">Ẩn</a>
                            @endif                        </td>
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
            var avatar = document.querySelector("#avatar"+id);

            name.classList.remove("inputadmin");
            name.classList.add("form-control");
            name.removeAttribute('readonly');
            submit.classList.remove('hide');
            avatar.classList.remove('hide');
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
                var avatar = document.querySelector("#avatar"+id);

                name.classList.add("inputadmin");
                name.classList.remove("form-control");

                $('.inputadmin').prop('readonly', true);
                submit.classList.add('hide');
                reset.classList.add('hide');
                edit.classList.remove('hide');
                avatar.classList.add('hide');
                document.getElementById('imagePreview'+id).innerHTML = '<img style="width:200px;" src="'+'{{ asset('images/collections/')}}'+'/'+ $('#old'+id).val() + '"/>';

            }else {
                return false;
            }


        }
        function fileValidation(id) {
            var fileInput = document.getElementById('avatar'+id);
            var filePath = fileInput.value; //lấy giá trị input theo id
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
            //Kiểm tra định dạng
            if (!allowedExtensions.exec(filePath)) {
                alert('You can only select files with .jpeg/.jpg/.png/.gif extension.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('imagePreview'+id).innerHTML = '<img style="width:200px;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

        
    
    </script>
</div>

    @endsection