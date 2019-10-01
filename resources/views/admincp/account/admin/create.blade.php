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
        Thêm user account...
    </h1>
    
    <br>
    
    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >
    
                <form name="create" action="{{ route('store.adminaccount') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-body custom-control-label">Tên Người Dùng:</label>
                        <input id="name" type="text" class="form-control backgroundinput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        <p style="color:red">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label  ">Email:</label>
                        <input name="email" id="email" class="form-control " required type="email">
                        @error('email')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                        <div class="form-group">
                            <label class="text-body custom-control-label">Mật Khẩu:</label>
                                <input id="password" type="password" class="form-control backgroundinput @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  onchange="lengthPasswword(this)">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <input id="password-confirm" type="password" class="form-control backgroundinput" name="password_confirmation" required autocomplete="new-password" onchange="confirmPasswword(this)">
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
    
    <script>
        function showIMG() {
            var fileInput = document.getElementById('image','logo');
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
                        document.getElementById('viewImg','viewImgs').innerHTML = '<img style="width:350px; height: 200px;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
        function showIMGs() {
            var fileInput = document.getElementById('logo');
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
                        document.getElementById('viewImgs').innerHTML = '<img style="width:150px; height: 200px;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

    
    
    </script>
@endsection