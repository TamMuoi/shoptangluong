@extends('admincp.index')
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
        Danh sách Admin...
    </h1>
    <br>
    @if(session('thongbao'))
        <script>
            alert('{{ session('thongbao') }}');

        </script>
    @endif
    <div class="table-data__tool">
    <a class="btn btn-success" href="{{url('admincp/adminaccount/create')}}">Thêm user</a>
    </div>
    <br>
    <table class=" table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($admins as $key => $value)

                    <tr>
                        <form name="create{{$value->id}}" action="{{ url('admincp/adminaccount/update/'.$value->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <td>{{ $key+1 }}</td>
                        <td><input type="text" name="name" id="name{{ $value->id }}" value="{{ $value->name }}" required class="inputadmin" readonly  style=" width:100%; "/></td>
                        <td><input type="email" email="email" name="email" id="email{{$value->id}}" required value="{{ $value->email }}" class="inputadmin" style=" width:100%;" readonly/></td>
                        <td>
                            <div id="active{{ $value->id }}">
                                @if($value->status==1)
                                    Active
                                @else
                                    UnActive
                                @endif
                            </div>
                            <div id="pass{{ $value->id }}" class="hide">
                                <div class="form-group">
                                    <label class="text-body custom-control-label">Mật Khẩu:</label>
                                    <input id="password{{ $value->id }}" type="password" class="form-control backgroundinput @error('password') is-invalid @enderror" name="password" autocomplete="new-password"  onchange="lengthPasswword(this)">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div id="lengthpassword{{ $value->id }}" style="color: red; font-size: 15px"></div>

                                </div>

                                <div class="form-group">
                                    <label class="text-body custom-control-label">Nhập lại Mật Khẩu:</label>
                                    <input id="password-confirm{{ $value->id }}" type="password" class="form-control backgroundinput" name="password_confirmation"  autocomplete="new-password" onchange="confirmPasswword({{ $value->id }})">
                                    <p id="errorpassword-confirm{{ $value->id }}" style="color: red; font-size: 15px"></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($value->id == Auth::user()->id)
                                <input type="submit" name="sua" value="Sửa" class="btn btn-success hide" id="submit{{ $value->id }}" >
                                <input type="reset" value="Hủy" class="btn btn-danger hide" id="reset{{ $value->id }}" onclick="return huy({{ $value->id }})">
                                <a type="button" id="edit{{$value->id}}" class="fa fa-edit btn btn-default btn btn-success" href="#" title="Sửa" onclick="sua({{ $value->id }})"></a>

                                {{--<a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="" onclick="return confirmAction()" title="Xóa">Xóa</a>--}}
                            @else
                                @if($value->status==1)
                                    <a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="{{ url('admincp/adminaccount/setactive/'.$value->id.'/0') }}" onclick="" title="UnActive">UnActive</a>

                                @else
                                    <a type="button" class="fa fa-trash btn btn-default btn btn-primary" href="{{ url('admincp/adminaccount/setactive/'.$value->id.'/1') }}" onclick="" title="Active">Active</a>
                                    <a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="{{ url('admincp/adminaccount/delete/'.$value->id) }}" onclick="return confirmAction()" title="Xóa">Xóa</a>
                                @endif
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
        function confirmAction() {
            return confirm("Bạn có chắc chắn không ?")
        }
        function sua(id) {
            var name = document.querySelector("#name"+id);
            var email = document.querySelector("#email"+id);
            var submit = document.querySelector("#submit"+id);
            var reset = document.querySelector("#reset"+id);
            var edit = document.querySelector("#edit"+id);
            var active = document.querySelector("#active"+id);
            var pass = document.querySelector("#pass"+id);



            name.classList.remove("inputadmin");
            name.classList.add("form-control");
            name.removeAttribute('readonly');
            email.classList.remove("inputadmin");
            email.classList.add("form-control");
            email.removeAttribute('readonly');
            submit.classList.remove('hide');
            reset.classList.remove('hide');
            pass.classList.remove('hide');
            edit.classList.add('hide');
            active.classList.add('hide');

        }
        function huy(id) {
            var r = confirm("WARNING! You have unsaved changes that may be lost!");
            if (r == true) {
                var name = document.querySelector("#name"+id);
                var email = document.querySelector("#email"+id);
                var submit = document.querySelector("#submit"+id);
                var reset = document.querySelector("#reset"+id);
                var edit = document.querySelector("#edit"+id);
                var active = document.querySelector("#active"+id);
                var pass = document.querySelector("#pass"+id);

                name.classList.add("inputadmin");
                name.classList.remove("form-control");
                email.classList.add("inputadmin");
                email.classList.remove("form-control");

                $('.inputadmin').prop('readonly', true);
                submit.classList.add('hide');
                reset.classList.add('hide');
                edit.classList.remove('hide');
                pass.classList.add('hide');
                active.classList.remove('hide');

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