@extends('admincp.index')
@section('content')
{{-- <form role="form" class="form-horizontal" action="">    
    <div class="form-group">
        <div class="col-md-8">
            <div class="input-group in-grp1">							
                <span class="input-group-addon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <input type="text" class="form-control1" placeholder="Email Address">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-8">
            <div class="input-group in-grp1">
                <label>Img slider</label>
                <input type="file" id="exampleInputFile">
            </div>
        </div>
    </div>
</form> --}}

<h1>
        Sửa user account...
    </h1>
    
    <br>
    
    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >
    
                <form name="create" action="{{ url('admincp/useraccount/update/'.$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-body custom-control-label">Tên Người Dùng:</label>
                        <input id="name" type="text" class="form-control backgroundinput @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <p style="color:red">{{ $errors->first('name') }}</p>
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Giới tính:</label>
                        <select name="gender" class="">
                            <option value="0" hidden
                            @if($user->gender==0)
                                selected
                            @endif
                            >Nam</option>
                            <option value="1"
                                    @if($user->gender==1)
                                    selected
                                    @endif
                            >Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Ngày Sinh:</label>
                        <input name="birth" class="form-control" type="date" value="{{ $user->birth }}">


                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Email:</label>
                        <input name="email" id="email" class="form-control" type="email" value="{{ $user->email }}">

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Avatar:</label>
                        <input type="hidden" name="old-file" value="{{ $user->avatar }}">
                        <input type="file" id="avatar" name="avatar" style="border: transparent;" placeholder="Avatar" class="form-control backgroundinput" onchange="fileValidation()" accept=".jpg, .png, .gif">
                        <div id="imagePreview" style="margin: 0 auto;">
                            <img style="width:300px;" src="{{ asset('images/avatar/'.$user->avatar) }}"/>
                        </div>
                        <script type="text/javascript">
                            function fileValidation() {
                                var fileInput = document.getElementById('avatar');
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
                                            document.getElementById('imagePreview').innerHTML = '<img style="width:300px;" src="' + e.target.result + '"/>';
                                        };
                                        reader.readAsDataURL(fileInput.files[0]);
                                    }
                                }
                            }
                        </script>
                    </div>
                        <div class="form-group">
                            <label class="text-body custom-control-label">Mật Khẩu:</label>
                                <input id="password" type="password" class="form-control backgroundinput" name="password"  onchange="lengthPasswword(this)">

                                <div id="lengthpass" style="color: red; font-size: 15px"></div>
                                <script>
                                    function lengthPasswword(obj) {
                                        var x = obj.value;
                                        if (x.length < 8) {
                                            document.getElementById('lengthpass').style.display = 'block';
                                            document.getElementById('lengthpass').innerHTML = '<span>Password length must be greater than or equal to 8 characters</span>';
                                        } else {
                                            document.getElementById('lengthpass').style.display = 'none';
                                        }
                                    }
                                </script>

                        </div>

                        <div class="form-group">
                            <label class="text-body custom-control-label">Nhập lại Mật Khẩu:</label>
                                <input id="password-confirm" type="password" class="form-control backgroundinput" name="password_confirmation" autocomplete="new-password" onchange="confirmPasswword(this)">
                                <p id="errorpass" style="color: red; font-size: 15px"></p>
                                <script>
                                    function confirmPasswword(obj) {
                                        var y = document.getElementById('password').value;
                                        var x = obj.value;
                                        if (x != y) {
                                            document.getElementById('errorpass').style.display = 'block';
                                            document.getElementById('errorpass').innerHTML = '<span>Confirm Pass word ís not correct</span>';
                                        } else {
                                            document.getElementById('errorpass').style.display = 'none';
                                        }
                                    }
                                </script>
                        </div>
                    <div class="form-group">
                        <a class="btn btn-danger" href="{{url('admincp/listslider')}}" type="button" title="Cancel" value="">Quay lại</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection