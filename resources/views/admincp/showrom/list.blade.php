@extends('admincp.index')
@section('content')
<style>
    .inputadmin{
        background: none;
        border: none;
    }

    .an{
        display: none;
    }
    .border-showrom{
        border: black dotted 1px;
        border-radius: 10px;
        padding: 18px 30px 1px 30px;
    }
</style>

<h1>
        Danh sách cửa hàng hiện có...
    </h1>
    <br>
    @if(session('thongbao'))
        <script>
            alert('{{ session('thongbao') }}');

        </script>
    @endif
    <div class="table-data__tool">
    <button class="btn btn-success" id="addbutton" onclick="showromadd()">Thêm chi nhành</button>
    </div>

    <div class="an border-showrom" id="addshowrom">
        <form action="{{ route('store.showrom') }}" method="post"  name="addshowrom">
            @csrf
            <div class="form-group">
                <label class="text-body custom-control-label">Tên Chi nhánh:</label>
                <input id="name" type="text" class="form-control inputadmin @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                <p style="color:red">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label class="text-body custom-control-label">Địa chỉ:</label>
                <input id="address" type="text" class="form-control inputadmin @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="name" autofocus>

                <p style="color:red">{{ $errors->first('address') }}</p>
            </div>
            <div class="form-group">
                <label class="text-body custom-control-label">Số điện thoại:</label>
                <input id="phone" type="text" class="form-control inputadmin @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                <p style="color:red">{{ $errors->first('phone') }}</p>
            </div>
            <div class="form-group">
                <input name="submit" class="btn btn-primary" type="submit" value="Thêm">
                <input name="reset" class="btn btn-danger" type="reset" value="Hủy" onclick=" return cancelshowrom()">
            </div>
        </form>
        <script>
            function showromadd() {
                // alert('hihi');
                var add= document.querySelector('#addshowrom');
                var addbutton= document.querySelector('#addbutton');

                add.classList.remove('an');
                addbutton.classList.add('an');
            }
            function cancelshowrom(){
                var x= confirm('những nội dung bạn nhập sẽ bị mất!');
                var add= document.querySelector('#addshowrom');
                var addbutton= document.querySelector('#addbutton');
                if(x==true){
                    add.classList.add('an');
                    addbutton.classList.remove('an');
                    return true;
                }
                else{
                    return false;
                }
            }
        </script>
    </div>
    <br>
    <table class=" table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($showrom as $key => $value)

                    <tr>
                        <form name="create{{$value->id}}" action="{{ url('admincp/showrom/update/'.$value->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <td>{{ $key+1 }}</td>
                        <td><input type="text" name="name" id="name{{ $value->id }}" value="{{ $value->name }}" required class="inputadmin" readonly  style=" width:100%; "/></td>
                        <td><input type="text"  name="address" id="address{{$value->id}}" required value="{{ $value->address }}" class="inputadmin" style=" width:100%;" readonly/></td>
                        <td>
                            <input type="text"  name="phone" id="phone{{$value->id}}" required value="{{ $value->phone }}" class="inputadmin" style=" width:100%;" readonly/>
                        </td>
                        <td>
                                <input type="submit" name="sua" value="Sửa" class="btn btn-success hide" id="submit{{ $value->id }}" >
                                <input type="reset" value="Hủy" class="btn btn-danger hide" id="reset{{ $value->id }}" onclick="return huy({{ $value->id }})">
                                <a type="button" id="edit{{$value->id}}" class="fa fa-edit btn btn-default btn btn-success" href="#" title="Sửa" onclick="sua({{ $value->id }})"></a>
                                <a type="button" id="delete{{$value->id}}" class="btn btn-danger" href="{{ url('admincp/showrom/delete/'.$value->id) }}" title="xóa" onclick="return confirmAction()">Xóa</a>

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
            var address = document.querySelector("#address"+id);
            var phone = document.querySelector("#phone"+id);
            var submit = document.querySelector("#submit"+id);
            var reset = document.querySelector("#reset"+id);
            var edit = document.querySelector("#edit"+id);




            name.classList.remove("inputadmin");
            name.classList.add("form-control");
            name.removeAttribute('readonly');
            address.classList.remove("inputadmin");
            address.classList.add("form-control");
            address.removeAttribute('readonly');
            phone.classList.remove("inputadmin");
            phone.classList.add("form-control");
            phone.removeAttribute('readonly');
            submit.classList.remove('hide');
            reset.classList.remove('hide');

            edit.classList.add('hide');


        }
        function huy(id) {
            var r = confirm("WARNING! You have unsaved changes that may be lost!");
            if (r == true) {
                var name = document.querySelector("#name"+id);
                var address = document.querySelector("#address"+id);
                var phone = document.querySelector("#phone"+id);
                var submit = document.querySelector("#submit"+id);
                var reset = document.querySelector("#reset"+id);
                var edit = document.querySelector("#edit"+id);


                name.classList.add("inputadmin");
                name.classList.remove("form-control");
                address.classList.add("inputadmin");
                address.classList.remove("form-control");
                phone.classList.add("inputadmin");
                phone.classList.remove("form-control");

                $('.inputadmin').prop('readonly', true);
                submit.classList.add('hide');
                reset.classList.add('hide');
                edit.classList.remove('hide');


            }else {
                return false;
            }


        }

    </script>

    @endsection